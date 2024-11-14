<?php

namespace Modules\MyKover\Http\Controllers;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Modules\MyKover\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('mykover::profile.edit', [
            'user' => $request->user(),
        ]);
    }
    // Update Name
    public function editName(Request $request): View
    {
        return view('mykover::profile.partials.page.update-name', [
            'user' => $request->user(),
        ]);
    }
    // Update Birthday
    public function editBirthday(Request $request): View
    {
        return view('mykover::profile.partials.page.update-birthday', [
            'user' => $request->user(),
        ]);
    }
    // Update Gender
    public function editGender(Request $request): View
    {
        return view('mykover::profile.partials.page.update-gender', [
            'user' => $request->user(),
        ]);
    }
    // Update Email Addresses
    public function editEmail(Request $request): View
    {
        return view('mykover::profile.partials.page.update-mail', [
            'user' => $request->user(),
        ]);
    }
    // Update Phone Number
    public function editPhone(Request $request): View
    {
        return view('mykover::profile.partials.page.update-phone', [
            'user' => $request->user(),
        ]);
    }
    // Update Home Address
    public function editHomeAddress(Request $request): View
    {
        return view('mykover::profile.partials.page.update-home-address', [
            'user' => $request->user(),
            'address' => $request->user()->addresses()->where('type', 'home')->where('user_id', $request->user()->id)->first()
        ]);
    }
    // Update Work Address
    public function editWorkAddress(Request $request): View
    {
        return view('mykover::profile.partials.page.update-work-address', [
            'user' => $request->user(),
            'address' => $request->user()->addresses()->where('type', 'work')->where('user_id', $request->user()->id)->first()
        ]);
    }


    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
    /**
     * Update the user's profile information.
     */
    public function updateAvatar(Request $request): RedirectResponse
    {

        // Validate the request
        $validator = Validator::make($request->all(), [
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $request->avatar->storeAs('avatars',$request->user()->avatar,'public');

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
    /**
     * Update the user's profile information.
     */
    public function updateName(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
        ]);
        // $request->user()->fill($request->validated());
        $user = User::find($request->user()->id);
        $user->update([
            'first_name' => $request->first_name,
            'name' => $request->name,
        ]);
        $user->save();
        // $user->generateAvatar();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
    /**
     * Update the user's birth information.
     */
    public function updateBirth(Request $request): RedirectResponse
    {
        $request->validate([
            'day_of_birth' => ['required', 'integer'],
            'month_of_birth' => ['required', 'integer'],
            'year_of_birth' => ['required', 'integer'],
        ]);
        // $request->user()->fill($request->validated());
        $user = User::find($request->user()->id);
        $user->update([
            'day_of_birth' => $request->day_of_birth,
            'month_of_birth' => $request->month_of_birth,
            'year_of_birth' => $request->year_of_birth,
        ]);
        $user->save();
        // $user->generateAvatar();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
    /**
     * Update the user's gender information.
     */
    public function updateGender(Request $request): RedirectResponse
    {
        $request->validate([
            'gender' => ['required', 'string'],
        ]);
        // $request->user()->fill($request->validated());
        $user = User::find($request->user()->id);
        $user->update([
            'gender' => $request->gender,
        ]);
        $user->save();
        // $user->generateAvatar();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
    /**
     * Update the user's email information.
     */
    public function updateEmail(Request $request): RedirectResponse
    {
        $request->validate([
            'recovery_email' => ['required', 'string', 'email', 'unique:'.User::class],
        ]);
        // $request->user()->fill($request->validated());
        $user = User::find($request->user()->id);
        $user->update([
            'recovery_email' => $request->recovery_email,
        ]);
        $user->save();
        // $user->generateAvatar();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
    /**
     * Update the user's email information.
     */
    public function updatePhone(Request $request): RedirectResponse
    {
        $request->validate([
            'phone' => ['required', 'string', 'min:9', 'unique:'.User::class],
        ]);
        // $request->user()->fill($request->validated());
        $user = User::find($request->user()->id);
        $user->update([
            'phone' => $request->phone,
        ]);
        $user->save();
        // $user->generateAvatar();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
    /**
     * Update the user's home address.
     */
    public function updateHomeAddress(Request $request): RedirectResponse
    {
        $request->validate([
            'country' => ['required', 'string'],
            'region' => ['nullable', 'string'],
            'city' => ['required', 'string'],
            'zip' => ['required', 'string'],
            'street' => ['nullable', 'string', 'max:200'],
        ]);
        $address = $request->user()->addresses()->where('type', 'home')->where('user_id', $request->user()->id)->first();

        $address->update([
            'country' => $request->country,
            'region' => $request->region,
            'city' => $request->city,
            'zip' => $request->zip,
            'street' => $request->street,
        ]);

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Update the user's home address.
     */
    public function updateWorkAddress(Request $request): RedirectResponse
    {
        $request->validate([
            'country' => ['required', 'string'],
            'region' => ['nullable', 'string'],
            'city' => ['required', 'string'],
            'zip' => ['required', 'string'],
            'street' => ['nullable', 'string', 'max:200'],
        ]);
        $address = $request->user()->addresses()->where('type', 'work')->where('user_id', $request->user()->id)->first();

        $address->update([
            'country' => $request->country,
            'region' => $request->region,
            'city' => $request->city,
            'zip' => $request->zip,
            'street' => $request->street,
        ]);

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
