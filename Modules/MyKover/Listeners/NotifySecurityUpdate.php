<?php

namespace Modules\MyKover\Listeners;

use App\Models\UserSecurityNotification;
use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use IvanoMatteo\LaravelDeviceTracking\Events\DeviceCreated;
use IvanoMatteo\LaravelDeviceTracking\Facades\DeviceTracker;

class NotifySecurityUpdate
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
        if ($event instanceof DeviceCreated) {
            // Handle user registered event
            UserSecurityNotification::create([
                'user_id' => $event->user->id,
                'device_id' => $event->device->id,
                'date' => now(),
                'title' => "Your account has been logged in on a new device.",
                'message' => "Your account has been logged in on a new device
                                If this action is not yours, then someone else has access to your account. Please confirm that this is you.",
                'type' => 'confirm',
                'is_device' => false,
                'country' => $this->request->ipinfo->country_name
            ]);
            Log::info('Your account has been logged in a new device: ' . $event->user->email);
        }

        if ($event instanceof Login) {
            // Handle user registered event
            $device = DeviceTracker::findCurrentDevice();
            UserSecurityNotification::create([
                'user_id' => $event->user->id,
                'device_id' => $device->id,
                'date' => now(),
                'title' => "Notification of connection to your Koverae Space",
                'message' => "Connection to your Koverae Space has been made successfully.
                                If you are the originator of this connection, no further action is necessary.
                                If you are not the originator of this connection, this means that someone else was able to access your account. We recommend that you change your password and check the connected devices on your Koverae Space.",
                'type' => 'alert',
                'is_device' => false,
                'country' => $this->request->ipinfo->country_name
            ]);
            Log::info('Your account has been logged in a new device: ' . $event->user->email);
        }
    }
}
