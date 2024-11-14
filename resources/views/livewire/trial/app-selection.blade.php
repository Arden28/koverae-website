<div class="col-12 col-lg-6 col-xl-6 border-top-wide border-primary d-flex">

    @if($this->currentStep == 1)
    <div class="container subscription-widget container-tight">
        <h3 class="form-headline mt0">
            Selectionnez vos applications
            <br>
            <span>Accès gratuit immédiat, sans nécessité de paiement.</span>
        </h3>

        <!-- Success Message -->
        @if(session('success'))
            <div style="background-color: green; color: white; padding: 10px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <!-- Error Message -->
        @if(session('error'))
            <div style="background-color: red; color: white; padding: 10px; margin-bottom: 20px;">
                {{ session('error') }}
            </div>
        @endif

        <section class="h-screen bg-white subscription">
            <!-- Ventes -->
            <h6 class="pt-2 mt-2 app_category text-body text-uppercase font-weight-bold mb24 mt62">
                {{ __('Ventes') }}
            </h6>
            <div class="row">
                <!-- Ventes -->
                <label class="pl-0 pr-0 col-sm-6 col-md-4 col-xl-3 d-flex mr-lg-1 shadow-1" wire:click="toggleApp('sales')" wire:click="toggleApp('sales')" style="cursor: pointer;">
                    <div class="container flex-row p-2 card d-flex w-100 align-items-center">
                        <img src="{{ asset("assets/images/app-icons/sales.png") }}" height="40px" alt="" class="rounded koverae_enterprise_pricing_app_icon">
                        <div class="ml-1 mr-1 koverae_enterprise_pricing_app_name text-truncate">
                            <span class="text-black h6">
                                {{ __('Ventes') }}
                            </span>
                        </div>
                        <div class="text-right">
                            @if(in_array('sales', $this->selectedApps))
                                <i class="bi bi-circle-fill" style="color: #28A745;"></i>
                            @else
                                <i class="bi bi-circle"></i>
                            @endif
                        </div>
                    </div>
                </label>
                <!-- CRM -->
                <label class="pl-0 pr-0 col-sm-6 col-md-4 col-xl-3 d-flex mr-lg-1 shadow-1" wire:click="toggleApp('crm')" style="cursor: pointer;">
                    <div class="container flex-row p-2 card d-flex w-100 align-items-center">
                        <img src="{{ asset("assets/images/app-icons/crm.png") }}" height="40px" alt="" class="rounded koverae_enterprise_pricing_app_icon">
                        <div class="ml-1 mr-1 koverae_enterprise_pricing_app_name text-truncate">
                            <span class="text-black h6">
                                {{ __('CRM') }}
                            </span>
                        </div>
                        <div class="text-right">
                            @if(in_array('crm', $this->selectedApps))
                                <i class="bi bi-circle-fill" style="color: #28A745;"></i>
                            @else
                                <i class="bi bi-circle"></i>
                            @endif
                        </div>
                    </div>
                </label>
                <!-- Facturation -->
                <label class="pl-0 pr-0 col-sm-6 col-md-4 col-xl-3 d-flex mr-lg-1 shadow-1" wire:click="toggleApp('invoice')" style="cursor: pointer;">
                    <div class="container flex-row p-2 card d-flex w-100 align-items-center">
                        <img src="{{ asset("assets/images/app-icons/invoice.png") }}" height="40px" alt="" class="rounded koverae_enterprise_pricing_app_icon">
                        <div class="ml-1 mr-1 koverae_enterprise_pricing_app_name text-truncate">
                            <span class="text-black h6">
                                {{ __('Facturation') }}
                            </span>
                        </div>
                        <div class="text-right">
                            @if(in_array('invoice', $this->selectedApps))
                                <i class="bi bi-circle-fill" style="color: #28A745;"></i>
                            @else
                                <i class="bi bi-circle"></i>
                            @endif
                        </div>
                    </div>
                </label>

                <!-- Abonnements -->
                <label class="pl-0 pr-0 col-sm-6 col-md-4 col-xl-3 d-flex mr-lg-1 shadow-1" wire:click="toggleApp('subscription')" style="cursor: pointer;">
                    <div class="container flex-row p-2 card d-flex w-100 align-items-center">
                        <img src="{{ asset("assets/images/app-icons/subscription.png") }}" height="40px" alt="" class="rounded koverae_enterprise_pricing_app_icon">
                        <div class="ml-1 mr-1 koverae_enterprise_pricing_app_name text-truncate">
                            <span class="text-black h6">
                                {{ __('Abonnements') }}
                            </span>
                        </div>
                        <div class="text-right">
                            @if(in_array('subscription', $this->selectedApps))
                                <i class="bi bi-circle-fill" style="color: #28A745;"></i>
                            @else
                                <i class="bi bi-circle"></i>
                            @endif
                        </div>
                    </div>
                </label>

                <!-- Point de Ventes -->
                <label class="pl-0 pr-0 col-sm-6 col-md-4 col-xl-3 d-flex mr-lg-1 shadow-1" wire:click="toggleApp('pos')" style="cursor: pointer;">
                    <div class="container flex-row p-2 card d-flex w-100 align-items-center">
                        <img src="{{ asset("assets/images/app-icons/pos.png") }}" height="40px" alt="" class="rounded koverae_enterprise_pricing_app_icon">
                        <div class="ml-1 mr-1 koverae_enterprise_pricing_app_name text-truncate">
                            <span class="text-black h6">
                                {{ __('Point de Ventes') }}
                            </span>
                        </div>
                        <div class="text-right">
                            @if(in_array('pos', $this->selectedApps))
                                <i class="bi bi-circle-fill" style="color: #28A745;"></i>
                            @else
                                <i class="bi bi-circle"></i>
                            @endif
                        </div>
                    </div>
                </label>

            </div>

            <!-- Opérations -->
            <h6 class="mt-4 app_category text-body text-uppercase font-weight-bold mb24 mt62">
                {{ __('Opérations') }}
            </h6>
            <div class="row">
                <!-- Comptabilité -->
                <label class="pl-0 pr-0 col-sm-6 col-md-4 col-xl-3 d-flex mr-lg-1 shadow-1" wire:click="toggleApp('accounting')" style="cursor: pointer;">
                    <div class="container flex-row p-2 card d-flex w-100 align-items-center">
                        <img src="{{ asset("assets/images/app-icons/accounting.png") }}" height="40px" alt="" class="rounded koverae_enterprise_pricing_app_icon">
                        <div class="ml-1 mr-1 koverae_enterprise_pricing_app_name text-truncate">
                            <span class="text-black h6">
                                {{ __('Comptabilité') }}
                            </span>
                        </div>
                        <div class="text-right">
                            @if(in_array('accounting', $this->selectedApps))
                                <i class="bi bi-circle-fill" style="color: #28A745;"></i>
                            @else
                                <i class="bi bi-circle"></i>
                            @endif
                        </div>
                    </div>
                </label>

                <!-- Projet -->
                <label class="pl-0 pr-0 col-sm-6 col-md-4 col-xl-3 d-flex mr-lg-1 shadow-1" wire:click="toggleApp('projects')" style="cursor: pointer;">
                    <div class="container flex-row p-2 card d-flex w-100 align-items-center">
                        <img src="{{ asset("assets/images/app-icons/projects.png") }}" height="40px" alt="" class="rounded koverae_enterprise_pricing_app_icon">
                        <div class="ml-1 mr-1 koverae_enterprise_pricing_app_name text-truncate">
                            <span class="text-black h6">
                                {{ __('Projet') }}
                            </span>
                        </div>
                        <div class="text-right">
                            @if(in_array('projects', $this->selectedApps))
                                <i class="bi bi-circle-fill" style="color: #28A745;"></i>
                            @else
                                <i class="bi bi-circle"></i>
                            @endif
                        </div>
                    </div>
                </label>

                <!-- Inventaire -->
                <label class="pl-0 pr-0 col-sm-6 col-md-4 col-xl-3 d-flex mr-lg-1 shadow-1" wire:click="toggleApp('inventory')" style="cursor: pointer;">
                    <div class="container flex-row p-2 card d-flex w-100 align-items-center">
                        <img src="{{ asset("assets/images/app-icons/inventory.png") }}" height="40px" alt="" class="rounded koverae_enterprise_pricing_app_icon">
                        <div class="ml-1 mr-1 koverae_enterprise_pricing_app_name text-truncate">
                            <span class="text-black h6">
                                {{ __('Inventaire') }}
                            </span>
                        </div>
                        <div class="text-right">
                            @if(in_array('inventory', $this->selectedApps))
                                <i class="bi bi-circle-fill" style="color: #28A745;"></i>
                            @else
                                <i class="bi bi-circle"></i>
                            @endif
                        </div>
                    </div>
                </label>

                <!-- Achats -->
                <label class="pl-0 pr-0 col-sm-6 col-md-4 col-xl-3 d-flex mr-lg-1 shadow-1" wire:click="toggleApp('purchase')" style="cursor: pointer;">
                    <div class="container flex-row p-2 card d-flex w-100 align-items-center">
                        <img src="{{ asset("assets/images/app-icons/purchase.png") }}" height="40px" alt="" class="rounded koverae_enterprise_pricing_app_icon">
                        <div class="ml-1 mr-1 koverae_enterprise_pricing_app_name text-truncate">
                            <span class="text-black h6">
                                {{ __('Achats') }}
                            </span>
                        </div>
                        <div class="text-right">
                            @if(in_array('purchase', $this->selectedApps))
                                <i class="bi bi-circle-fill" style="color: #28A745;"></i>
                            @else
                                <i class="bi bi-circle"></i>
                            @endif
                        </div>
                    </div>
                </label>

                <!-- Docs -->
                <label class="pl-0 pr-0 col-sm-6 col-md-4 col-xl-3 d-flex mr-lg-1 shadow-1" wire:click="toggleApp('docs')" style="cursor: pointer;">
                    <div class="container flex-row p-2 card d-flex w-100 align-items-center">
                        <img src="{{ asset("assets/images/app-icons/docs.png") }}" height="40px" alt="" class="rounded koverae_enterprise_pricing_app_icon">
                        <div class="ml-1 mr-1 koverae_enterprise_pricing_app_name text-truncate">
                            <span class="text-black h6">
                                {{ __('Docs') }}
                            </span>
                        </div>
                        <div class="text-right">
                            @if(in_array('docs', $this->selectedApps))
                                <i class="bi bi-circle-fill" style="color: #28A745;"></i>
                            @else
                                <i class="bi bi-circle"></i>
                            @endif
                        </div>
                    </div>
                </label>
            </div>

            <!-- Fabrication -->
            <h6 class="mt-4 app_category text-body text-uppercase font-weight-bold mb24 mt62">
                {{ __('Fabrication') }}
            </h6>
            <div class="row">
                <!-- Faabrication -->
                <label class="pl-0 pr-0 col-sm-6 col-md-4 col-xl-3 d-flex mr-lg-1 shadow-1" wire:click="toggleApp('mrp')" style="cursor: pointer;">
                    <div class="container flex-row p-2 card d-flex w-100 align-items-center">
                        <img src="{{ asset("assets/images/app-icons/mrp.png") }}" height="40px" alt="" class="rounded koverae_enterprise_pricing_app_icon">
                        <div class="ml-1 mr-1 koverae_enterprise_pricing_app_name text-truncate">
                            <span class="text-black h6">
                                {{ __('Fabrication') }}
                            </span>
                        </div>
                        <div class="text-right">
                            @if(in_array('mrp', $this->selectedApps))
                                <i class="bi bi-circle-fill" style="color: #28A745;"></i>
                            @else
                                <i class="bi bi-circle"></i>
                            @endif
                        </div>
                    </div>
                </label>

                <!-- Qualité -->
                <label class="pl-0 pr-0 col-sm-6 col-md-4 col-xl-3 d-flex mr-lg-1 shadow-1" wire:click="toggleApp('quality')" style="cursor: pointer;">
                    <div class="container flex-row p-2 card d-flex w-100 align-items-center">
                        <img src="{{ asset("assets/images/app-icons/quality.png") }}" height="40px" alt="" class="rounded koverae_enterprise_pricing_app_icon">
                        <div class="ml-1 mr-1 koverae_enterprise_pricing_app_name text-truncate">
                            <span class="text-black h6">
                                {{ __('Qualité') }}
                            </span>
                        </div>
                        <div class="text-right">
                            @if(in_array('quality', $this->selectedApps))
                                <i class="bi bi-circle-fill" style="color: #28A745;"></i>
                            @else
                                <i class="bi bi-circle"></i>
                            @endif
                        </div>
                    </div>
                </label>

            </div>

            <!-- Ressources Humaines -->
            <h6 class="mt-4 app_category text-body text-uppercase font-weight-bold mb24 mt62">
                {{ __('Ressources Humaines') }}
            </h6>
            <div class="row">
                <!-- Personnels -->
                <label class="pl-0 pr-0 col-sm-6 col-md-4 col-xl-3 d-flex mr-lg-1 shadow-1" wire:click="toggleApp('employee')" style="cursor: pointer;">
                    <div class="container flex-row p-2 card d-flex w-100 align-items-center">
                        <img src="{{ asset("assets/images/app-icons/employee.png") }}" height="40px" alt="" class="rounded koverae_enterprise_pricing_app_icon">
                        <div class="ml-1 mr-1 koverae_enterprise_pricing_app_name text-truncate">
                            <span class="text-black h6">
                                {{ __('Personnels') }}
                            </span>
                        </div>
                        <div class="text-right">
                            @if(in_array('employee', $this->selectedApps))
                                <i class="bi bi-circle-fill" style="color: #28A745;"></i>
                            @else
                                <i class="bi bi-circle"></i>
                            @endif
                        </div>
                    </div>
                </label>

                <!-- Présences -->
                <label class="pl-0 pr-0 col-sm-6 col-md-4 col-xl-3 d-flex mr-lg-1 shadow-1" wire:click="toggleApp('attendances')" style="cursor: pointer;">
                    <div class="container flex-row p-2 card d-flex w-100 align-items-center">
                        <img src="{{ asset("assets/images/app-icons/attendances.png") }}" height="40px" alt="" class="rounded koverae_enterprise_pricing_app_icon">
                        <div class="ml-1 mr-1 koverae_enterprise_pricing_app_name text-truncate">
                            <span class="text-black h6">
                                {{ __('Présences') }}
                            </span>
                        </div>
                        <div class="text-right">
                            @if(in_array('attendances', $this->selectedApps))
                                <i class="bi bi-circle-fill" style="color: #28A745;"></i>
                            @else
                                <i class="bi bi-circle"></i>
                            @endif
                        </div>
                    </div>
                </label>

                <!-- Dépenses -->
                <label class="pl-0 pr-0 col-sm-6 col-md-4 col-xl-3 d-flex mr-lg-1 shadow-1" wire:click="toggleApp('expenses')" style="cursor: pointer;">
                    <div class="container flex-row p-2 card d-flex w-100 align-items-center">
                        <img src="{{ asset("assets/images/app-icons/expenses.png") }}" height="40px" alt="" class="rounded koverae_enterprise_pricing_app_icon">
                        <div class="ml-1 mr-1 koverae_enterprise_pricing_app_name text-truncate">
                            <span class="text-black h6">
                                {{ __('Dépenses') }}
                            </span>
                        </div>
                        <div class="text-right">
                            @if(in_array('expenses', $this->selectedApps))
                                <i class="bi bi-circle-fill" style="color: #28A745;"></i>
                            @else
                                <i class="bi bi-circle"></i>
                            @endif
                        </div>
                    </div>
                </label>

                <!-- Congés -->
                <label class="pl-0 pr-0 col-sm-6 col-md-4 col-xl-3 d-flex mr-lg-1 shadow-1" wire:click="toggleApp('timeoff')" style="cursor: pointer;">
                    <div class="container flex-row p-2 card d-flex w-100 align-items-center">
                        <img src="{{ asset("assets/images/app-icons/timeoff.png") }}" height="40px" alt="" class="rounded koverae_enterprise_pricing_app_icon">
                        <div class="ml-1 mr-1 koverae_enterprise_pricing_app_name text-truncate">
                            <span class="text-black h6">
                                {{ __('Congés') }}
                            </span>
                        </div>
                        <div class="text-right">
                            @if(in_array('timeoff', $this->selectedApps))
                                <i class="bi bi-circle-fill" style="color: #28A745;"></i>
                            @else
                                <i class="bi bi-circle"></i>
                            @endif
                        </div>
                    </div>
                </label>

            </div>

        </section>
        <div class="mt-2 text-center container-fluid">
            @if($this->isFreeForever)
            <div class="alert alert-success">
                <strong>Gratuit</strong>, avec un <strong>nombre illimité d'utilisateurs</strong>, sans <strong>limite</strong> de temps.
            </div>
            @endif

            @if($this->isTrial)
            <div class="alert alert-info">
                <strong>8 jours d'essai gratuit</strong>, <small>pas de paiement requis</small>.
            </div>
            @endif
            <button wire:click="nextStep" class="btn btn-primary w-100 font-weight-bold text-uppercase" {{ count($this->selectedApps) >= 1 ? '' : 'disabled' }} style="background-color: #026469;">
                {{ count($this->selectedApps) }} Application(s) | {{ __('Continuer') }}
            </button>
        </div>

    </div>
    @elseif ($this->currentStep == 2)
    <div class="container">
        <h1 class="form-headline mt0 font-weight-bold">
            Commencez | Koverae
        </h1>
        <form action="" class="">
            <span>{{ $message }}</span>
            <div style="height: 400px; overflow-y: auto; overflow-x: hidden;" >
                <h4>Parlez nous de vous !</h4>
                <!-- Name -->
                <div class="mb-3">
                    <input  type="text" wire:model="name" value="{{ old('name') }}" required autocomplete="name" class="form-control" placeholder="{{ __('Nom(s) & Prénom(s)') }}">
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="row">
                    <!-- Email -->
                    <div class="mb-3 col-6">
                        <input  type="email" wire:model="email" value="{{ old('email') }}" required autocomplete="email" class="form-control" placeholder="Votre adresse email">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <!-- Phone -->
                    <div class="mb-3 col-6">
                        <input  type="tel" wire:model="phone" value="{{ old('phone') }}" required autocomplete="phone" class="form-control" placeholder="Votre numéro de téléphone">
                        @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Address -->
                <div class="mb-3">
                    <input  type="text" wire:model="address" value="{{ old('address') }}" required autocomplete="address" class="form-control" placeholder="{{ __('Votre adresse') }}">
                    @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="row">
                    <!-- Country -->
                    <div class="mb-3 col-6">
                        <select wire:model="country" required autocomplete="country" class="form-control">
                            <option value="">Pays</option>
                            @foreach($countries as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        @error('country') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <!-- City -->
                    <div class="mb-3 col-6">
                        <select wire:model="city" required autocomplete="city" class="form-control">
                            <option value="">Ville</option>
                            @if(!empty($country) && isset($cities[$country]))
                                @foreach($cities[$country] as $city)
                                    <option value="{{ strtolower($city) }}">{{ $city }}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <h4>Intéressons nous à votre entreprise !</h4>

                <!-- Company Name -->
                <div class="mb-3">
                    <input  type="text" wire:model="company_name" value="{{ old('company_name') }}" required autocomplete="company_name" class="form-control" placeholder="{{ __('Quel est le nom de votre entreprise ?') }}">
                    @error('company_name') <span class="text-danger">{{ $message }}</span> @enderror
                    @if($this->company_name)
                        <span><b>Votre site web :</b> https://{{ str()->slug($this->company_name) }}.koverae.com</span>
                    @endif
                </div>
                <div class="row">
                    <!-- Prospect Position -->
                    <div class="mb-3 col-6">
                        <select wire:model="role" required autocomplete="role" class="form-control">
                            <option value="">{{ __("Quelle est votre rôle dans l'entreprise ?") }}</option>
                            <option value="owner">{{ __('Propriétaire') }}</option>
                            <option value="manager">{{ __("Gérant") }}</option>
                            <option value="cco">{{ __('Directeur commercial') }}</option>
                            <option value="employee">{{ __('Employé') }}</option>
                            <option value="others">{{ __('Autres') }}</option>
                        </select>
                        @error('role') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <!-- industry -->
                    <div class="mb-3 col-6">
                        <select wire:model="industry" required autocomplete="industy" class="form-control">
                            <option value="">{{ __("Quelle est votre secteur d'activité ?") }}</option>
                            <option {{ old('type') == 'retail_store' ? 'selected' : '' }} value="retail_store">{{ __('Commerce de détail') }}</option>
                            <option {{ old('type') == 'distribution' ? 'selected' : '' }} value="distribution">{{ __('Grande distribution') }}</option>
                            <option {{ old('type') == 'restaurant' ? 'selected' : '' }} value="restaurant">{{ __("Restauration / Bar") }}</option>
                            <option {{ old('type') == 'hotel' ? 'selected' : '' }} value="hotel">{{ __("Hôtellerie") }}</option>
                            <option {{ old('type') == 'pharmacy' ? 'selected' : '' }} value="pharmacy">{{ __('Pharmacie') }}</option>
                            <option {{ old('type') == 'pharmacy' ? 'selected' : '' }} value="agro-transformation">{{ __('Transformation Agro-alimentaire') }}</option>
                            <option {{ old('type') == 'others' ? 'selected' : '' }} value="others">{{ __("Autres") }}</option>
                        </select>
                        @error('industry') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Company Address -->
                <div class="mb-3">
                    <input  type="text" wire:model="company_address" value="{{ old('company_address') }}" required autocomplete="company_address" class="form-control" placeholder="{{ __('Votre adresse') }}">
                    @error('company_address') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="row">
                    <!-- Company Size -->
                    <div class="mb-3 col-6">
                        <select wire:model="size" required autocomplete="size" class="form-control">
                            <option value="">{{ __('Votre entreprise fait quelle taille ?') }}</option>
                            <option value="-5">< 5 {{ __('employés') }}</option>
                            <option value="5+">5 - 20 {{ __('employés') }}</option>
                            <option value="20+">20 - 50 {{ __('employés') }}</option>
                            <option value="50+">50 - 200 {{ __('employés') }}</option>
                            <option value="200+"> > 200 {{ __('employés') }}</option>
                        </select>
                        @error('size') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <!-- Primary Interest -->
                    <div class="mb-3 col-6">
                        <select wire:model="primary_interest" required autocomplete="primary_interest" class="form-control">
                            <option value="">{{ __('Intérêt principal') }}</option>
                            <option value="for my company">{{ __('Utiliser Koverae pour mon entreprise') }}</option>
                            <option value="for my customers">{{ __("Offrir les services Koverae à d'autres entreprises") }}</option>
                            <option value="I am a teacher">{{ __('Je suis un professeur') }}</option>
                            <option value="I am a  student">{{ __('Je suis un étudiant') }}</option>
                        </select>
                        @error('primary_interest') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Prospect Position -->
                <div class="mb-3">
                    <select wire:model="currency_code" required autocomplete="currency_code" class="form-control">
                        <option value="">{{ __("Quelle devise utilisez vous ?") }}</option>
                        {{-- @foreach ($currencies as $currency)
                        <option value="{{ $currency->code }}">{{ $currency->currency_name }}</option>
                        @endforeach --}}
                    </select>
                    @error('currency_code') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

            </div>

            <div class="form-footer">
                <button style="margin-top: 7px; width: 45%;" wire:click="previousStep" class="btn btn-outline-secondary font-weight-bold text-uppercase" wire:loading.attr="disabled">
                    {{ __('Retour') }}
                </button>
                <button style="margin-top: 7px; width: 45%;background-color: #026469;" type="button" wire:click="continue" class="btn btn-primary text-end w-50 font-weight-bold text-uppercase" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="continue">{{ __('Commencez') }}</span>
                    <span wire:loading wire:target="continue">
                        <div class="spinner-border spinner-border-sm" role="status">
                            <span class="sr-only"></span>
                        </div>
                    </span>
                </button>
            </div>
        </form>
    </div>
    @endif
</div>
