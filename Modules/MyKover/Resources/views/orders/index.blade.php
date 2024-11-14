@extends('layouts.app')

@section('page_title', __('My Orders & Quotations'))

@section('content')
<div id="hero" style="height: 1px;">

</div>
<div class="container text-black">
    <header class="d-flex">
        <nav aria-label="breadcrumb" class="col-6">
          <ol class="bg-white breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bi bi-house-fill"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Sales Orders') }}</li>
          </ol>
        </nav>
        <div class="text-right col-6">
            <div class="dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ __('Order Date') }}
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <li><a class="dropdown-item" href="#">{{ __('Order Date') }}</a></li>
                  <li><a class="dropdown-item" href="#">{{ __('Reference') }}</a></li>
                </ul>
              </div>
        </div>
    </header>
    <section>
        {{-- <table class="table table-sm border-top-0">
            <thead>
                <tr>
                  <th scope="col">{{ __('Sales Order') }} #</th>
                  <th scope="col">{{ __('Order Date') }}</th>
                  <th scope="col">{{ __('Total') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                  <th scope="row">S/0001</th>
                  <td>07/19/2024  15:38:22	</td>
                  <td>406.00 KSh</td>
                </tr>
            </tbody>
        </table> --}}
        <div class="alert alert-warning">
            {{ __('There are currently no sales orders for your account.') }}
        </div>
    </section>
</div>
@endsection
