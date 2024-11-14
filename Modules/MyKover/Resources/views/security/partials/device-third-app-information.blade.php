
<div class="p-3 mb-4 bg-white border rounded col-md-6">
    <section class="">
        <header>
            <h5 class="text-lg font-medium text-gray-900">
                {{ __('Your Devices') }}
            </h5>
            <p class="mt-1 text-sm text-gray-600">
                {{ __("Devices you are logged in on") }}
            </p>

        </header>
        @foreach($groupedDevices as $ip => $data)
        <div class="p-2 k-box" style="cursor: pointer;">
            <div class="d-flex">
                <div class="row w-100">
                    <div class="col-md-12 d-flex">
                        @php
                            $device = $data['device'];
                            $agent = new \Jenssegers\Agent\Agent();
                            $agent->setUserAgent($device->data['user_agent']);
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

                        <p class="inline-block">
                            {{ $data['count'] }} {{ __('Sessions on ') }} <strong>{{ $device->data['platform_name'] }}</strong>
                        </p>
                    </div>
                </div>
                <form action="{{ route('devices.deleteByIp', $ip) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="device_id">
                    <button type="submit" class="p-0 btn btn-linktext-right link k-box-chevron d-block w-25 text-decoration-none"><i class="border bi bi-trash"></i></button>
                </form>
            </div>
        </div>
    @endforeach

    </section>
    {{-- <a href="" class="p-2 k-box d-block">{{ __('Manage all devices') }}</a> --}}
</div>
{{-- <div class="p-3 row">
    <div class="p-3 mb-4 bg-white border rounded col-md-6">
        <section class="border-bottom">
            <header>
                <h5 class="text-lg font-medium text-gray-900">
                    {{ __('Your connections to third-party apps and services') }}
                </h5>
                <p class="mt-1 text-sm text-gray-600">
                    {{ __("Track your connections to third-party apps and services") }}
                </p>
            </header>

            <div class="p-2 k-box" style="cursor: pointer;">
                <div class="d-flex">
                    <div class="row w-100">
                        <div class="col-md-12 d-flex">
                            <img src="{{ asset('assets/images/canva.png') }}" class="mr-2"  width="36px" height="36px" alt="">
                            <p class="inline-block">
                                {{ __('Canva: Design, Art & AI Editor') }}
                            </p>
                        </div>
                    </div>
                    <a href="#" class="ml-5 text-right k-box-chevron d-block w-25 text-decoration-none"><i class="border bi bi-chevron-right"></i></a>
                </div>
            </div>
            <div class="p-2 k-box" style="cursor: pointer;">
                <div class="d-flex">
                    <div class="row w-100">
                        <div class="col-md-12 d-flex">
                            <img src="{{ asset('assets/images/eventbride.png') }}" class="mr-2"  width="36px" height="36px" alt="">
                            <p class="inline-block">
                                {{ __('Eventbrite - Discover events') }}
                            </p>
                        </div>
                    </div>
                    <a href="#" class="ml-5 text-right k-box-chevron d-block w-25 text-decoration-none"><i class="border bi bi-chevron-right"></i></a>
                </div>
            </div>
            <div class="p-2 k-box" style="cursor: pointer;">
                <div class="d-flex">
                    <div class="row w-100">
                        <div class="col-md-12 d-flex">
                            <img src="{{ asset('assets/images/jumia.jpg') }}" class="mr-2"  width="36px" height="36px" alt="">
                            <p class="inline-block">
                                {{ __('Jumia: The Africa N° 1 e-commerce') }}
                            </p>
                        </div>
                    </div>
                    <a href="#" class="ml-5 text-right k-box-chevron d-block w-25 text-decoration-none"><i class="border bi bi-chevron-right"></i></a>
                </div>
            </div>
            <div class="p-2 k-box" style="cursor: pointer;">
                <div class="d-flex">
                    <div class="row w-100">
                        <div class="col-md-12 d-flex">
                            <p class="inline-block" style="font-size: 14px; line-height: 20px; color: gray;">
                                + {{ __('7 others') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <a href="" class="p-2 k-box d-block">{{ __('See all connections') }}</a>
    </div>
</div> --}}
