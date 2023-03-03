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
                                    <a href="{{ route('infos') }}">Informations</a>
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
                                <li class="menu-item menu-item-type-post_type menu-item-object-page col-md3 text-end">
                                    <img src="{{ asset('storage/images/logo.png') }}" style="width: 30%">
                                </li>
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

                                            <div class="text-center">
                                                <h3>Les étudiants des BTS commerciaux du <a href="https://www.vinci-melun.org/">Lycée Polyvalent Léonard de Vinci (Melun)</a> s’emparent d’un concept tendance : le
                                                    <strong>pop up store </strong></h3>
                                            </div>

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



                                        <h2 id="horaires"><strong>Horaires d'ouverture du Pop up store </strong></h2>


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
                                                    <th>08/03/2023</th>
                                                    <th>09/03/2023</th>
                                                    <th>10/03/2023</th>
                                                    <th>11/03/2023</th>
                                                </tr>
                                                <tr>
                                                    <td>12h20-13h25</td>
                                                    <td>12h20-13h25</td>
                                                    <td>12h20-13h25</td>
                                                    <td>8h30-12h30</td>
                                                </tr>
                                                <tr>
                                                    <td>17h30-18h30</td>
                                                    <td>16h30-18h30</td>
                                                    <td>15h30-18h30</td>
                                                    <td></td>
                                                </tr>
                                            </table>
                                            <p>Nous vous retrouverons à droite du CDI dans le lycée</p>



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
        </div>
    </div>


@endsection

@section('scripts')

@endsection
