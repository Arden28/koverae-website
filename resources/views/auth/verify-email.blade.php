@extends('layouts.app')

@section('page_title', 'Verify Email Address')

@section('styles')
<style>

    /* Auth */
    .page-content{
        font-size: 14px;
        line-height: 22px;
        text-decoration: none solid rgb(52, 58, 64);
        word-spacing: 0px;
        background-attachment: fixed;
        background-image: url('../images/background/bg-3.jpg');
        background-repeat: no-repeat;
        height: 100%;
        /* width: auto; */
        /* min-height: 642px; */
        min-width: auto;
    }


</style>
@endsection

@section('content')
<section id="hero" class="justify-content-lg-center d-flex" style="margin: 20px 0 0 0;">
    <div class="shadow k_website_login card">
        <img class="mx-auto k_logo" src="{{ asset('assets/images/logo/logo.png') }}" />
        <div class="card-body">
            <div class="text-center k-alert alert-info">
                <p>
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you. If you didn\'t receive the email, we will gladly send you another.') }}
                </p>
            </div>
            <!-- Session Status -->
            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 text-sm font-medium text-green-600">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <div class="pt-3 mb-1 text-center">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button class="btn btn-primary float-start text-uppercase w-100" type="submit">
                        {{ __('Resend Verification Email') }}
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="mt-2 btn btn-secondary float-start text-uppercase w-100" type="submit">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
