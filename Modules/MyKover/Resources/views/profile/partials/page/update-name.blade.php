@extends('layouts.app')

@section('page_title', "Name")

@section('content')
<div id="hero" style="height: 1px;">

</div>
<div class="text-black container-md w-100">
    <header class="mb-2 text-left border-bottom">
        <h3><a href="{{ route('profile.edit') }}"><i class="bi bi-arrow-left-circle"></i></a> {{ __('Name') }}</h3>
    </header>
    <section class="p-lg-3">
        <form class="container p-3 rounded k-form" method="post" action="{{ route('profile.update.name') }}">
            @csrf
            @method('patch')

            <span class="message">{{ __('Any changes to your name will be applied to your entire Koverae account. Learn more') }}</span>
            <div class="mt-3 mb-3">
                <label for="first_name" class="m-0">{{ __('First Name') }}</label>
                <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Arden" value="{{ $user->first_name }}">
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>
            <div class="mt-3 mb-3">
                <label for="name" class="m-0">{{ __('Name') }}</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="BOUET" value="{{ $user->name }}">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="help">
                <h6 class="">{{ __('Who can see your name') }}</h6>
                <div class="gap-1 d-flex">
                    <span class="help-icon"><i class="bi bi-people"></i></span>
                    <p>{{ __('Anyone can see this information when they communicate with you or view content you have created on Koverae services.') }}</p>
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
