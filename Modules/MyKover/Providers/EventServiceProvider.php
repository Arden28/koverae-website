<?php

namespace Modules\MyKover\Providers;

use Illuminate\Auth\Events\Login;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use IvanoMatteo\LaravelDeviceTracking\Events\DeviceCreated;
use Modules\MyKover\Listeners\NotifyConnectionUpdate;
use Modules\MyKover\Listeners\NotifySecurityUpdate;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        DeviceCreated::class => [
            NotifySecurityUpdate::class
        ],
        Login::class => [
            NotifyConnectionUpdate::class,
            NotifySecurityUpdate::class,
        ],
    ];
}
