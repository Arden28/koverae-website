<!Doctype html>
<html lang="en_KE">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Koverae SA">
  <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png')}}">

  <meta name="description" content="" />
  <meta name="keywords" content="koverae, saas, gestion de vente, magasin, point de vente, crm, afrique, brazzaville, congo, kover" />

  <title>@yield('page_title') | Koverae</title>


    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "assets/images/logo/logo.png"
        }
    </script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Logiciel de gestion d'entreprise.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.koverae.com">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HJ1L2Y7QS6"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-HJ1L2Y7QS6');
    </script>
    <!-- Meta Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '291287213552434');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=291287213552434&ev=PageView&noscript=1" />
    </noscript>
    <!-- End Meta Pixel Code -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Caveat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css?'.time() )}}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css?'.time() )}}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css?'.time() )}}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/icomoon/style.css?'.time() )}}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather/style.css?'.time() )}}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/flaticon/font/flaticon.css?'.time() )}}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.fancybox.min.css?'.time() )}}">
    <link rel="stylesheet" href="{{ asset('assets/css/aos.css?'.time() )}}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/app.css?'.time())}}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css?'.time())}}">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @yield('styles')

    <style>
        @import url('https://rsms.me/inter/inter.css');
        :root {
            --tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
        .dropdown-item:focus{
            background-color: #E9ECEF;
            /* color: #ffffff; */
        }
        #cart-icon{
            font-size: 16px;
            font-weight: bolder;
        }
            #lblCartCount {
                padding-left: 9px;
                padding-right: 9px;
                -webkit-border-radius: 9px;
                -moz-border-radius: 9px;
                border-radius: 9px;
                font-size: 12px;
                background: #026469;
                color: #fff;
                padding: 0 5px;
                vertical-align: top;
                margin-left: -10px;
            }
    </style>
