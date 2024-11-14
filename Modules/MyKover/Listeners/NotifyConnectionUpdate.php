<?php

namespace Modules\MyKover\Listeners;

use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Modules\MyKover\Notifications\LoginAlertNotification;
use Modules\MyKover\Notifications\SendTwoFactorCodeNotification;

class NotifyConnectionUpdate
{
    protected $request;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function handle($event)
    {
        if ($event instanceof Login) {
            // Log the login date
            $user = User::find($event->user->id);
            $user->last_logged_in_at = now();
            $user->save();

            if ($user->last_login_ip !== $this->request->ipinfo->ip) {
                $user->generateTwoFactorCode();
                $user->notify(new SendTwoFactorCodeNotification());
            }

            // Send connection notification email
            $user->notify(new LoginAlertNotification());
        }
    }
}
