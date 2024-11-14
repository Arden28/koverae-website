@extends('layouts.app')

@section('page_title', "Gender")

@section('content')
<div id="hero" style="height: 1px;">

</div>
<div class="text-black container-md w-100">
    <header class="mb-2 text-left border-bottom">
        <h3><a href="{{ route('profile.edit') }}"><i class="bi bi-arrow-left-circle"></i></a> {{ __('Gender') }}</h3>
    </header>
    <section class="p-lg-3">
        <form class="container p-3 rounded k-form" method="post" action="{{ route('profile.update.gender') }}">
            @csrf
            @method('patch')

            <span class="message">{{ __('We may take your gender into account to personalize Koverae services, including how we address you.') }}</span>
            <div class="mt-3 mb-3">
                <select name="gender" id="gender" class="form-control">
                    <option value="">{{ __('Gender') }}</option>
                    <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>{{ __('Male') }}</option>
                    <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>{{ __('Female') }}</option>
                </select>
                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
            </div>

            <div class="help">
                <h6 class="">{{ __('Who can see your gender') }}</h6>
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
