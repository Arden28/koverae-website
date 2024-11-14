<section>
    <header>
        <h4 class="text-lg font-medium text-gray-900">
            {{ __('Contact Information') }}
        </h4>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Some of this information may be seen by other users of Koverae services.") }}
        </p>
    </header>

    <div class="p-3 k-box border-bottom" style="cursor: pointer;">
        <div class="d-flex">
            <div class="row w-75">
                <span class="col-md-5 small">
                    {{ __('E-mail Addresses') }}
                </span>
                <div class="col-md-7 d-block ">
                    <span class="w-100">
                        {{ $user->email }}
                    </span>
                    <span class="w-100">
                        {{ $user->recovery_email }}
                    </span>
                </div>
            </div>
            <a href="{{ route('profile.edit.email') }}" class="ml-5 text-right k-box-chevron d-block w-25 text-decoration-none"><i class="border bi bi-chevron-right"></i></a>
        </div>
    </div>
    <div class="p-3 k-box" style="cursor: pointer;">
        <div class="d-flex">
            <div class="row w-75">
                <span class="col-md-5 small">
                    {{ __('Phone') }}
                </span>
                <div class="col-md-7 d-block ">
                    {{ $user->phone }}
                </div>
            </div>
            <a href="{{ route('profile.edit.phone') }}" class="ml-5 text-right k-box-chevron d-block w-25 text-decoration-none"><i class="border bi bi-chevron-right"></i></a>
        </div>
    </div>
</section>
