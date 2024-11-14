@extends('layouts.app')

@section('page_title', "Logiciel de gestion d'entreprise")

@section('styles')
    <style>
        .text-title{
            font-family: "Caveat", Helvetica;
        }
        #first-title{
            font-size: 54px;
        }
        #second-title{
            font-size: 34px;
        }
        .caveat{
            font-family: "Caveat", Helvetica;
        }
        .testimony-1{
            display: flex;
        }
        @media (max-width: 768px){
            .testimony-1{
                display: block;
            }
            .testimony-1 .image-testimony img{
                text-align: center;
            }
        }
        .b-primary{
          background-color: #026469;
          color: white;
        }
        .b-primary:hover{
          background-color: #034f53;
          color: white;
        }
        .cta-link{
            font-size: 18px;
            line-height: 20px;
            font-weight: 600;
            color: #026469;
        }
    </style>
@endsection

@section('content')
<!-- Home Page Banner -->
<div class="pb-6 hero-ban overlay" id="hero" >
    <div class="container">
        <div class="h-auto pt-8 intro-group row">
            <!-- Texte Gauche -->
            <div class="text-left intro col-lg-6 col-md-12 col-sm-12 align-items-start justify-content-start">
                <h1 class="mb-4 text-black" data-aos="fade-up" data-aos-delay="100">
                    Votre entreprise sur une seule plateforme.
                </h1>
                <p class="mb-5 text-left text-black align-items-start" data-aos-delay="100">
                    Des dizaines d'entreprises comme la vôtre font confiance à <strong>Koverae</strong>
                    pour leur technologie. Du point de vente à la gestion du personnel, découvrez comment Koverae
                    vous permet de vous concentrer sur ce que vous faites le mieux.
                </p>
                <!-- Call to action 1 -->
                <div class="gap-2 text-left intro-buttons d-flex" data-aos-delay="100">
                    <!-- Start Now -->
                    <a class="mr-2 btn start-now" href="{{ route('demo') }}">Commencez un essai gratuit de 8 jours</a>
                    <!-- Bookig a demo -->
                    <button class="btn btn-light">Réservez une démonstration</button>
                </div>
                <!-- Call to action 2 -->
                <div class="text-secondary cta-2 font-weight-bold" data-aos-delay="100">
                    Vous avez moins de 10 employés ? <a class="explore-spark" href="{{ route('pricing') }}">Explorez notre plan Spark <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            <!-- Illustration -->
            <div class="intro col-lg-6 col-md-12 col-sm-12">
                <!-- Vidéo illustrative -->
                    {{-- <video src="#" muted autoplay loop class="shadow homepage-video"></video> --}}
                    <img src="{{ asset('assets/images/img-h-7.png') }}" alt="" class="shadow homepage-video">
            </div>

        </div>

    </div>
</div>

