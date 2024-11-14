<section>
    <header>
        <h5 class="text-lg font-medium text-gray-900">
            {{ __('How to sign in to Koverae') }}
        </h5>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Make sure you can still access your Koverae account by keeping this information up to date") }}
        </p>
    </header>

    <div class="p-3 k-box border-bottom" style="cursor: pointer;">
        <div class="d-flex">
            <div class="row w-100">
                <div class="col-md-7 d-flex">
                    <i class="mr-3 bi bi-shield-lock"></i>
                    <p class="inline-block">
                        {{ __('Two-step validation') }}
                    </p>
                </div>
                <span class="col-md-5 col-12" style="font-size: 14px; line-height: 20px;">
                    @if($user->two_factor_enabled == true)
                    <i class="bi bi-check-circle-fill" style="font-size: 18px; line-height: 20px; color: green;"></i> {{ __('Enabled') }}
                    @else
                    <i class="bi bi-x-circle-fill" style="font-size: 18px; line-height: 20px; color: red;"></i> {{ __('Disabled') }}
                    @endif
                </span>
            </div>
            <a href="{{ route('security.edit.steps') }}" class="ml-5 text-right k-box-chevron d-block w-25 text-decoration-none"><i class="border bi bi-chevron-right"></i></a>
        </div>
    </div>

    {{-- <div class="p-3 k-box border-bottom" style="cursor: pointer;">
        <div class="d-flex">
            <div class="row w-100">
                <div class="col-md-7 d-flex ">
                    <i class="mr-3 bi bi-key"></i>
                    <p class="inline-block">
                        {{ __('Access keys and security keys') }}
                    </p>
                </div>
                <span class="col-md-5 col-12" style="font-size: 14px; line-height: 20px;">
                    {{ __('Start using access keys') }}
                </span>
            </div>
            <a href="#" class="ml-5 text-right k-box-chevron d-block w-25 text-decoration-none"><i class="border bi bi-chevron-right"></i></a>
        </div>
    </div> --}}

    <div class="p-3 k-box border-bottom" style="cursor: pointer;">
        <div class="d-flex">
            <div class="row w-100">
                <div class="col-md-7 d-flex ">
                    <i class="mr-3 bi bi-lock"></i>
                    <p class="inline-block">
                        {{ __('Password') }}
                    </p>
                </div>
                <span class="col-md-5 col-12" style="font-size: 14px; line-height: 20px;">
                    {{ __('Last modification:') }} {{ \Carbon\Carbon::parse($user->password_updated_at)->format('d M Y') }}
                </span>
            </div>
            <a href="{{ route('security.edit.password') }}" class="ml-5 text-right k-box-chevron d-block w-25 text-decoration-none"><i class="border bi bi-chevron-right"></i></a>
        </div>
    </div>

    <div class="p-3 k-box" style="cursor: pointer;">
        <div class="d-flex">
            <div class="row w-100">
                <div class="col-md-7 d-flex ">
                    <i class="mr-3 bi bi-unlock"></i>
                    <p class="inline-block">
                        {{ __('Ignore password if possible') }}
                    </p>
                </div>
                <span class="col-md-5 col-12" style="font-size: 14px; line-height: 20px;">
                    {{-- <i class="bi bi-x-circle-fill" style="font-size: 18px; line-height: 20px; color: red;"></i> {{ __('Disabled') }} --}}
                    <i class="bi bi-check-circle-fill" style="font-size: 18px; line-height: 20px; color: green;"></i> {{ __('Enabled') }}
                </span>
            </div>
            <a href="#" class="ml-5 text-right k-box-chevron d-block w-25 text-decoration-none"><i class="border bi bi-chevron-right"></i></a>
        </div>
    </div>

    {{-- <div class="p-3 k-box border-bottom" style="cursor: pointer;">
        <div class="d-flex">
            <div class="row w-100">
                <div class="col-md-7 d-flex ">
                    <i class="mr-3 bi bi-chat-right-dots"></i>
                    <p class="inline-block">
                        {{ __('Phones for two-step verification') }}
                    </p>
                </div>
                <span class="col-md-5 col-12" style="font-size: 14px; line-height: 20px;">
                    <span class="w-100">
                        {{ $user->phone }}
                    </span>
                </span>
            </div>
            <a href="#" class="ml-5 text-right k-box-chevron d-block w-25 text-decoration-none"><i class="border bi bi-chevron-right"></i></a>
        </div>
    </div>

    <div class="p-3 k-box border-bottom" style="cursor: pointer;">
        <div class="d-flex">
            <div class="row w-100">
                <div class="col-md-7 d-flex ">
                    <i class="mr-3 bi bi-phone"></i>
                    <p class="inline-block">
                        {{ __('Recovery phone number') }}
                    </p>
                </div>
                <span class="col-md-5 col-12" style="font-size: 14px; line-height: 20px;">
                    <span class="w-100">
                        {{ $user->phone }}
                    </span>
                </span>
            </div>
            <a href="#" class="ml-5 text-right k-box-chevron d-block w-25 text-decoration-none"><i class="border bi bi-chevron-right"></i></a>
        </div>
    </div>

    <div class="p-3 k-box" style="cursor: pointer;">
        <div class="d-flex">
            <div class="row w-100">
                <div class="col-md-7 col-12 d-flex">
                    <i class="mr-3 bi bi-envelope"></i>
                    <p class="inline-block ">{{ __('Recovery e-mail address') }}</p>
                </div>
                <span class="col-md-5 col-12" style="font-size: 14px; line-height: 20px;">
                    <span class="w-100">
                        {{ $user->recovery_email ?? __('Not defined')}}
                    </span>
                </span>
            </div>
            <a href="#" class="ml-5 text-right k-box-chevron d-block w-25 text-decoration-none"><i class="border bi bi-chevron-right"></i></a>
        </div>
    </div> --}}

</section>
