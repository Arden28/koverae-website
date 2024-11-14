@extends('layouts.app')

@section('page_title', 'Reset Password')

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
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </p>
            </div>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mb-3 field-login">
                    <label for="email" class="fom-label">
                        {{ __('Email Address') }}
                    </label>
                    <input name="email" required class="form-control" type="email" id="email" placeholder="Your email address">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>


                <button class="btn btn-primary float-start text-uppercase fw-bolder w-100" type="submit">
                    {{ __('Email Password Reset Link') }}
                </button>
                <div class="clearfix gap-1 pt-3 mb-1 text-center k_login_buttons d-grid">

                    <div class="links-container">
                        @if(Route::has('login'))
                            <a href="{{ route('login')}}" class="login-link">{{ __("Back to login") }}</a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
