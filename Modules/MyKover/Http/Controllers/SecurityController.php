<?php

namespace Modules\MyKover\Http\Controllers;

use App\Models\User;
use App\Models\UserSecurityNotification;
use DeviceDetector\DeviceDetector;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use IvanoMatteo\LaravelDeviceTracking\Models\Device;
use IvanoMatteo\LaravelDeviceTracking\Models\DeviceUser;
use Illuminate\Validation\Rules\Password;
use IvanoMatteo\LaravelDeviceTracking\Facades\DeviceTracker;
use Jenssegers\Agent\Agent;

class SecurityController extends Controller
{
    public function index()
    {
        return view('mykover::security.edit');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mykover::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('mykover::show');
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = User::find($request->user()->id);
        $devices = $user->device;
        $groupedDevices = $devices->groupBy('ip')->map(function($group) {
            return [
                'count' => $group->count(),
                'device' => $group->first()
            ];
        });
        $notifications = UserSecurityNotification::where('user_id', $user->id)->where('is_viewed', false)->get();

        // $devices = DeviceUser::where('user_id', $request->user()->id)->get();
        return view('mykover::security.edit', compact('groupedDevices','user', 'notifications'));
    }

    /**
     * Edit the user's password.
     */
    public function editPassword(Request $request): View
    {
        $user = $request->user();
        // $devices = DeviceUser::where('user_id', $request->user()->id)->get();
        return view('mykover::security.partials.page.update-password', compact('user'));
    }

    /**
     * Edit the user's security informations.
     */
    public function editTwoStep(Request $request): View
    {
        $user = $request->user();
        // $devices = DeviceUser::where('user_id', $request->user()->id)->get();
        return view('mykover::security.partials.page.two-factor', compact('user'));
    }



    /**
     * Display the user's profile form.
     */
    public function editAlert(Request $request): View
    {

        // Mark all notifications as viewed
        UserSecurityNotification::where('user_id', $request->user()->id)
            ->where('is_viewed', false)
            ->update(['is_viewed' => true]);

        return view('mykover::security.partials.page.security-notification', [
            'user' => $request->user(),
        ]);
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Update the user's password.
     */
    public function updatePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => [
                'confirmed',
                'required',
                Password::min(12)     // Minimum length of 12 characters
                        ->mixedCase()       // Require at least one uppercase and one lowercase letter
                        ->letters()         // Require at least one letter
                        ->numbers()         // Require at least one number
                        ->symbols()         // Require at least one symbol
                        ->uncompromised()   // Check if the password has been exposed in data breaches
            ],
        ]);
        // $request->user()->fill($request->validated());
        $user = User::find($request->user()->id);
        $user->update([
            'password' => Hash::make($request->password),
            'password_updated_at' => now()
        ]);
        $user->save();
        $currentDeviceId = DeviceTracker::detect();
        // $device = Device::find($currentDeviceId)->first();
        $notification = UserSecurityNotification::create([
            'user_id' => $user->id,
            'device_id' => $user->id,
            'country' => $request->ipinfo->country_name,
            'title' => 'Password changed',
            'message' => "If you haven't changed your password, someone may be using your account.",
            'type' => 'alert',
            'is_confirmed' => true,
            'is_deny' => false,
            'date' => now(),
            'is_device' => true,
        ]);
        $notification->save();

        return Redirect::route('security.edit')->with('status', 'profile-updated');
    }

    /**
     * Update the user's password.
     */
    public function updateTwoStep(Request $request): RedirectResponse
    {
        $request->validate([
            'two_factor' => [ 'boolean'],
            'two_factor_second_step' => ['required', 'string'],
        ]);
        // $request->user()->fill($request->validated());
        $user = User::find($request->user()->id);
        $user->update([
            'two_factor_enabled' => $request->two_factor,
            'two_factor_second_step' => $request->two_factor_second_step
        ]);
        $user->save();

        return Redirect::route('security.edit')->with('status', 'profile-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteByIp($ip)
    {
        Device::where('ip', $ip)->delete();

        return redirect()->back()->with('success', 'Devices deleted successfully.');
    }
}
