<section>
    <header>
        <h4 class="text-lg font-medium text-gray-900">
            {{ __('Addresses') }}
        </h4>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Manage addresses associated with your Koverae account.") }}
        </p>
    </header>

    <div class="p-3 k-box border-bottom" style="cursor: pointer;">
        <div class="d-flex">
            <div class="row w-75">
                <span class="col-md-5 small">
                    {{ __('Home') }}
                </span>
                <div class="col-md-7 d-block ">
                    {{ $user->addressHome() }}
                </div>
            </div>
            <a href="{{ route('profile.edit.home-address') }}" class="ml-5 text-right k-box-chevron d-block w-25 text-decoration-none"><i class="border bi bi-chevron-right"></i></a>
        </div>
    </div>
    <div class="p-3 k-box" style="cursor: pointer;">
        <div class="d-flex">
            <div class="row w-75">
                <span class="col-md-5 small">
                    {{ __('Work') }}
                </span>
                <div class="col-md-7 d-block ">
                    {{ $user->addressWork() ?? __('Not defined') }}
                </div>
            </div>
            <a href="{{ route('profile.edit.work-address') }}" class="ml-5 text-right k-box-chevron d-block w-25 text-decoration-none"><i class="border bi bi-chevron-right"></i></a>
        </div>
    </div>
    {{-- <div class="p-3 k-box" style="cursor: pointer;">
        <div class="d-flex">
            <div class="row w-75">
                <span class="col-md-5 small">
                    {{ __('Other') }}
                </span>
                <div class="col-md-7 d-block ">
                    {{ __('Other addresses you added.') }}
                </div>
            </div>
            <a href="#" class="ml-5 text-right k-box-chevron d-block w-25 text-decoration-none"><i class="border bi bi-chevron-right"></i></a>
        </div>
    </div> --}}

</section>
