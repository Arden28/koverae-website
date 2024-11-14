@extends('layouts.master')

@section('page_title', 'Mon profil')

@section('content')
<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Profile') }}
    </h2>
</x-slot>

{{-- <div class="py-12">
    <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
        <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</div> --}}


<div class="container p-5 bg-white" style="margin-top: 85px;">
    <div class="block">
      <div class="row justify-content-center">
        <div class="pb-4 col-md-12 col-lg-12" data-aos="fade-up" data-aos-delay="200">

            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>

            <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('patch')
                <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                    <label class="text-black" for="name">{{ __('Nom(s) & Prénom(s)') }}</label>
                    <input id="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                    <label class="text-black" for="lname">Nom de la société</label>
                    <input type="text" class="form-control" id="society" name="society">
                    <x-input-error class="mt-2" :messages="$errors->get('society')" />
                    </div>
                </div>
                </div>

                <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                    <label class="text-black" for="email">{{ __('Email') }}</label>
                    <input id="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required autofocus autocomplete="email">
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                    <label class="text-black" for="phone">Numéro de téléphone</label>
                    <input id="phone" type="tel" class="form-control" value="{{ old('phone', $user->phone) }}" required autofocus autocomplete="phone">
                    <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                    </div>
                </div>
                </div>

                <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                    <label class="text-black" for="street">{{ __('Rue') }}</label>
                    <input id="street" type="text" class="form-control" value="{{ old('street', $user->street) }}" required autofocus autocomplete="street">
                    <x-input-error class="mt-2" :messages="$errors->get('street')" />
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                    <label class="text-black" for="lname">{{ __('Ville') }}</label>
                    <input id="city" type="text" class="form-control" value="{{ old('city', $user->city) }}" required autofocus autocomplete="city">
                    <x-input-error class="mt-2" :messages="$errors->get('city')" />
                    </div>
                </div>
                </div>

                <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                    <label class="text-black" for="zip">{{ __('Code Postal') }}</label>
                    <input id="zip" type="text" class="form-control" value="{{ old('zip', $user->zip) }}" required autofocus autocomplete="zip">
                    <x-input-error class="mt-2" :messages="$errors->get('zip')" />
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                    <label class="text-black" for="country">{{ __('Pays') }}</label>
                    <input id="country" type="text" class="form-control" value="{{ old('country', $user->country) }}" required autofocus autocomplete="country">
                    <x-input-error class="mt-2" :messages="$errors->get('country')" />
                    </div>
                </div>
                </div>

                <div class="clearfix mb-5 text-end">
                    <a href="{{ route('kovers.home') }}" class="btn btn-primary font-weight-bold">Ignorer</a>
                    <button type="submit" class="btn btn-primary font-weight-bold" style="background-color: #026469;">Enregistrer</button>
                </div>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection
