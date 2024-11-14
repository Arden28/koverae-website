@extends('layouts.master')

@section('page_title', 'Démo Koverae Cloud')

@section('styles')
    <style>
        .subscription-widget .form-headline{
            font-family: "Caveat", Helvetica;
            font-size: 52px;
            font-weight: 600;
            color: #026469;
            width: 100%;
        }
        .subscription-widget .form-headline span{
            font-size: 32px;
        }
    </style>
@endsection

@section('content')
<div class="row g-0 flex-fill site-section" id="hero">

    <div class="col-12 col-lg-6 col-xl-6 d-none d-lg-block">
        <!-- Photo -->
        <div class="bg-cover h-100 min-vh-100" style="background-image: url({{ asset('assets/auth-register-3.png')}}); background-size: cover;">
          <div class="d-flex justify-content-center align-items-center h-100 ">
            <div style="background-color: white; padding: 20px; margin: -20px; border-radius: 10px;">
              <h3 class="text-center h3">
                {{ __("Plus de possibilités avec Koverae") }}
                <br />
              </h3>
              <div class="col-lg-auto align-items-center">
                <ul style="list-style: none">
                  <li>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                    Basé dans le <strong>cloud</strong>, aucune installation requise
                  </li>
                  <li style="margin-top: 10px">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                    {{ __('Fonctionnalités de sécurité et d\'administration adaptée.') }}
                  </li>
                  <li style="margin-top: 10px">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                    {{ __('Tranquilité d\'esprit grâce à une assistance 24h/24 et 7j/7') }}
                  </li>
                  <li style="margin-top: 10px">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                    <strong>Essai sans frais pendant 8 jours</strong>, <br>
                    {{ __('facturation mensuelle ou annuelle à l\'issue de cette période') }}
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

    </div>

    <livewire:trial.app-selection />
  {{-- <div class="col-12 col-lg-6 col-xl-6 border-top-wide border-primary d-flex">
  </div> --}}

</div>
@endsection
