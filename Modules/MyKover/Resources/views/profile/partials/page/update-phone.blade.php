@extends('layouts.app')

@section('page_title', "Phone Number")

@section('content')
<div id="hero" style="height: 1px;">

</div>
<div class="text-black container-md w-100">
    <header class="mb-2 text-left border-bottom">
        <h3><a href="{{ route('profile.edit') }}"><i class="bi bi-arrow-left-circle"></i></a> {{ __('Phone Number') }}</h3>
    </header>
    <section class="p-lg-3">
        <form class="container p-3 rounded k-form" method="post" action="{{ route('profile.update.phone') }}">
            @csrf
            @method('patch')

            <span class="message">{{ __('Your number may be used to send you important notifications, help you log in, etc.') }}</span>
            <div class="mt-3 mb-3">
                <label for="phone" class="m-0">{{ __('Phone Number') }}
                    @if($user->phone_verified_at)
                        <span class="text-secondary">({{ __('Verified on:') }} {{ \Carbon\Carbon::parse($user->phone_verified_at)->format('d M') }})</span>

                    @endif
                </label>
                <input type="tel" name="phone" class="form-control" id="phone" placeholder="{{ __('Your Phone Number') }}" value="{{ $user->phone }}">
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <div class="help">
                <h6 class="">{{ __('Who can see your phone number') }}</h6>
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