<!-- App Section -->
<div class="mt-8 site-section" id="features">
  <div class="container app-section">
    <div class="">
      <h2 class="mb-5 col-12 title-center" data-aos="fade-up" data-aos-delay="500">
          Une <b>app</b> pour chacun de vos besoins
      </h2>
    </div>

    <div class="row">

        <div class="px-3 col col-lg-4 d-flex flex-column align-items-center apps-list">
            <h3 class="app_list_col_title" data-aos="fade-up" data-aos-delay="500">Optimisez vos ventes</h3>
            <div class="d-inline-flex k_animate">
                <a class="app_entry" data-aos="fade-up" data-aos-delay="500" href="">
                    <img src="{{ asset('assets/images/app-icons/crm.png') }}" alt="" class="inline p-2 deep-1">
                    <b class="inline text-body">CRM</b>
                </a>
                <a class="app_entry" data-aos="fade-up" data-aos-delay="500" href="">
                    <img src="{{ asset('assets/images/app-icons/pos.png') }}" alt="{{ __('Point de vente') }}" class="inline p-2 deep-1">
                    <b class="inline text-body">Point de Vente</b>
                </a>
                <a class="app_entry" data-aos="fade-up" data-aos-delay="500" href="">
                    <img src="{{ asset('assets/images/app-icons/sales.png') }}" alt="" class="inline p-2 deep-1">
                    <b class="inline text-body">Ventes</b>
                </a>
            </div>
        </div>

        <div class="px-3 col col-lg-4 d-flex flex-column align-items-center apps-list">
            <h3 class="app_list_col_title" data-aos="fade-up" data-aos-delay="500">Adaptez vos services</h3>
            <div class="d-inline-flex k_animate">
                <a class="app_entry" data-aos="fade-up" data-aos-delay="500" href="">
                    <img src="{{ asset('assets/images/app-icons/field_of_service.png') }}" alt="" class="inline p-2 deep-1">
                    <b class="inline text-body">Services</b>
                </a>
                <a class="app_entry" data-aos="fade-up" data-aos-delay="500" href="">
                    <img src="{{ asset('assets/images/app-icons/helpdesk.png') }}" alt="" class="inline p-2 deep-1">
                    <b class="inline text-body">Assistance</b>
                </a>
            </div>
        </div>


        <div class="px-3 col col-lg-4 d-flex flex-column align-items-center apps-list">
            <h3 class="app_list_col_title" data-aos="fade-up" data-aos-delay="500">Simplifiez vos opérations</h3>
            <div class="d-inline-flex k_animate">
                <a class="app_entry" data-aos="fade-up" data-aos-delay="500" href="">
                    <img src="{{ asset('assets/images/app-icons/inventory.png') }}" alt="" class="inline p-2 deep-1">
                    <b class="inline text-body">Inventaire</b>
                </a>
                <a class="app_entry" data-aos="fade-up" data-aos-delay="500" href="">
                    <img src="{{ asset('assets/images/app-icons/mrp.png') }}" alt="" class="inline p-2 deep-1">
                    <b class="inline text-body">MRP</b>
                </a>
                <a class="app_entry" data-aos="fade-up" data-aos-delay="500" href="">
                    <img src="{{ asset('assets/images/app-icons/purchase.png') }}" alt="" class="inline p-2 deep-1">
                    <b class="inline text-body">Achats</b>
                </a>
            </div>
        </div>

        <div class="px-3 col col-lg-4 d-flex flex-column align-items-center apps-list">
            <h3 class="app_list_col_title" data-aos="fade-up" data-aos-delay="500">Gérez vos finances</h3>
            <div class="d-inline-flex k_animate">
                <a class="app_entry" data-aos="fade-up" data-aos-delay="500" href="">
                    <img src="{{ asset('assets/images/app-icons/invoice.png') }}" alt="" class="inline p-2 deep-1">
                    <b class="inline text-body">Factures</b>
                </a>
                <a class="app_entry" data-aos="fade-up" data-aos-delay="500" href="">
                    <img src="{{ asset('assets/images/app-icons/accounting.png') }}" alt="" class="inline p-2 deep-1">
                    <b class="inline text-body">Finances</b>
                </a>
            </div>
        </div>


        <div class="px-3 col col-lg-4 d-flex flex-column align-items-center apps-list">
            <h3 class="app_list_col_title" data-aos="fade-up" data-aos-delay="500">Créez de magnifiques sites web</h3>
            <div class="d-inline-flex k_animate">
                <a class="app_entry" data-aos="fade-up" data-aos-delay="500" href="">
                    <img src="{{ asset('assets/images/app-icons/website.png') }}" alt="" class="inline p-2 deep-1">
                    <b class="inline text-body">Site web</b>
                </a>
                <a class="app_entry" data-aos="fade-up" data-aos-delay="500" href="">
                    <img src="{{ asset('assets/images/app-icons/ecom.png') }}" alt="" class="inline p-2 deep-1">
                    <b class="inline text-body">eCommerce</b>
                </a>
            </div>
        </div>

    </div>

    <div class="col-12"  data-aos="fade-up" data-aos-delay="500">
        <a href="#" class="float-right apps-bottom-button font-weight-bold" href="">
            Toutes les apps <i class="bi bi-arrow-right"></i>
        </a>
    </div>
  </div>
</div>

<!-- Call To Action -->
<div class="site-section overlay site-cover-2" style="background-image: url('{{asset('assets/images/img_v_3-min.jpg')}}')">
  <div class="container">
    <div class="row">
      <div class="mx-auto text-center col-lg-7">
        <h5 class="mb-4 text-white">
          Découvrez comment <strong>Koverae</strong> vous aide à simplifier la gestion de votre entreprise et améliore l'expérience de vos clients.
          <br>
          Pour une meilleure rentabilité.
        </h5>
        <p class="mb-0"><a href="{{ route('demo') }}" class="btn btn-primary" style="background-color: #026469;">Commencez un essai gratuit de 8 jours</a></p>
      </div>
    </div>
  </div>
</div>

