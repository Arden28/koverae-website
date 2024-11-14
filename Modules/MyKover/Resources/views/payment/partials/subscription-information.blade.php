<section>
    <header>
        <h5 class="text-lg font-medium text-gray-900">
            {{ __('Subscriptions') }}
        </h5>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Your recurring payments related to subscription services") }}
        </p>

    </header>

    <div class="p-2 k-box" style="cursor: pointer;">
        <div class="d-flex">
            <div class="row w-100">
                <div class="col-md-12 d-flex">
                    <img src="{{ asset('assets/images/logo.png') }}" class="mr-3"  height="36px" alt="">
                    <p class="inline-block">
                        {{ __('Koverae: Your business on one platform') }}
                    </p>
                </div>
            </div>
            <a href="#" class="ml-5 text-right k-box-chevron d-block w-25 text-decoration-none"><i class="border bi bi-chevron-right"></i></a>
        </div>
    </div>
    {{-- <div class="p-2 k-box" style="cursor: pointer;">
        <div class="d-flex">
            <div class="row w-100">
                <div class="text-center col-md-12 d-flex">
                    <p class="inline-block">
                        {{ __('No Subscriptions at the moment') }}
                    </p>
                </div>
            </div>
        </div>
    </div> --}}
</section>
