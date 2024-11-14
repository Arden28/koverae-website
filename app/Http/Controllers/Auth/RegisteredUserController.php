<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserAddress;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;
use Modules\MyKover\Notifications\SendTwoFactorCodeNotification;
use Modules\MyKover\Notifications\WelcomeToKoveraeNotification;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'day_of_birth' => ['required'],
            'month_of_birth' => ['required'],
            'year_of_birth' => ['required'],
            'gender' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'recovery_email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'string', 'min:9', 'unique:'.User::class],
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

        $user = User::create([
            'first_name' => $request->first_name,
            'name' => $request->name,
            'day_of_birth' => $request->day_of_birth,
            'month_of_birth' => $request->month_of_birth,
            'year_of_birth' => $request->year_of_birth,
            'gender' => $request->gender,
            'email' => $request->email,
            'recovery_email' => $request->recovery_email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);
        $user->generateAvatar();

        $address = UserAddress::create([
            'user_id' => $user->id,
            'city' => $request->ipinfo->city,
            'country' => $request->ipinfo->country,
            'region' => $request->ipinfo->region,
            // 'state' => $request->ipinfo->state,
            'zip' => $request->ipinfo->postal,
            'loc' => $request->ipinfo->loc,
            'latitude' => $request->ipinfo->latitude,
            'longitude' => $request->ipinfo->longitude,
            'type' => 'home',
        ]);
        $address->save();

        $work_address = UserAddress::create([
            'user_id' => $user->id,
            'type' => 'work',
        ]);
        $work_address->save();

        event(new Registered($user));

        // Send connection notiification email
        $user->generateTwoFactorCode();
        $user->notify(new SendTwoFactorCodeNotification());

        // Send welcome notification email
        $user->notify(new WelcomeToKoveraeNotification());

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