<!-- Koverae For PMEs -->
<section class="features-lg ">
  <div class="container">
    <div class="row feature align-items-center justify-content-between">
      <div class="mb-4 col-lg-5 section-stack order-lg-2 mb-lg-0 position-relative" data-aos="fade-up" data-aos-delay="0">

        <div class="image-stack">
          <div class="image-stack__item image-stack__item--top">
            <img src="{{ asset('assets/images/img-h-1.png')}}" class="rounded" alt="">
          </div>
          <div class="image-stack__item image-stack__item--bottom">
            <img src="{{ asset('assets/images/img-h-4.png')}}" class="rounded" alt="">
          </div>
        </div>

      </div>
      <div class="col-lg-7 section-title" data-aos="fade-up" data-aos-delay="100">

        <h2 class="mb-1 text-title font-weight-bold heading" id="first-title">
            Maîtriser l'Art de la Performance
            <h5 class="mb-3 text-title font-weight-bold heading" id="second-title">Quand les Bons Outils Sculptent l'Avenir</h5>
        </h2>
        <p class="mb-1 text-black">
            Imaginez un artisan dont le talent, sans outils adaptés, est limité. La synergie entre compétence et équipement transforme le simple en extraordinaire.
            Au travail, chaque employé, tel un artisan, voit son efficacité et la qualité de son œuvre dépendre des outils à sa disposition.
            Un graphiste, avec les bons logiciels, crée des designs qui touchent émotionnellement, démontrant que l'excellence résulte de l'alliance entre talent et outils adéquats.
        </p>
        <p>
            <a class="text-decoration-none cta-link" href="{{ route('demo') }}">En découvrir plus <i class="bi bi-arrow-right"></i></a>
        </p>

      </div>

    </div>
  </div>
</section>

<!-- Testimonial for simplicity -->
<section class="pt-24 pb-16">
    <div class="container">
        <div class="flex-col p-4 bg-white shadow testimony-1">
            <picture class="mb-6 col-md-3 image-testimony">
                <img class="mr-6 rounded-circle" src="{{ asset('assets/images/person_2-min.png')}}" height="150px" alt="">
            </picture>
            <div class="col-md-9">
                <h5 class="mb-4 text-black caveat" style="font-size: 26px;">
                    Comme un artisan dont le génie est amplifié par la qualité de ses outils, chaque professionnel,
                    équipé des solutions adéquates, transforme son talent en succès tangible, façonnant l'avenir de son entreprise avec précision et passion.
                </h5>
                <div class="text-secondary">
                    Aramera MAMADOU, Propriétaire de <strong>Conso Plus</strong>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Centralisation -->
<section class="features-lg">
  <div class="container">

    <div class="row feature align-items-center justify-content-between">
      <div class="mb-4 col-lg-5 mb-lg-0 section-stack" data-aos="fade-up" data-aos-delay="0">
        <img src="{{ asset('assets/images/img-h-8.png')}}" alt="Image" class="rounded img-fluid">
      </div>
      <div class="col-lg-7 section-title" data-aos="fade-up" data-aos-delay="100">
        <h2 class="mb-1 text-title font-weight-bold heading" id="first-title">
            Centralisation et Clarté
            <h5 class="mb-3 text-title font-weight-bold heading" id="second-title">Un Coup d'Œil, Un Monde de Possibilités</h5>
        </h2>
        <p class="mb-4 text-black">
            Imaginez un espace où chaque donnée, chaque interaction et chaque transaction trouve sa place, organisée et accessible.
            <strong>Koverae</strong> réalise cette vision, en rassemblant toutes vos informations <strong>commerciales</strong> & <strong>logistiques</strong> en un point focal.
            Explorez le pouvoir d'une vue à 360° sur votre entreprise, où décisions stratégiques et opportunités de croissance émergent d'un tableau de bord intuitif et complet.
        </p>
        <p>
            <a class="text-decoration-none cta-link" href="{{ route('demo') }}">Reprenons le contrôle de votre entreprise <i class="bi bi-arrow-right"></i></a>
        </p>

      </div>

    </div>

  </div>
</section>

<!-- Interfaces -->
<section class="features-lg ">
  <div class="container">
    <div class="row feature align-items-center justify-content-between">
      <div class="col-lg-7 section-title" data-aos="fade-up" data-aos-delay="100">
        <h2 class="mb-1 text-title font-weight-bold heading" id="first-title">
            Simplification par le Design
            <h5 class="mb-3 text-title font-weight-bold heading" id="second-title">Une Interface qui parle votre langue</h5>
        </h2>
        <p class="mb-4 text-black">
            Chez <strong>Koverae</strong>, nous croyons que l'éfficacité réside dans la simplicité.
            C'est pourquoi nous avons conçu notre interface utilisateur pour qu'elle soit aussi intuitive qu'efficace, en prenant soin d'écouter et d'intégrer les retours de nos utilisateurs.
            Naviguez avec aisance dans un environnement conçu pour vous, où chaque fonctionnalité a été pensée pour alléger votre charge de travail et maximiser votre potentiel.
        </p>
        <p>
            <a class="text-decoration-none cta-link" href="{{ route('demo') }}">Testez notre interface intuitive <i class="bi bi-arrow-right"></i></a>
        </p>

      </div>
      <div class="mb-4 col-lg-5 mb-lg-0 section-stack" data-aos="fade-up" data-aos-delay="0">
        <img src="{{ asset('assets/images/img-h-6.png')}}" alt="Image" class="rounded img-fluid">
      </div>

    </div>
  </div>
