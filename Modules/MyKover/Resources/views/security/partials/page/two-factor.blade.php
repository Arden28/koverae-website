@extends('layouts.app')

@section('page_title', "Two-step validation")

@section('content')
<div id="hero" style="height: 1px;">

</div>
<div class="text-black container-md w-100">
    <header class="mb-2 text-left border-bottom">
        <h3><a href="{{ route('security.edit') }}"><i class="bi bi-arrow-left-circle"></i></a> {{ __('Two-step validation') }}</h3>
    </header>
    <section class="p-lg-3">
        <form class="container p-3 rounded k-form" method="post" action="{{ route('security.update.steps') }}">
            @csrf
            @method('patch')

            <span class="message">{{ __('Protect your account from hackers with an extra layer of security.
                                        You can change your second steps and login options in Settings at any time.') }}</span>
            <div class="mt-3 mb-3">
                <select name="two_factor" id="two_factor" class="mb-2 form-control">
                    <option value="0" {{ $user->two_factor_enabled == false ? 'selected' : '' }}>{{ __('Disable two-step verification') }}</option>
                    <option value="1" {{ $user->two_factor_enabled == true ? 'selected' : '' }}>{{ __('Enable two-step verification') }}</option>
                </select>
                <span class="" style="font-size: 14px; line-height: 20px;">
                    @if($user->two_factor_enabled == true)
                    <i class="bi bi-check-circle-fill" style="font-size: 18px; line-height: 20px; color: green;"></i> {{ __('Enabled') }}
                    @else
                    <i class="bi bi-x-circle-fill" style="font-size: 18px; line-height: 20px; color: red;"></i> {{ __('Disabled') }}
                    @endif
                </span>
                <x-input-error :messages="$errors->get('two_factor')" class="mt-2" />
            </div>

            <div class="help">
                <h6 class="">{{ __('Second Steps') }}</h6>
                <div class="gap-1 d-flex">
                    <span class="help-icon"><i class="bi bi-shield-lock"></i></span>
                    <p>{{ __('Make sure you can always access your Koverae Account by keeping this information up to date and adding other sign-in options') }}</p>
                </div>
            </div>

            <div class="mt-3 mb-3">
                <select name="two_factor_second_step" id="two_factor_second_step" class="form-control">
                    <option value="email" {{ $user->two_factor_second_step == 'email' ? 'selected' : '' }}>{{ __('Receive a code by email') }}</option>
                    <option value="phone" {{ $user->two_factor_second_step == 'phone' ? 'selected' : '' }}>{{ __('Receive a code by sms') }}</option>
                </select>
                <x-input-error :messages="$errors->get('two_factor_second_step')" class="mt-2" />
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('security.edit') }}" class="p-2 text-decoration-none"><span class="m-2">{{ __('Cancel') }}</span></a>
                <button class="rounded btn btn-primary font-weight-bold" type="submit">
                    {{ __('Save') }}
                </button>
            </div>
        </form>
    </section>
</div>
@endsection
