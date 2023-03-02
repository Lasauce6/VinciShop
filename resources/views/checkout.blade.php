@extends('main')

@section('title', "Confirmation de la réservation - VINCI'SHOP")

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
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home page_item">
                                    <a href="{{ route('index') }}/" aria-current="page">Vinci shop</a>
                                </li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                    <a href="{{ route('products') }}">Réservez vos produits</a>
                                </li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page curent-menu-item">
                                    <a href="{{ route('cart') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                        </svg>
                                        Panier
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav><!-- #site-navigation -->
                </div><!-- .wrap -->
            </div><!-- .navigation-top -->

        </header><!-- #masthead -->


        <div class="site-content-contain">
            <div id="content" class="site-content container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="mb-3">Informations de commande</h4>
                                        <form class="form needs-validation" action="" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="firstName">Prénom</label>
                                                    <input type="text" class="form-control" id="firstName" value="{{ old('nom') }}" name="nom" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="lastName">Nom</label>
                                                    <input type="text" class="form-control" id="lastName" value="{{ old('prenom') }}" name="prenom" required>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" placeholder="nom@example.fr" value="{{ old('email') }}" name="email" required>
                                            </div>

                                            <button class="btn btn-primary btn-block" type="submit" style="border: none">Valider la commande</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- #content -->
@endsection

@section('scripts')

@endsection