</section>

<!-- Testimonials -->
<section class="testimonial-section">
  <div class="container">
    <h2 class="mb-4 text-center font-weight-bold heading caveat" style="font-size: 48px;" data-aos="fade-up" data-aos-delay="0">
      Comment nous façonnons l'industrie et vous aidons à réussir
    </h2>
    <div class="row align-items-center justify-content-between">
      <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
        <!-- testimonials -->
        <div class="shadow testimonial--wrap">
          <div class="owl-single owl-carousel no-dots no-nav">

            <div class="testimonial-item">
              <div class="mb-4 d-flex align-items-center">
                <div class="mr-3 photo">
                  <img src="{{ asset('assets/images/person_1-min.png')}}" alt="Image" class="img-fluid rounded-circle">
                </div>
                <div class="author">
                  <cite class="mb-0 d-block">MASSAMBA Judie Brelle</cite>
                  <span>Gérante, ETS Marie Reine.</span>
                </div>
              </div>
              <blockquote>
                <p>&ldquo;
                  Devenir <strong>Kover</strong> a été un tournant pour notre établissement.
                  Leur approche personnalisée et leur soutien constant nous ont non seulement aidés à optimiser nos processus, mais nous ont aussi donné la confiance nécessaire pour viser plus haut.
                  Chaque jour, nous ressentons l'impact positif de leur solution sur notre productivité.
                  &rdquo;</p>
              </blockquote>
            </div>

            <div class="testimonial-item">
              <div class="mb-4 d-flex align-items-center">
                <div class="mr-3 photo">
                  <img src="{{ asset('assets/images/person_1-min.png')}}" alt="Image" class="img-fluid rounded-circle">
                </div>
                <div class="author">
                  <cite class="mb-0 d-block">GUYNO Dorcas</cite>
                  <span>Directrice Générale, <strong>Résidence GUYNO</strong>.</span>
                </div>
              </div>
              <blockquote>
                <p>&ldquo;
                  L'implémentation de <strong>Koverae</strong> dans la résidence a marqué une nette amélioration dans la fluidité de nos opérations quotidiennes.
                  Les commentaires positifs de nos clients sur la rapidité et la personnalisation de notre service n'ont jamais été aussi nombreux.
                  &rdquo;</p>
              </blockquote>
            </div>
          </div>
          <div class="custom-nav-wrap">
            <a href="#" class="custom-owl-prev"><span class="icon-keyboard_backspace"></span></a>
            <a href="#" class="custom-owl-next"><span class="icon-keyboard_backspace"></span></a>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- call to action -->
  <div class="container mt-5 mb-5 text-center">
    <h3 class="mb-5 text-center caveat display-1" style="font-size: 62px;">
      Explorez votre potentiel de croissance !
    </h3>
    <a href="{{ route('demo') }}" class="btn btn-lg b-primary font-weight-bold">
      Commencez maintenant - C'est gratuit
    </a>
    <small class="mt-3 d-block" style="font-size: 14px;">{{ __('Aucun paiement requis') }}</small>
  </div>

</section>

