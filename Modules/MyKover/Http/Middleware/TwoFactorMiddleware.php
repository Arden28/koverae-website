<?php

namespace Modules\MyKover\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class TwoFactorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next) {

        $user = User::find(auth()->user()->id); // Get the authenticated user

        if (auth()->check()) { // Check if any user is authenticated
            // Check if two-factor authentication is required
            if ($user->two_factor_code) {
                // Check if the OTP has expired
                if ($user->two_factor_expires_at < now()) {
                    $user->resetTwoFactorCode(); // Reset the two-factor code
                    auth()->logout(); // Log out the user
                    // Redirect to the login page with a status message
                    return redirect()->route('login')
                        ->withStatus('Your verification code expired. Please re-login.');
                }
                // Check if the current IP matches the last login IP and if the user is not on a verification route
                if ($user->last_login_ip !== $request->ip() && !$request->is('verify*')) {
                    // Redirect to the OTP verification page
                    return redirect()->route('verify.index');
                }
            }
        }
        return $next($request);
    }
}
