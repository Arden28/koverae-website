@extends('layouts.app')

@section('page_title', "Recent activity related to your account security")

@section('content')
<div id="hero" style="height: 1px;">

</div>
<div class="text-black container-md w-100">
    <header class="mb-2 text-left border-bottom">
        <h3><a href="{{ route('security.edit') }}"><i class="bi bi-arrow-left-circle"></i></a></h3>
    </header>
    <section class="p-lg-3">
        <div class="container p-3 rounded k-form">

            @foreach($user->securityNotifications as $notification)
            <div class="mb-3 security-alert border-bottom">
                <span class="message">{{ \Carbon\Carbon::parse($notification->date)->format('d M Y, H:i') }} </span>
                <div class="mt-2">
                    <h5 class="">{{ $notification->title }}</h5>
                    <p>{{ $notification->message }}</p>
                    <div class="gap-1 d-flex">
                        @php
                            $device = IvanoMatteo\LaravelDeviceTracking\Models\Device::find($notification->device_id)->first();
                            $agent = new \Jenssegers\Agent\Agent();
                            $agent->setUserAgent($device->user_agent);
                            $current = \IvanoMatteo\LaravelDeviceTracking\Facades\DeviceTracker::findCurrentDevice();
                        @endphp
                        @if($agent->isMobile())
                            <img src="{{ asset('assets/images/phone.png') }}" class="mr-2"  width="36px" height="36px" alt="">
                        @elseif($agent->isTablet())
                            <img src="{{ asset('assets/images/tablet.png') }}" class="mr-2"  width="36px" height="36px" alt="">
                        @elseif($agent->isDesktop())
                            <img src="{{ asset('assets/images/pc.png') }}" class="mr-2"  width="36px" height="36px" alt="">
                        @else
                            <img src="{{ asset('assets/images/pc.png') }}" class="mr-2"  width="36px" height="36px" alt="">
                        @endif
                        <p class="">
                            <b>{{ $device->data['platform_name'] }}</b><br>
                            <span>{{ $notification->country ?? 'Kenya' }}
                                @if($device->id = $current->id)
                                    , <i class="bi bi-check-circle-fill" style="color: #0E6163;"></i> {{ __('This device') }}</span>
                                @endif
                        </p>
                    </div>
                </div>
                @if($notification->type == 'confirm')
                <div class="p-2 mb-2 ask-confirmation">
                    <p>{{ __('Do you recognize this activity?') }}</p>
                    <div class="gap-1 pl-3 row">
                        <a href="" class="p-2 text-center border col-6 font-weight-bold dropdown-item" style="color: red;"><i class="bi bi-x"></i> {{ __('No, secure my account') }}</a>
                        <a href="" class="p-2 text-center border col-6 font-weight-bold dropdown-item" style="color: #0E6163;"><i class="bi bi-check"></i>{{ __('Yes, it was me') }}</a>
                    </div>
                </div>
                @endif
            </div>
            @endforeach

        </div>
    </section>
</div>
@endsection
