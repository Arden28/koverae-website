<section>
    <header>
        <h5 class="text-lg font-medium text-gray-900">
            {{ __('Payment Methods') }}
        </h5>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Payment methods are saved in your Koverae account so you can use them in Koverae services") }}
        </p>

    </header>

    @forelse($user->paymentMethods as $key => $method)
    <div class="p-3 k-box" style="cursor: pointer;">
        <div class="d-flex">
            <div class="row w-75">
                <div class="col-md-7 d-flex ">
                    <img src="{{ asset('assets/images/visa.png') }}" class="mr-2"  width="36px" height="36px" alt="">
                    <p class="inline-block">
                        {{ __('Visa') }} {{ maskCreditCard($method->card_number) }}
                    </p>
                </div>
                <span class="col-md-5 col-12" style="font-size: 14px; line-height: 20px;">
                    {{ __('Exp') }}: {{ $method->card_expiry_date }}
                </span>
            </div>
            <span class="ml-5 text-right k-box-chevron d-block w-25 text-decoration-none">
                <a href="#" title="{{ __('Update') }}" class=""><i class="bi bi-pencil-square"></i></a>
                <a href="#" title="{{ __('Delete') }}" class=""><i class="bi bi-trash"></i></a>
            </span>
        </div>
    </div>
    @empty
        <div class="p-3 k-box">
            <p>{{ __('No payment methods available.') }}</p>
        </div>
    @endforelse

    {{-- <div class="p-3 k-box" style="cursor: pointer;">
        <div class="d-flex">
            <div class="row w-75">
                <div class="col-md-12 d-flex ">
                    <img src="{{ asset('assets/images/m-pesa.png') }}" class="mr-2"  width="36px" height="36px" alt="">
                    <p class="inline-block">
                        {{ __('M-PESA XXXX-8026') }}
                    </p>
                </div>
            </div>
            <span class="ml-5 text-right k-box-chevron d-block w-25 text-decoration-none">
                <a href="#" title="{{ __('Update') }}" class=""><i class="bi bi-pencil-square"></i></a>
                <a href="#" title="{{ __('Delete') }}" class=""><i class="bi bi-trash"></i></a>
            </span>
        </div>
    </div>
    <div class="p-3 k-box" style="cursor: pointer;">
        <div class="d-flex">
            <div class="row w-75">
                <div class="col-md-12 d-flex ">
                    <img src="{{ asset('assets/images/momo.png') }}" class="mr-2"  width="36px" height="36px" alt="">
                    <p class="inline-block">
                        {{ __('MTN-MOMO XXXX-4926') }}
                    </p>
                </div>
            </div>
            <span class="ml-5 text-right k-box-chevron d-block w-25 text-decoration-none">
                <a href="#" title="{{ __('Update') }}" class=""><i class="bi bi-pencil-square"></i></a>
                <a href="#" title="{{ __('Delete') }}" class=""><i class="bi bi-trash"></i></a>
            </span>
        </div>
    </div> --}}
    {{-- <div class="p-2 k-box" style="cursor: pointer;">
        <div class="d-flex">
            <div class="row w-100">
                <div class="text-center col-md-12 d-flex">
                    <p class="inline-block">
                        {{ __('No Payment Methods at the moment') }}
                    </p>
                </div>
            </div>
        </div>
    </div> --}}

</section>
