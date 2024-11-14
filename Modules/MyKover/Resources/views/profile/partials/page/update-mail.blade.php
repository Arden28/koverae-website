@extends('layouts.app')

@section('page_title', "E-mail Addresses")

@section('content')
<div id="hero" style="height: 1px;">

</div>
<div class="text-black container-md w-100">
    <header class="mb-2 text-left border-bottom">
        <h3><a href="{{ route('profile.edit') }}"><i class="bi bi-arrow-left-circle"></i></a> {{ __('E-mail Addresses') }}</h3>
    </header>
    <section class="p-lg-3">
        <form class="container p-3 rounded k-form" method="post" action="{{ route('profile.update.name') }}">
            @csrf
            @method('patch')

            <span class="message">{{ __('Manage email addresses associated with your Google account.') }}</span>
            <div class="mt-3 mb-3">
                <label for="email" class="m-0">{{ __('Email address') }}</label>
                <input type="email" class="form-control" id="email" value="{{ $user->email }}" disabled>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="mt-3 mb-3">
                <label for="recovery_email" class="m-0">{{ __('Recovery email address') }}</label>
                <input type="email" name="recovery_email" class="form-control" id="recovery_email" value="{{ $user->recovery_email }}">
                <x-input-error :messages="$errors->get('recovery_email')" class="mt-2" />
            </div>

            <div class="help">
                <h6 class="">{{ __('Who can see your e-mail addresses') }}</h6>
                <div class="gap-1 d-flex">
                    <span class="help-icon"><i class="bi bi-shield-lock"></i></span>
                    <p>{{ __('This information is private. Only you can see it.') }}</p>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('profile.edit') }}" class="p-2 text-decoration-none"><span class="m-2">{{ __('Cancel') }}</span></a>
                <button class="rounded btn btn-primary font-weight-bold" type="submit">
                    {{ __('Save') }}
                </button>
            </div>
        </form>
    </section>
</div>
@endsection
