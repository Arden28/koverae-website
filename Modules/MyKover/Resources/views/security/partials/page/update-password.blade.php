@extends('layouts.app')

@section('page_title', "Password")

@section('content')
<div id="hero" style="height: 1px;">

</div>
<div class="text-black container-md w-100">
    <header class="mb-2 text-left border-bottom">
        <h3><a href="{{ route('profile.edit') }}"><i class="bi bi-arrow-left-circle"></i></a> {{ __('Password') }}</h3>
    </header>
    <section class="p-lg-3">
        <form class="container p-3 rounded k-form" method="post" action="{{ route('security.update.password') }}">
            @csrf
            @method('patch')

            <span class="message">{{ __('Choose a strong password and do not reuse it for other accounts.You may be signed out of your account on some devices or third-party apps.') }}</span>
            <div class="mt-3 mb-3">
                <label for="password" class="m-0">{{ __('New Password') }}</label>
                <input class="form-control" name="password" type="password" id="password" placeholder="New Password"
                    required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="help">
                <h6 class="" style="font-size: 14px;">{{ __('Password strength level') }}</h6>
                <div class="gap-1 d-flex">
                    <p>{{ __("Use at least 8 characters, 1 symbol, 1 capital letter, and 1 number. Don't choose a password you already use on another site or one that is too obvious, such as your pet's name.") }}</p>
                </div>
            </div>

            <div class="mt-1 mb-3">
                <label for="password_confirmation" class="m-0">{{ __('Confirm New Password') }}</label>
                <input class="form-control" name="password_confirmation" type="password" id="password_confirmation" placeholder="Confirm New Password"
                    required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>


            <div class="d-flex justify-content-end">
                <a href="{{ route('security.edit') }}" class="p-2 text-decoration-none"><span class="m-2">{{ __('Cancel') }}</span></a>
                <button class="rounded btn btn-primary font-weight-bold" type="submit">
                    {{ __('Change Password') }}
                </button>
            </div>
        </form>
    </section>
</div>
@endsection