</head>
<body>

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icofont-close js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <div class="container">
        <!-- NAV -->
        <nav class="site-nav">
            <div class="logo float-start">
                <a href="{{ route('home') }}" class="text-white">
                    <img src="{{ asset('assets/images/logo/logo.png')}}" alt="Koverae Logo">
                </a>
            </div>
            <div class="row align-items-center">

            <div class="p-0 text-center col-12 col-sm-12 col-lg-12 site-navigation">
                <ul class="text-left js-clone-nav d-none d-lg-inline-block site-menu">
                    <li class="has-children" id="k-menu">
                    <a href="#">Industries</a>
                    <ul class="dropdown start">
                        <li><a href="#">Commerce de détails</a></li>
                        <li><a href="#">Restauration & Hôtellerie</a></li>
                        <li><a href="#">Grande distribution</a></li>
                    </ul>
                    </li>
                <li><a href="{{ route('pricing') }}">Tarification</a></li>
                <li class="has-children">
                    <a href="#">Entreprise</a>
                    <ul class="dropdown">
                    <li><a href="{{ route('about') }}">A propos de nous</a></li>
                    {{-- <li><a href="{{ route('blogs.index') }}">Notre blog</a></li> --}}
                    <li><a href="#">Carrières</a></li>
                    </ul>
                </li>
                </ul>

                <ul class="float-right text-left js-clone-nav d-none d-lg-inline-block site-menu">

                    @php
                        $cart = \Gloudemans\Shoppingcart\Facades\Cart::instance('plan');
                    @endphp
                    @if($cart->content()->isNotEmpty())
                    <li>
                        <a href="{{ route('cart') }}" class="text-decoration-none">
                            <i class="bi bi-cart" id="cart-icon"></i>
                            <span class="badge badge-primary" id="lblCartCount">{{ $cart->count() }}</span>
                        </a>
                    </li>
                    @endif
                    @auth
                    <li class="has-children">
                    <a href="#">{{ str()->limit(Auth::user()->first_name, 15) }}</a>
                    <ul class="dropdown">
                        <li><a class="text-decoration-none dropdown-item" href="{{ route('dashboard') }}">{{ __('My Account') }}</a></li>
                        <li><a class="text-decoration-none dropdown-item" href="#">Mes entreprises</a></li>
                        <hr class="dropdown-divider">

                        <!-- Authentication -->
                        <li class="dropdown-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown-item">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </li>
                        {{-- <li><a class="dropdown-item" href="#">Me déconnecter</a></li> --}}
                    </ul>
                    </li>
                    @else
                    <li class="cta-button" id="sign-in"><a href="{{ route('login') }}">{{ __('Sign In') }}</a></li>
                    @endauth
                    <li class="cta-button" id="trial-link"><a href="{{ route('demo') }}">{{ __('Free trial') }}</a></li>
                </ul>

                <a href="#" class="ml-auto burger light site-menu-toggle js-menu-toggle d-block d-lg-none" data-toggle="collapse" data-target="#main-navbar">
                    <span></span>
                </a>
                {{-- <div class="m-0 d-flex">
                    <a href="#" class="ml-auto mr-4 dropdown light d-block d-lg-none">
                        <img src="{{ asset($user->avatar)}}" width="40px" height="40px" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false" alt="{{ $user->name }}" class="divide-y-2 rounded-circle " >
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                          <li><button class="dropdown-item" type="button">Action</button></li>
                          <li><button class="dropdown-item" type="button">Another action</button></li>
                          <li><button class="dropdown-item" type="button">Something else here</button></li>
                        </ul>
                    </a>
                </div> --}}

            </div>

            </div>
        </nav>
        <!-- END NAV -->

    </div> <!-- END container -->


    @yield('content')


    <div class="mt-4 mt-8 site-footer border-top">
        <div class="container">
          <div class="row justify-content-between">
            <div class="col-lg-4">
              <div class="widget">
                <h3>A propos</h3>
                <p class="text-black">
                  <strong>Koverae</strong> est une solution SaaS pour une gestion d'entreprise simplifiée. Transformez votre façon d'opérer avec nos outils intuitifs et intégrés, spécialement conçus pour les <strong>PMEs</strong>.
                </p>
              </div>
              <div class="widget">
                <h3>Connectez-vous à nous</h3>
                <ul class="social list-unstyled">
                  <li><a href="https://www.facebook.com/koverae" target="_blank"><span class="icon-facebook"></span></a></li>
                  <li><a href="https://www.instagram.com/koverae_/" target="_blank"><span class="icon-instagram"></span></a></li>
                  <li><a href="https://www.linkedin.com/company/koverae/" target="_blank"><span class="icon-linkedin"></span></a></li>
                  <li><a href="https://github.com/Koverae" target="_blank"><span class="icon-github"></span></a></li>
                  <li><a href="tel:+242065996406"><span class="icon-phone"></span></a></li>
                  <li><a href="mailto:info@koverae.com"><span class="icon-envelope"></span></a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="row">
                <div class="col-6 col-sm-6 col-md-4">
                  <div class="widget">
                    <h3>Kovers</h3>
                    <ul class="links list-unstyled">
                      <li><a href="#">Support Clients</a></li>
                    </ul>
                  </div>
                </div>
                <div class="col-6 col-sm-6 col-md-4">
                  <div class="widget">
                    <h3>Services</h3>
                    <ul class="links list-unstyled">
                      <li><a href="#">Intégrations</a></li>
                      <li><a href="#">Formations</a></li>
                    </ul>
                  </div>
                </div>
                <div class="col-6 col-sm-6 col-md-4">
                  <div class="widget">
                    <h3>Entreprise</h3>
                    <ul class="links list-unstyled">
                      <li><a href="{{ route('about') }}">A propos de nous</a></li>
                      <li><a href="#">Carrières</a></li>
                      <li><a href="{{ route('docs.index') }}">Documentation</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="text-center text-black row justify-content-center copyright">
            <div class="col-md-8">
              <p>Site Web réalisé avec <strong>Koverae</strong></p>
              {{-- <p>Copyright &copy;<script>document.write(new Date().getFullAn());</script>. Tous droits Réservés | <strong>Koverae</strong> --}}
              </p>
            </div>
          </div>
        </div>
    </div>


      {{-- <div id="overlayer"></div>
      <div class="loader">
        <div class="spinner-border" role="status">
          <span class="sr-only">Chargement...</span>
        </div>
      </div> --}}

      <script src="{{ asset('assets/js/jquery-3.5.1.min.js')}}"></script>
      <script src="{{ asset('assets/js/jquery-migrate-3.0.0.min.js')}}"></script>
      <script src="{{ asset('assets/js/popper.min.js')}}"></script>
      <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
      {{-- <script src="{{ asset('assets/js/bootstrap.bundle.js')}}"></script> --}}
      <script src="{{ asset('assets/js/owl.carousel.min.js')}}"></script>
      <script src="{{ asset('assets/js/aos.js')}}"></script>
      <script src="{{ asset('assets/js/imagesloaded.pkgd.js')}}"></script>
      <script src="{{ asset('assets/js/isotope.pkgd.min.js')}}"></script>
      <script src="{{ asset('assets/js/jquery.animateNumber.min.js')}}"></script>
      <script src="{{ asset('assets/js/jquery.stellar.min.js')}}"></script>
      <script src="{{ asset('assets/js/jquery.waypoints.min.js')}}"></script>
      <script src="{{ asset('assets/js/jquery.fancybox.min.js')}}"></script>
      <script src="{{ asset('assets/js/custom.js')}}"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

      <script>
      $(document).ready(function() {
          var siteNav = $('.site-nav');
          var heroSection = $('#hero'); // Change to your actual hero section selector

          var hasHero = heroSection.length > 0;

          var heroOffset = hasHero ? heroSection.offset().top + heroSection.outerHeight() : 0;

          $(window).scroll(function() {
              var scrollPosition = $(window).scrollTop();

              if ((hasHero && scrollPosition > heroOffset) || !hasHero) {
                  siteNav.addClass('sticky');
              } else {
                  siteNav.removeClass('sticky');
              }
          });
      });

      </script>

      @yield('scripts')
    </body>
    </html>
