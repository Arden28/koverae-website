@extends('layouts.app')

@section('page_title', __('My Invoices'))

@section('content')
<div id="hero" style="height: 1px;">

</div>
<div class="container text-black">

    <header class="d-flex">
        <nav aria-label="breadcrumb" class="col-6">
          <ol class="bg-white breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bi bi-house-fill"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Invoices & Bills') }}</li>
          </ol>
        </nav>
        <div class="text-right col-6">
            <div class="dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ __('Order Date') }}
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <li><a class="dropdown-item" href="#">{{ __('Order Date') }}</a></li>
                  <li><a class="dropdown-item" href="#">{{ __('Due Date') }}</a></li>
                  <li><a class="dropdown-item" href="#">{{ __('Reference') }}</a></li>
                  <li><a class="dropdown-item" href="#">{{ __('Status') }}</a></li>
                </ul>
              </div>
        </div>
    </header>

    <section>
        <!-- TABLE-->
        {{-- <table class="table table-sm border-top-0">
            <thead>
                <tr>
                  <th scope="col">{{ __('Invoice') }} #</th>
                  <th scope="col">{{ __('Invoice Date') }}</th>
                  <th scope="col">{{ __('Due Date') }}</th>
                  <th scope="col">{{ __('Status') }}</th>
                  <th scope="col"></th>
                  <th scope="col">{{ __('Total') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                  <th scope="row">INV/0001</th>
                  <td>07/19/2024  15:38:22	</td>
                  <td>07/20/2024</td>
                  <td><span class="p-2 text-white badge rounded-pill badge-info"><i class="bi bi-clock"></i> {{ __('Waiting for payment') }}</span></td>
                  <td><a href="" class="p-1 btn btn-sm btn-primary font-weight-bold" style="font-size: 12px;"><i class="ml-1 bi bi-arrow-right-circle"></i> {{ __('Pay now') }}</a></td>
                  <td>406.00 KSh</td>
                </tr>
            </tbody>
        </table> --}}
        <!-- EMPTY-->
        <div class="alert alert-warning">
            {{ __('There are currently no invoices & payments for your account.') }}
        </div>

    </section>

</div>
@endsection
