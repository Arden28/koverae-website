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
                    {!! __('Your account has been recovered. Now you can create a new password') !!}
                </p>
            </div>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="mb-3 field-login">
                    <label for="email" class="fom-label">
                        {{ __('Email Address') }}
                    </label>
                    <input name="email" required class="form-control" type="email" id="email" placeholder="Your email address" value="{{ old('email', $request->email) }}">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="py-2 col-12 field-password koverae_password_revear">
                    <label for="password" class="fom-label">
                        {{ __('New Password') }}
                    </label>
                    <input class="form-control" name="password" type="password" id="password" placeholder="Your password"
                        required autocomplete="new-password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="py-2 col-12 field-password koverae_password_revear">
                    <label for="password_confirmation" class="fom-label">
                        {{ __('Confirm Password') }}
                    </label>
                    <input class="form-control" name="password_confirmation" type="password" id="password_confirmation" placeholder="Repeat your password"
                        required autocomplete="new-password">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="clearfix gap-1 pt-3 mb-1 text-center k_login_buttons d-grid">
                    <button class="btn btn-primary float-start text-uppercase w-100" type="submit">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
