@extends('layouts.app')

@section('page_title', 'Forgot Password')

@section('content')
    <div id="hero">
        <div class="shadow k_website_login card">
            <img class="mx-auto k_logo" src="{{ asset('assets/images/logo/logo.png') }}" />
            <div class="card-body">
                <div class="text-center k-alert alert-info">
                    <p>
                        {{ __('This is a restricted area of ​​the application. Please confirm your password before continuing.') }}
                    </p>
                </div>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <div class="mb-3 field-login">
                        <label for="password" class="fom-label">
                            {{ __('Password') }}
                        </label>
                        <input name="password" required autocomplete="current-password" class="form-control" type="password" id="password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="clearfix gap-1 pt-3 mb-1 text-center k_login_buttons d-grid">
                        <button class="btn btn-primary float-start text-uppercase w-100" type="submit">
                            {{ __('Confirm') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
