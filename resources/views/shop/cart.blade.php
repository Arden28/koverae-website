@extends('layouts.master')

@section('page_title', 'Votre panier')

@section('styles')
    <style>
        /*  */
        .k_wizard{
            font-size: 16px;
            line-height: 20px;
            padding: 24px 0 24px 0;
        }
        .k_wizard .k_wizard_steplabel.active{
            color: #000000;
            font-weight: 600;
        }
        .k_cart h3{
            font-size: 32px;
            line-height: 35px;
            font-weight: bold;
        }
        @media (max-width: 472px){
        .k_cart h3{
            font-size: 22px;
            line-height: 25px;
        }
        }
        .k_cart .k_cart_product .delete_product{
            font-size: 14px;
            line-height: 21px;
            color: #017E84;
        }
        .k_cart .k_cart_product .quantity{
            width: 112px;
        }
        .go-pay{
            background-color: #026469;
            color: white;
        }
        .go-pay:hover{
            background-color: #03686d;
            color: white;
        }
        .k_cart_summary .card-body-lg{
            border: 1px solid #D8DADA;
        }
        @media(max-width: 992px){
            .k_cart_summary .card-body-lg{
                border: none !important;
                margin-top: 20px !important;
            }
        }
    </style>
@endsection

@section('content')
    <div id="wrap" style="margin-top: 100px;">
        <div class="container py-2 k_website_sale k_website_sale_checkout">
            <div class="row position-relative mb32">
                <!-- Breadcrumbs -->
                <div class="col-12 d-none d-lg-block text-muted">
                    <div class="flex-wrap my-5 k_wizard d-flex justify-content-between justify-content-md-start my-sm-3">
                        <div class="d-flex flex-column flex-md-row justify-content-end align-items-md-start justify-content-center">
                            <p class="mb-0 text-center k_wizard_steplabel active">
                                {{ __('Vérifier la commande') }}
                            </p>
                            <i class="align-middle bi bi-chevron-right d-inline-block"></i>
                            <p class="mb-0 text-center k_wizard_steplabel disabled">
                                {{ __('Expédition') }}
                            </p>
                            <i class="align-middle bi bi-chevron-right d-inline-block disabled"></i>
                            <p class="mb-0 text-center k_wizard_steplabel">
                                {{ __('Paiement') }}
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Product List -->
                <div class="text-black k_cart col-12 col-lg-7">
                    <div class="col">
                        <h3 class="mb-4">Aperçu de la commande</h3>
                        @if($cart_items->isNotEmpty())
                            @foreach($cart_items as $cart_item)
                            <!-- Product -->
                            <div class="gap-3 pb-4 k_cart_product d-flex align-items-stretch border-bottom">
                                <!-- Product Image -->
                                <div>
                                    <img src="{{ asset('assets/images/default/product.png') }}" height="64px" alt="" class="rounded img k_image_64_max">
                                </div>
                                <div class="ml-2 mr-2 flex-grow-1">
                                    <h6 class="cursor-pointer d-inline algn-top h6 font-weight-bold">
                                        {{ $cart_item->name }}
                                    </h6>
                                    <div>
                                        <a href="{{ route('cart.destroy') }}" class="delete_product d-none d-md-inline-block small text-decoration-none">{{ __('Supprimer') }}</a>
                                    </div>
                                </div>
                                <!-- Product Price -->
                                <div class="d-flex flex-column align-items-end">
                                    <div class="d-flex">
                                        <input type="tel" class="quantity form-control border-start-0 border-end-0" value="1">
                                    </div>
                                    <div class="mb-0 h6 font-weight-bold text-end">
                                        @php
                                            $plan_price = $cart_item->price;
                                        @endphp
                                        <span>{{ format_currency($cart_item->price) }}</span>
                                        <div>
                                            @php
                                                $plan = \Bpuig\Subby\Models\Plan::find($cart_item->id);
                                            @endphp
                                            <span>par {{ $plan->invoice_interval == 'month' ? 'mois' : 'an' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- Product Discount -->
                            <div class="gap-3 pt-4 k_cart_product d-flex align-items-stretch">
                                <!-- Product Image -->
                                <div>
                                    <img src="{{ asset('assets/images/app-icons/discount.png') }}" height="64px" width="64xp" alt="" class="rounded img k_image_64_max">
                                </div>
                                <div class="ml-2 mr-2 flex-grow-1">
                                    <h6 class="cursor-pointer d-inline algn-top h6 font-weight-bold">
                                        Plan Spark Remise pour la première année
                                    </h6>
                                    <span class="d-block text-muted" style="font-size: 13px;">
                                        applicable uniquement pour le premier abonnement
                                    </span>
                                    <div>
                                        <a href="" class="delete_product d-none d-md-inline-block small text-decoration-none">{{ __('Supprimer') }}</a>
                                    </div>
                                </div>
                                <!-- Product Price -->
                                <div class="d-flex flex-column align-items-end">
                                    <div class="d-flex">
                                        <span class="w-100 text-muted">
                                            1
                                        </span>
                                    </div>
                                    <div class="mb-0 h6 font-weight-bold text-end">
                                        <span>
                                            - {{ format_currency(($plan_price * 20) / 100) }}
                                        </span>
                                        <div>
                                            <span>par {{ $plan->invoice_interval == 'month' ? 'mois' : 'an' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                @if($cart_items->isNotEmpty())
                <!-- Cart Summary -->
                <div class="order-2 k_cart_summary offset-xl-1 col-lg-5 col-xl-4">
                    <div class="p-0 rounded card-body-lg p-lg-4">
                        <!-- Cart Subtotal -->
                        <div class="gap-3 pb-2 d-flex align-items-stretch border-bottom">
                            <div class="ml-2 mr-2 flex-grow-1">
                                <span>Sous-total</span>
                            </div>
                            <div class="d-flex flex-column align-items-end">
                                <span>{{ format_currency((convertToInt(Cart::instance('plan')->subtotal) * 80) / 100) }}</span>
                            </div>
                        </div>
                        <!-- Cart Total -->
                        <div class="gap-3 pt-3 mb-4 text-black d-flex align-items-stretch font-weight-bold">
                            <div class="ml-2 mr-2 flex-grow-1">
                                <span>Total</span>
                            </div>
                            <div class="d-flex flex-column align-items-end">
                                <span>{{ format_currency((convertToInt(Cart::instance('plan')->total) * 80) / 100) }}</span>
                            </div>
                        </div>
                        <!-- Coupon Input -->
                        <div class="mb-1 input-group">
                            <input type="text" class="form-control" placeholder="Code de réduction" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                            <button class="btn btn-primary font-weight-bold" type="button">Appliquer</button>
                            </div>
                        </div>
                        <!-- Sales Conditions -->
                        <div class="pt-4 text-black">
                            <h5 class="mb-3 font-weight-bold">Conditions de ventes</h5>
                            VENTES FINALES - Veuillez noter que toutes les ventes d'abonnements Koverae Spark et de services associés sont définitives et non remboursables.
                        </div>
                        <!-- Action Button -->
                        <div class="pt-4 d-flex flex-column">
                            <a href="{{ route('cart.ship') }}" class="btn go-pay w-100 font-weight-bold">Paiement</a>
                            <div class="my-2 opacity-75 d-flex position-relative w-100 justify-content-center align-items-center">
                                <span>ou</span>
                            </div>
                            <a href="{{ route('pricing') }}" class="text-center" style="color: #03686d;">{{ __("Changer d'abonnement") }}</a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