<!-- FAQ section -->
<section class="pt-12 pb-16 text-center">
  <div class="container">
    <h3 class="caveat" style="font-size: 59px;">Questions fréquemment posées</h3>
    <div class="text-center row">
      <div class="col-lg-12">
        <div class="custom-accordion" id="accordion_1">
            <!-- accordion -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Qu'est-ce que <strong>Koverae</strong> ?</button>
                </h2>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion_1">
                <div class="accordion-body">
                    Koverae est une plateforme SaaS intégrée conçue pour simplifier et optimiser la gestion des entreprises, couvrant des domaines tels que la finance, les ventes, la logistique, et les ressources humaines.
                </div>
                </div>
            </div> <!-- .accordion-item -->

            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Comment Koverae peut-il aider mon entreprise ?</button>
                </h2>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion_1">
                <div class="accordion-body">
                    <strong>Koverae</strong> aide votre entreprise en automatisant les processus, en centralisant les données pour une meilleure prise de décision, et en améliorant l'efficacité opérationnelle à travers ses divers modules intégrés.
                </div>
                </div>
            </div> <!-- .accordion-item -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><strong>Koverae</strong> convient-il à plusieurs les types d'entreprises ?</button>
                </h2>

                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion_1">
                <div class="accordion-body">
                    Oui, <strong>Koverae</strong> est conçu pour s'adapter à une large gamme d'entreprises, des PMEs aux grandes entreprises, dans divers secteurs d'activité.
                </div>
                </div>

            </div> <!-- .accordion-item -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Combien de temps faut-il pour mettre en place <strong>Koverae</strong> dans mon entreprise ?</button>
                </h2>

                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion_1">
                <div class="accordion-body">
                    Le temps de mise en place peut varier selon la taille de l'entreprise et la complexité des processus, mais nous nous efforçons de rendre ce processus aussi rapide et fluide que possible, souvent en quelques semaines.
                </div>
                </div>

            </div> <!-- .accordion-item -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive"><strong>Koverae</strong> peut-il s'intégrer à mes systèmes existants ?</button>
                </h2>

                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion_1">
                <div class="accordion-body">
                    Oui, <strong>Koverae</strong> est conçu pour s'intégrer facilement avec divers systèmes et logiciels grâce à ses API flexibles, permettant une transition en douceur et une intégration des données.
                </div>
                </div>

            </div> <!-- .accordion-item -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">Comment puis-je former mon équipe à utiliser <strong>Koverae</strong> ?</button>
                </h2>

                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion_1">
                <div class="accordion-body">
                    <strong>Koverae</strong> offre des tutoriels en ligne, des webinaires, et des sessions de formation personnalisées pour assurer une prise en main rapide et efficace par vos équipes.
                </div>
                </div>

            </div> <!-- .accordion-item -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">Puis-je personnaliser <strong>Koverae</strong> selon les besoins spécifiques de mon entreprise ?</button>
                </h2>

                <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion_1">
                <div class="accordion-body">
                    Absolument, <strong>Koverae</strong> offre des options de personnalisation étendues pour s'adapter aux processus uniques de votre entreprise.
                </div>
                </div>

            </div> <!-- .accordion-item -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">Comment puis-je ajouter de nouveaux utilisateurs à <strong>Koverae</strong> ?</button>
                </h2>

                <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion_1">
                <div class="accordion-body">
                    L'ajout de nouveaux utilisateurs est simple et peux se faire de plusieurs façon. Nous vous recommandons de le faire en ajoutant tout simplement un nouvel employé à votre entreprise.
                </div>
                </div>

            </div> <!-- .accordion-item -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">Comment <strong>Koverae</strong> protège-t-il les données de mon entreprise ?</button>
                </h2>

                <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordion_1">
                <div class="accordion-body">
                    <strong>Koverae</strong> utilise des protocoles de sécurité de pointe, y compris le cryptage des données, les firewalls, et la surveillance continue pour protéger vos informations contre les accès non autorisés.
                </div>
                </div>

            </div> <!-- .accordion-item -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">Qui a accès aux données de mon entreprise sur <strong>Koverae</strong> ?</button>
                </h2>

                <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordion_1">
                <div class="accordion-body">
                    Seuls les utilisateurs autorisés par vos soins peuvent accéder aux données de votre entreprise, avec des niveaux d'accès personnalisables selon les rôles et responsabilités.
                </div>
                </div>

            </div> <!-- .accordion-item -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">Quelles sont les principales fonctionnalités de <strong>Koverae</strong> ?</button>
                </h2>

                <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven" data-parent="#accordion_1">
                <div class="accordion-body">
                    Les principales fonctionnalités incluent la gestion financière, la gestion des ventes et du CRM, la gestion des stocks, la planification de la production, et la gestion des ressources humaines.
                </div>
                </div>

            </div> <!-- .accordion-item -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve"><strong>Koverae</strong> offre-t-il des rapports et des analyses ?</button>
                </h2>

                <div id="collapseTwelve" class="collapse" aria-labelledby="headingTwelve" data-parent="#accordion_1">
                <div class="accordion-body">
                    Oui, <strong>Koverae</strong> propose des rapports détaillés et des analyses en temps réel et des rapports journaliers par mails pour vous aider à comprendre les performances de votre entreprise et à prendre des décisions éclairées.
                </div>
                </div>

            </div> <!-- .accordion-item -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTreize" aria-expanded="false" aria-controls="collapseTreize">Quel type de support <strong>Koverae</strong> offre-t-il ?</button>
                </h2>

                <div id="collapseTreize" class="collapse" aria-labelledby="headingTreize" data-parent="#accordion_1">
                <div class="accordion-body">
                    <strong>Koverae</strong> offre un support complet à ses clients, incluant l'assistance par téléphone, e-mail, et chat en direct, ainsi que des ressources en ligne.
                </div>
                </div>

            </div> <!-- .accordion-item -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseQuatorze" aria-expanded="false" aria-controls="collapseQuatorze">Comment puis-je contacter le support de <strong>Koverae</strong> en cas de besoin ?</button>
                </h2>

                <div id="collapseQuatorze" class="collapse" aria-labelledby="headingQuatorze" data-parent="#accordion_1">
                <div class="accordion-body">
                    Vous pouvez contacter notre équipe de support via votre portail client Koverae, par e-mail, ou par téléphone. Nous nous engageons à répondre rapidement sous <strong>24h</strong> à toutes vos demandes.
                </div>
                </div>

            </div> <!-- .accordion-item -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseQuinze" aria-expanded="false" aria-controls="collapseQuinze">Comment est structurée la tarification de <strong>Koverae</strong> ?</button>
                </h2>

                <div id="collapseQuinze" class="collapse" aria-labelledby="headingQuinze" data-parent="#accordion_1">
                <div class="accordion-body">
                    La tarification de <strong>Koverae</strong> est basée sur un modèle d'abonnement mensuel ou annuel, qui varie selon le nombre d'utilisateurs pour votre entreprise.
                </div>
                </div>

            </div> <!-- .accordion-item -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeize" aria-expanded="false" aria-controls="collapseSeize">Existe-t-il une période d'essai pour <strong>Koverae</strong> ?</button>
                </h2>

                <div id="collapseSeize" class="collapse" aria-labelledby="headingSeize" data-parent="#accordion_1">
                <div class="accordion-body">
                    Oui, <strong>Koverae</strong> propose une période d'essai gratuite pour vous permettre d'évaluer la plateforme et ses fonctionnalités avant de prendre une décision d'achat.
                </div>
                </div>

            </div> <!-- .accordion-item -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseDixSept" aria-expanded="false" aria-controls="collapseDixSept"><strong>Koverae</strong> reçoit-il régulièrement des mises à jour ?</button>
                </h2>

                <div id="collapseDixSept" class="collapse" aria-labelledby="headingDixSept" data-parent="#accordion_1">
                <div class="accordion-body">
                    Oui, nous mettons régulièrement à jour <strong>Koverae</strong> pour introduire de nouvelles fonctionnalités, améliorations, et corrections, assurant ainsi que votre entreprise bénéficie toujours de la meilleure technologie disponible.
                </div>
                </div>

            </div> <!-- .accordion-item -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseDixHuit" aria-expanded="false" aria-controls="collapseDixHuit">Puis-je suggérer des fonctionnalités pour de futures mises à jour de <strong>Koverae</strong> ?</button>
                </h2>

                <div id="collapseDixHuit" class="collapse" aria-labelledby="headingDixHuit" data-parent="#accordion_1">
                <div class="accordion-body">
                    Absolument, nous encourageons nos utilisateurs à partager leurs idées et besoins pour que nous puissions continuer à améliorer <strong>Koverae</strong> en fonction de vos retours.
                </div>
                </div>

            </div> <!-- .accordion-item -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseDixNeuf" aria-expanded="false" aria-controls="collapseDixNeuf">Que faire si je rencontre un bug ou un problème technique avec <strong>Koverae</strong> ?</button>
                </h2>

                <div id="collapseDixNeuf" class="collapse" aria-labelledby="headingDixNeuf" data-parent="#accordion_1">
                <div class="accordion-body">
                    En cas de problème technique, contactez immédiatement notre équipe de support. Nous nous engageons à résoudre tout problème dans les plus brefs délais pour minimiser l'impact sur votre activité.
                </div>
                </div>

            </div> <!-- .accordion-item -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseVingt" aria-expanded="false" aria-controls="collapseVingt">Comment <strong>Koverae</strong> gère-t-il les interruptions de service ?</button>
                </h2>

                <div id="collapseVingt" class="collapse" aria-labelledby="headingVingt" data-parent="#accordion_1">
                <div class="accordion-body">
                    Nous avons mis en place des protocoles rigoureux pour gérer les interruptions, incluant des sauvegardes régulières et des plans de reprise après sinistre, pour garantir une disponibilité maximale de notre service.
                </div>
                </div>

            </div> <!-- .accordion-item -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseVingtUn" aria-expanded="false" aria-controls="collapseVingtUn"><strong>Koverae</strong> permet-il le travail collaboratif entre équipes ?</button>
                </h2>

                <div id="collapseVingtUn" class="collapse" aria-labelledby="headingVingtUn" data-parent="#accordion_1">
                <div class="accordion-body">
                    Oui, <strong>Koverae</strong> facilite la collaboration en temps réel entre équipes, permettant le partage d'informations, la gestion de projets, et la communication efficace au sein de votre entreprise.
                </div>
                </div>

            </div> <!-- .accordion-item -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseVingtDeux" aria-expanded="false" aria-controls="collapseVingtDeux">Comment puis-je partager des rapports ou des données avec mon équipe sur <strong>Koverae</strong> ?</button>
                </h2>

                <div id="collapseVingtDeux" class="collapse" aria-labelledby="headingVingtDeux" data-parent="#accordion_1">
                <div class="accordion-body">
                    Les rapports et données peuvent être partagés directement via la plateforme, avec des options pour contrôler l'accès et la visibilité selon les besoins de votre équipe.
                </div>
                </div>

            </div> <!-- .accordion-item -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseVingtDeux" aria-expanded="false" aria-controls="collapseVingtDeux">Puis-je accéder à <strong>Koverae</strong> depuis mon téléphone ou ma tablette ?</button>
                </h2>

                <div id="collapseVingtDeux" class="collapse" aria-labelledby="headingVingtDeux" data-parent="#accordion_1">
                <div class="accordion-body">
                    Oui, <strong>Koverae</strong> est accessible sur les appareils mobiles via une application dédiée ou un navigateur web, vous permettant de gérer votre entreprise où que vous soyez.
                </div>
                </div>

            </div> <!-- .accordion-item -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseVingtTrois" aria-expanded="false" aria-controls="collapseVingtTrois">Y a-t-il des limitations d'accès à <strong>Koverae</strong> en fonction de la localisation géographique ?</button>
                </h2>

                <div id="collapseVingtTrois" class="collapse" aria-labelledby="headingVingtTrois" data-parent="#accordion_1">
                <div class="accordion-body">
                    Non, <strong>Koverae</strong> est conçu pour être accessible à l'échelle mondiale, tant que vous disposez d'une connexion internet.
                </div>
                </div>

            </div> <!-- .accordion-item -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseVingtQuatre" aria-expanded="false" aria-controls="collapseVingtQuatre">Quelles sont les exigences techniques pour utiliser <strong>Koverae</strong> ?</button>
                </h2>

                <div id="collapseVingtQuatre" class="collapse" aria-labelledby="headingVingtQuatre" data-parent="#accordion_1">
                <div class="accordion-body">
                    <strong>Koverae</strong> est conçu pour être léger et compatible avec la plupart des systèmes modernes. Les détails spécifiques peuvent varier selon les modules utilisés, mais généralement, une connexion internet et un navigateur web récent sont suffisants.
                </div>
                </div>

            </div> <!-- .accordion-item -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseVingtCinq" aria-expanded="false" aria-controls="collapseVingtCinq"><strong>Koverae</strong> est-il compatible avec Mac et PC ?</button>
                </h2>

                <div id="collapseVingtCinq" class="collapse" aria-labelledby="headingVingtCinq" data-parent="#accordion_1">
                <div class="accordion-body">
                    Oui, <strong>Koverae</strong> est entièrement compatible avec les systèmes d'exploitation Mac et PC, assurant une flexibilité maximale pour votre entreprise
                </div>
                </div>

            </div> <!-- .accordion-item -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseVingtSix" aria-expanded="false" aria-controls="collapseVingtSix"><strong>Koverae</strong> est-il conforme aux normes de confidentialité et de protection des données ?</button>
                </h2>

                <div id="collapseVingtSix" class="collapse" aria-labelledby="headingVingtSix" data-parent="#accordion_1">
                <div class="accordion-body">
                    Oui, Koverae respecte strictement les normes de confidentialité et de protection des données, pour garantir la sécurité et la conformité de vos informations.
                </div>
                </div>

            </div> <!-- .accordion-item -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseVingtSept" aria-expanded="false" aria-controls="collapseVingtSept">Comment puis-je supprimer mes données de <strong>Koverae</strong> si nécessaire ?</button>
                </h2>

                <div id="collapseVingtSept" class="collapse" aria-labelledby="headingVingtSept" data-parent="#accordion_1">
                <div class="accordion-body">
                    Si vous souhaitez supprimer vos données, vous pouvez en faire la demande à notre équipe de support, qui s'assurera que vos informations sont effacées conformément à notre politique de confidentialité et aux exigences légales.
                </div>
                </div>

            </div> <!-- .accordion-item -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseVingtHuit" aria-expanded="false" aria-controls="collapseVingtHuit">Puis-je utiliser <strong>Koverae</strong> pour gérer plusieurs entreprises ?</button>
                </h2>

                <div id="collapseVingtHuit" class="collapse" aria-labelledby="headingVingtHuit" data-parent="#accordion_1">
                <div class="accordion-body">
                    Oui, <strong>Koverae</strong> permet la gestion de plusieurs entreprises sous un seul compte, facilitant la supervision de diverses activités commerciales.
                </div>
                </div>

            </div> <!-- .accordion-item -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseVingtNeuf" aria-expanded="false" aria-controls="collapseVingtNeuf">Existe-t-il une communauté d'utilisateurs <strong>Koverae</strong> où je peux partager des idées et des conseils ?</button>
                </h2>

                <div id="collapseVingtNeuf" class="collapse" aria-labelledby="headingVingtNeuf" data-parent="#accordion_1">
                <div class="accordion-body">
                    Oui, nous encourageons la création d'une communauté dynamique d'utilisateurs <strong>Koverae</strong>, offrant un espace pour échanger des idées, des conseils, et des meilleures pratiques pour maximiser l'utilisation de la plateforme.
                </div>
                </div>

            </div> <!-- .accordion-item -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTrente" aria-expanded="false" aria-controls="collapseTrente">Comment puis-je payer mon abonnement à <strong>Koverae</strong> ?</button>
                </h2>

                <div id="collapseTrente" class="collapse" aria-labelledby="headingTrente" data-parent="#accordion_1">
                <div class="accordion-body">
                    Le paiement de votre abonnement à <strong>Koverae</strong> peut se faire par carte de crédit, Mobile Money virement bancaire ou par Cash. Nous offrons des options de paiement flexibles pour répondre à vos besoins.
                </div>
                </div>

            </div> <!-- .accordion-item -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTrenteUn" aria-expanded="false" aria-controls="collapseTrenteUn">Comment le réabonnement est-il géré ?</button>
                </h2>

                <div id="collapseTrenteUn" class="collapse" aria-labelledby="headingTrenteUn" data-parent="#accordion_1">
                <div class="accordion-body">
                    Le réabonnement est automatique pour garantir une continuité de service sans interruption. Vous recevrez des notifications avant chaque renouvellement, avec la possibilité de modifier ou d'annuler votre abonnement à tout moment depuis votre espace client.
                </div>
                </div>

            </div> <!-- .accordion-item -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTrenteDeux" aria-expanded="false" aria-controls="collapseTrenteDeux">Est-il possible de changer de plan d'abonnement ?</button>
                </h2>

                <div id="collapseTrenteDeux" class="collapse" aria-labelledby="headingTrenteDeux" data-parent="#accordion_1">
                <div class="accordion-body">
                    Oui, vous pouvez changer de plan d'abonnement à tout moment. Si vous souhaitez passer à un plan supérieur ou inférieur, contactez notre équipe de support pour une transition en douceur.
                </div>
                </div>

            </div> <!-- .accordion-item -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTrenteTrois" aria-expanded="false" aria-controls="collapseTrenteTrois">Quels sont les prérequis en termes d'équipements pour intégrer <strong>Koverae</strong> dans un magasin ?</button>
                </h2>

                <div id="collapseTrenteTrois" class="collapse" aria-labelledby="headingTrenteTrois" data-parent="#accordion_1">
                <div class="accordion-body">
                    Pour intégrer <strong>Koverae</strong> dans un magasin, vous aurez besoin d'un ordinateur ou d'une tablette avec accès à Internet pour accéder à la plateforme. Pour une expérience optimale, nous recommandons également des scanners de codes-barres et des imprimantes pour les reçus et factures.
                </div>
                </div>

            </div> <!-- .accordion-item -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTrenteQuatre" aria-expanded="false" aria-controls="collapseTrenteQuatre">Quels équipements sont nécessaires pour utiliser <strong>Koverae</strong> dans un restaurant ?</button>
                </h2>

                <div id="collapseTrenteQuatre" class="collapse" aria-labelledby="headingTrenteQuatre" data-parent="#accordion_1">
                <div class="accordion-body">
                    Dans un restaurant, en plus d'un ordinateur ou d'une tablette avec accès à Internet, il est conseillé d'avoir des terminaux de point de vente (POS) pour gérer les commandes et les paiements, ainsi que des imprimantes de cuisine pour envoyer directement les commandes aux stations de préparation.
                </div>
                </div>

            </div> <!-- .accordion-item -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTrenteCinq" aria-expanded="false" aria-controls="collapseTrenteCinq">Que faire si j'ai besoin d'aide pour configurer mon équipement avec <strong>Koverae</strong> ?</button>
                </h2>

                <div id="collapseTrenteCinq" class="collapse" aria-labelledby="headingTrenteCinq" data-parent="#accordion_1">
                <div class="accordion-body">
                    Notre équipe de support technique est à votre disposition pour vous aider à configurer votre équipement avec <strong>Koverae</strong>. Contactez-nous via le support en ligne, par téléphone, ou par email pour une assistance personnalisée.
                </div>
                </div>

            </div> <!-- .accordion-item -->
            <div class="accordion-item">
                <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTrenteSix" aria-expanded="false" aria-controls="collapseTrenteSix"><strong>Koverae</strong> propose-t-il des mises à jour pour s'adapter aux nouveaux équipements ?</button>
                </h2>

                <div id="collapseTrenteSix" class="collapse" aria-labelledby="headingTrenteSix" data-parent="#accordion_1">
                <div class="accordion-body">
                    Oui, <strong>Koverae</strong> est régulièrement mis à jour pour rester compatible avec les derniers équipements et technologies du marché, assurant ainsi que votre entreprise bénéficie toujours des meilleures fonctionnalités et intégrations.
                </div>
                </div>

            </div> <!-- .accordion-item -->

        </div>
      </div>
    </div>
  </div>
</section>

@endsection
