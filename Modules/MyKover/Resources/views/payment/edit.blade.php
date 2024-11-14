@extends('layouts.app')

@section('page_title', __('Payments & Subscriptions'))

@section('content')
<div id="hero" style="height: 1px;">

</div>
<div class="text-black container-md w-100">

    <section class="mt-3 mb-4">
        <div class="row">
            <div class="col-lg-7">
                <h3>{{ __('Payments & Subscriptions') }}</h3>
                <p>{{ __('Your payment information, transactions and recurring payments.') }}</p>
            </div>
        </div>
    </section>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 mb-4 bg-white border rounded sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('mykover::payment.partials.payment-method-information')
                </div>
            </div>
            {{-- <div class="p-4 mb-4 bg-white border rounded sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('mykover::payment.partials.subscription-information')
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection
