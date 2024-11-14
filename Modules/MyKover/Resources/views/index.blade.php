@extends('layouts.app')

@section('page_title', "My Portal")

@section('styles')
    <style>
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
    </style>
@endsection

@section('content')
<div id="hero" style="height: 1px;">

</div>
<div class="mb-5 k_portal_wrap">
    <div class="pb-1 container-fluid">
        <div class="flex-wrap wrapper col-12 d-flex justify-content-between align-items-center">
            <h3 class="my-3 font-weight-bold">
                {{ __('My Account') }}
            </h3>
            <img src="{{ asset('storage/avatars/'.$user->avatar)}}" alt="{{ $user->name }}" class="divide-y-2 rounded-circle k_portal_contact_img d-lg-none k_object_fit_cover" onclick="openNav()">
        </div>
        <div id="portal_wrapper_category">

        </div>
        <div class="row">
            <!-- Portal Content -->
            <div class="pb-4 text-black k_portal_content col-12 col-lg-7">
                <div class="k_portal_docs row g-2 mb-sm-4">
                    <div class="mt-3 k_portal_category w-100 row g-2" id="portal_client_category">
                        <!-- Invoices & Bills -->
                        <div class="k_portal_index_card col-12 col-md-12 col-xl-6">
                            <a href="{{ route('invoice.index') }}" class="gap-2 py-3 d-flex justify-content-start gap-md-3 align-items-center pe-2 px-md-3 text-decoration-none text-reset text-bg-light">
                                <img src="{{ asset('assets/images/icons/invoice-2.svg') }}" width="64px" height="64px" class="mr-3 bg-slate-100" alt="">
                                <div>
                                    <span class="font-weight-bold">
                                        {{ __('Your Invoices') }}
                                    </span>
                                    <p class="m-0 text-600">
                                        {{ __('Follow, download or pay your invoices') }}
                                    </p>
                                </div>
                            </a>
                        </div>
                        <!-- Orders -->
                        <div class="k_portal_index_card col-12 col-md-6">
                            <a href="{{ route('order.index') }}" class="gap-2 py-3 d-flex justify-content-start gap-md-3 align-items-center pe-2 px-md-3 text-decoration-none text-reset text-bg-light">
                                <img src="{{ asset('assets/images/icons/bag-2.svg') }}" width="64px" height="64px" class="mr-3 bg-slate-100" alt="">
                                <div>
                                    <span class="font-weight-bold">
                                        {{ __('Sales Orders') }}
                                    </span>
                                    <p class="m-0 text-600">
                                        {{ __('Follow, download or pay your sales orders') }}
                                    </p>
                                </div>
                            </a>
                        </div>
                        <!-- DATA & PRIVACY -->
                        <div class="k_portal_index_card col-12 col-md-6">
                            <a href="{{ route('profile.edit') }}" class="gap-2 py-3 d-flex justify-content-start gap-md-3 align-items-center pe-2 px-md-3 text-decoration-none text-reset text-bg-light">
                                <img src="{{ asset('assets/images/icons/data-7.svg') }}" width="80px" height="80px" class="mr-3 bg-slate-100" alt="{{ __('Data & Privacy') }}">
                                <div>
                                    <span class="font-weight-bold">
                                        {{ __('Data & Privacy') }}
                                    </span>
                                    <p class="m-0 text-600">
                                        {{ __('Control your account data with privacy options') }}
                                    </p>
                                </div>
                            </a>
                        </div>
                        <!-- Connection & Security -->
                        <div class="k_portal_index_card col-12 col-md-6">
                            <a href="{{ route('security.edit') }}" class="gap-2 py-3 d-flex justify-content-start gap-md-3 align-items-center pe-2 px-md-3 text-decoration-none text-reset text-bg-light">
                                <img src="{{ asset('assets/images/icons/security-1.svg') }}" width="64px" height="64px" class="mr-3 bg-slate-100" alt="{{ __('Connection & Security') }}">
                                <div>
                                    <span class="font-weight-bold">
                                        {{ __('Connection & Security') }}
                                    </span>
                                    <p class="m-0 text-600">
                                        {{ __('Configure your security and connection parameters') }}
                                    </p>
                                </div>
                            </a>
                        </div>
                        <!-- PAYMENTS -->
                        <div class="k_portal_index_card col-12 col-md-6">
                            <a href="{{ route('payment.edit') }}" class="gap-2 py-3 d-flex justify-content-start gap-md-3 align-items-center pe-2 px-md-3 text-decoration-none text-reset text-bg-light">
                                <img src="{{ asset('assets/images/icons/payment-1.svg') }}" width="80px" height="80px" class="mr-3 bg-slate-100" alt="{{ __('Data & Privacy') }}">
                                <div>
                                    <span class="font-weight-bold">
                                        {{ __('Payments & Subscriptions') }}
                                    </span>
                                    <p class="m-0 text-600">
                                        {{ __('Your payment information and transactions') }}
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kover Info -->
            <div class="text-black kover-info d-lg-flex justify-content-end d-none col-lg-4">
                <div class="mt-3">
                    <div class="gap-3 mb-4 d-flex justify-content-start align-items-center">
                        <img src="{{ asset('storage/avatars/'.$user->avatar) }}" class="border rounded-circle" height="50px" width="50px" alt="{{ $user->name }}">
                        <div class="ml-3">
                            <h3 class="mb-0 font-weight-normal">
                                {{ $user->first_name }} {{ $user->name }}
                            </h3>
                        </div>
                    </div>
                    <!-- Adresse -->
                    <div class="gap-1 d-flex align-items-baseline">
                        <i class="mr-3 bi bi-geo-alt-fill"></i>
                        <div class="d-block w-100 lh-sm">
                            {{-- {{$user->addresses()->first()->street }}, --}}
                            {{ $user->addresses()->first()->city ?? '' }}, {{ $user->addresses()->first()->country ?? '' }}
                        </div>
                    </div>
                    <!-- Email -->
                    @if($user->email)
                    <div class="gap-1 d-flex align-items-center">
                        <i class="bi bi-envelope-fill"></i>
                        <span class="ml-3 text-break">{{ $user->email }}</span>
                    </div>
                    @endif
                    <!-- Tel -->
                    @if($user->phone)
                    <div class="gap-1 mb-3 d-flex align-items-center">
                        <i class="bi bi-telephone-fill"></i>
                        <span class="ml-3 text-break">{{ $user->phone }}</span>
                    </div>
                    @endif
                    <a href="{{ route('profile.edit') }}" class="p-0 mt-3 primary text-decoration-none" style="color: #026469;">
                        <i class="bi bi-pencil-square" id="edit"></i> {{ __('Update your personal Information') }}
                    </a>

                    <div class="mt-3 k_portal_my_security">
                        <h4>{{ __('Useful Links') }}</h4>
                        <hr class="mb-1 ">
                        <a href="#" class="primary" style="color: #026469;">
                            {{ __('My Business Partner Dashboard') }}
                        </a>
                    </div>
                </div>
            </div>
            <!-- Kover Info Responsive -->
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <div class="text-black kover-info d-flex">
                    <div class="mt-3">
                        <div class="gap-3 mb-4 d-flex justify-content-start align-items-center">
                            <img src="{{ asset('storage/avatars/'.$user->avatar) }}" class="rounded-circle" height="50px" width="50px" alt="{{ $user->name }}">
                            <div class="ml-3">
                                <h3 class="mb-0 font-weight-normal">
                                    {{ $user->first_name }} {{ $user->name }}
                                </h3>
                            </div>
                        </div>
                        <!-- Adresse -->
                        <div class="gap-1 d-flex align-items-baseline">
                            <i class="mr-3 bi bi-geo-alt-fill"></i>
                            <div class="d-block w-100 lh-sm">
                                {{-- {{$user->addresses()->first()->street }}, --}}
                                {{ $user->addresses()->first()->city ?? '' }}, {{ $user->addresses()->first()->country ?? '' }}
                            </div>
                        </div>
                        <!-- Email -->
                        @if($user->email)
                        <div class="gap-1 d-flex align-items-center">
                            <i class="bi bi-envelope-fill"></i>
                            <span class="ml-3 text-break">{{ $user->email }}</span>
                        </div>
                        @endif
                        <!-- Tel -->
                        @if($user->phone)
                        <div class="gap-1 mb-3 d-flex align-items-center">
                            <i class="bi bi-telephone-fill"></i>
                            <span class="ml-3 text-break">{{ $user->phone }}</span>
                        </div>
                        @endif
                        <a href="{{ route('profile.edit') }}" class="p-0 mt-3 primary text-decoration-none" style="color: #026469;">
                            <i class="bi bi-pencil-square" id="edit"></i> {{ __('Update your personal Information') }}
                        </a>

                        <div class="mt-3 k_portal_my_security">
                            <h4>{{ __('Useful Links') }}</h4>
                            <hr class="mb-1 ">
                            <a href="#" class="primary" style="color: #026469;">
                                {{ __('My Business Partner Dashboard') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        function openNav() {
        document.getElementById("mySidenav").style.width = "350px";
        document.getElementById("main").style.marginLeft = "350px";
        }

        function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("hero").style.marginLeft= "0";
        }
    </script>
@endsection
