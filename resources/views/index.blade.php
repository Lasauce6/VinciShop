@extends('main')

@section('title', "VINCI'SHOP – Boutique éphémère")

@section('content')
    <div id="page" class="site">
        {{--        <a class="skip-link screen-reader-text" href="#content">Aller au contenu principal</a>--}}

        <header id="masthead" class="site-header">

            <div class="custom-header">

                <div class="custom-header-media">
                    <div id="wp-custom-header" class="wp-custom-header">
                        <img src="{{ asset('storage/images/header.png') }}" width="1024" height="1024" alt="Header">
                    </div>
                </div>

                <div class="site-branding" style="margin-bottom: 72px;">
                    <div class="wrap">


                        <div class="site-branding-text">
                            <h1 class="site-title">
                                <a href="{{ route('index') }}" rel="home">VINCI'SHOP</a>
                            </h1>

                            <p class="site-description">Boutique éphémère </p>
                        </div><!-- .site-branding-text -->


                    </div><!-- .wrap -->
                </div><!-- .site-branding -->

            </div><!-- .custom-header -->

            <div class="navigation-top site-navigation-fixed">
                <div class="wrap">
                    <nav id="site-navigation" class="main-navigation" aria-label="Menu supérieur">
                        <button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                            Menu
                        </button>

                        <div class="menu-menu-superieur-container">
                            <ul id="top-menu" class="menu">
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item">
                                    <a href="{{ route('index') }}/" aria-current="page">Vinci shop</a>
                                </li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                    <a href="{{ route('products') }}">Réservez vos produits</a>
                                </li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                    <a href="{{ route('cart') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                        </svg>
                                        Panier
                                    </a>
                                </li>
                                @auth()
                                    <li>
                                        <a href="{{ route('admin.index') }}">Admin</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}">Déconnexion</a>
                                    </li>
                                @endauth
                            </ul>
                        </div>
                    </nav><!-- #site-navigation -->
                </div><!-- .wrap -->
            </div><!-- .navigation-top -->

        </header><!-- #masthead -->


        <div class="site-content-contain">
            <div id="content" class="site-content">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main">
                        <article class="twentyseventeen-panel page type-page status-publish hentry">
                            <div class="panel-content">
                                <div class="container">
                                    <div class="entry-content">
                                        @if($errors->any())
                                            <div class="alert alert-danger mb-5 text-center">
                                                <p>Une erreur est survenue lors de la validation de votre commande</p>
                                                <ul>
                                                    @foreach($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        @if($success)
                                            <div class="alert alert-success mb-5 text-center">
                                                <p>Votre commande a bien été prise en compte ! <br>
                                                    Un mail de confirmation vous a été envoyé.
                                                </p>
                                                <p><a href="#horaires">Rendez vous au Lycée pour récupérer votre commande</a></p>
                                            </div>
                                        @endif

                                        <p>Les étudiants des BTS commerciaux du <a href="https://www.vinci-melun.org/">Lycée Polyvalent Léonard de Vinci (Melun)</a> s’emparent d’un concept tendance : le
                                            <strong>pop up store </strong></p>
                                        <div
                                            class="wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile"
                                            style="grid-template-columns:auto 33%">
                                            <div class="wp-block-media-text__content">
                                                <h2><strong>Qu’est-ce qu’un pop up store ?</strong></h2>
                                            </div>
                                            <figure class="wp-block-media-text__media">
                                                <img decoding="async" width="1024" height="512"
                                                     src="{{ asset('storage/images/nuageMots.png') }}"
                                                >
                                            </figure>
                                        </div>

                                        <p>Un pop up store ou «&nbsp;une boutique éphémère&nbsp;» est un espace de vente
                                            créatif et temporaire. Les clients y achètent des produits au détail dans un
                                            univers spécialement pensé pour l’occasion.</p>
                                        <p><strong>Le principe</strong> : installer un point de vente et le faire
                                            disparaitre en quelques jours, quelques semaines ou quelques mois. </p>
                                        <p><strong>Le but </strong>: vendre des produits ou des services en proposant
                                            aux clients une experience étonnante. </p>
                                        <h2><strong>Saison 2023 : </strong>Un pop up store «&nbsp;tout miel&nbsp;» </h2>

                                        <figure
                                            class="is-layout-flex wp-block-gallery-1 wp-block-gallery has-nested-images columns-4 is-cropped">
                                            <figure class="wp-block-image size-large">
                                                <img decoding="async" loading="lazy" width="640" height="427"
                                                     src="{{ asset('storage/images/img1.jpg') }}"
                                                     alt="" class="wp-image-114">
                                            </figure>
                                            <figure class="wp-block-image size-large">
                                                <img decoding="async" loading="lazy" width="640" height="427"
                                                     src="{{ asset('storage/images/img2.jpg') }}"
                                                     alt="" class="wp-image-116">
                                            </figure>
                                            <figure class="wp-block-image size-large">
                                                <img decoding="async" loading="lazy" width="640" height="427"
                                                     src="{{ asset('storage/images/img3.jpg') }}"
                                                     alt="" class="wp-image-115">
                                            </figure>
                                            <figure class="wp-block-image size-full">
                                                <img decoding="async" loading="lazy" width="375" height="250"
                                                     src="{{ asset('storage/images/img4.jpg') }}"
                                                     alt="" class="wp-image-46">
                                            </figure>
                                        </figure>


                                        <div class="wp-block-media-text alignwide is-stacked-on-mobile"
                                             style="grid-template-columns:38% auto">
                                            <figure class="wp-block-media-text__media">
                                                <img decoding="async" loading="lazy" width="673" height="139"
                                                     src="{{ asset('storage/images/apiculteurLogo.png') }}"
                                                     alt="" class="wp-image-108 size-full">
                                            </figure>
                                            <div class="wp-block-media-text__content">
                                                <p>
                                                    Cette année, le pop up store mettra en avant les produits d’un
                                                    apiculteur local belifontain <br>
                                                    « <a rel="noreferrer noopener" href="https://www.miel-paris.com/" target="_blank">Un apiculteur près de chez vous</a> »
                                                </p>
                                            </div>
                                        </div>

                                        <div class="is-layout-flex wp-block-buttons">
                                            <div class="wp-block-button aligncenter">
                                                <a class="wp-block-button__link has-luminous-vivid-orange-background-color has-background wp-element-button" href="{{ route('products') }}">Voir la sélection de produits</a>
                                            </div>
                                        </div>


                                        <h2 id="horaires"><strong>Ouverture du Pop up store </strong></h2>


                                        <div class="wp-block-cover is-light has-small-font-size"
                                             style="min-height:151px">
                                            <span aria-hidden="true"
                                                  class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
                                            <img decoding="async" loading="lazy" width="640" height="427"
                                                class="wp-block-cover__image-background wp-image-116" alt=""
                                                src="{{ asset('storage/images/img2.jpg') }}"
                                                data-object-fit="cover">
                                        </div>

                                        <hr class="wp-block-separator has-alpha-channel-opacity">
                                        <table>
                                            <tr>
                                                <th>8 au 10 mars 2023</th>
                                                <th>11 mars 2023</th>
                                            </tr>
                                            <tr>
                                                <td>12h05-13h30</td>
                                                <td>9h00-13h00</td>
                                            </tr>
                                        </table>

                                        <h2><strong>Pourquoi un Pop up store au sein du lycée Léonard de Vinci ?</strong></h2>
                                        <p>
                                            Créer un pop store au sein de leur lycée, fournit l’occasion aux étudiants
                                            des BTS MCO et NDRC de mettre en pratique leurs savoirs faire de
                                            commerciaux.
                                        </p>
                                        <p>
                                            Ouvrir une boutique éphémère <strong>offre l’opportunité à une marque de
                                                faire découvrir son univers et ses produits aux consommateurs</strong>,
                                            dans une boutique inhabituelle.
                                        </p>


                                        <h2><strong>Un projet ambitieux</strong></h2>


                                        <div class="wp-block-cover is-light has-parallax has-small-font-size"
                                             style="min-height:259px"><span aria-hidden="true"
                                                                            class="wp-block-cover__background has-luminous-vivid-orange-background-color has-background-dim-30 has-background-dim"></span>
                                            <div role="img"
                                                 class="wp-block-cover__image-background wp-image-60 has-parallax"
                                                 style="background-position:50% 50%;background-image:url(https://wp31-c12769-2.btsndrc.ac/wp-content/uploads/2023/02/blacksmith-g27e0e5c9d_640.jpg)"></div>
                                            <div class="wp-block-cover__inner-container">

                                                <h2 class="has-medium-font-size"><strong>Apprendre en faisant…</strong></h2>


                                                <blockquote
                                                    class="wp-block-quote has-text-align-right has-small-font-size text-light">
                                                    <p><em><strong>c’est en forgeant que l’on devient forgeron</strong>&nbsp;</em>
                                                    </p>
                                                    <cite>Aristote </cite>
                                                </blockquote>
                                            </div>
                                        </div>

                                        <div class="offset-sm-1" style="margin-left: 2%">
                                            <ul class="mt-3" style="list-style-type: disc;">
                                                <li>Developper des compétences professionnelles (conseiller, vendre, suivre les ventes, animer et gérer l’espace commercial).</li>
                                                <li>Développer ses « soft skills » et ses capacités créatives (création de supports de communication et de vente).</li>
                                                <li>Expérimenter le plaisir de créer, de travailler ensemble.</li>
                                                <li>Donner du sens à ses apprentissages.</li>
                                                <li>Développer son esprit d’initiative, son sens de l’organisation, sa capacité à travailler en équipe, à communiquer, à persévérer.</li>
                                                <li>Gérer un projet, résoudre des problèmes, gérer son temps et prendre des décisions.</li>
                                                <li>Animer et gérer l’espace commercial, conseiller et vendre.</li>
                                            </ul>
                                        </div>

                                        <div class="is-layout-flex wp-block-buttons">
                                            <div class="wp-block-button aligncenter">
                                                <a class="wp-block-button__link has-luminous-vivid-orange-background-color has-background wp-element-button" href="{{ route('products') }}">Précommandes</a>
                                            </div>
                                        </div>


                                        <p></p>
                                    </div><!-- .entry-content -->

                                </div><!-- .wrap -->
                            </div><!-- .panel-content -->

                        </article><!-- #post-59 -->


                    </main><!-- #main -->
                </div><!-- #primary -->


            </div><!-- #content -->


@endsection

@section('scripts')

@endsection
