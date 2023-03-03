@extends('main')

@section('title', "Panier - VINCI'SHOP")

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
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home">
                                    <a href="{{ route('index') }}/" aria-current="page">Vinci shop</a>
                                </li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                    <a href="{{ route('infos') }}">Informations</a>
                                </li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                    <a href="{{ route('products') }}">Réservez vos produits</a>
                                </li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item">
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
            <div id="content" class="site-content container">

                <div class="row">
                    <div class="col-md-12">
                        <h1 class="mb-5">Votre panier</h1>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <table class="table table-striped">

                            <thead>
                            <tr>
                                <th>Produit</th>
                                <th>Prix</th>
                                <th>Quantité</th>
                                <th></th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cart as $product)
                                <tr>
                                    <td>{{ $product['nom'] }}</td>
                                    <td>{{ $product['prix'] }} €</td>
                                    <form action="{{ route('cart.update') }}" method="post">
                                        @csrf
                                        <td>
                                            <input type="hidden" name="id" value="{{ $product['id'] }}">
                                            <div class="input-group">
                                                <input type="number" name="quantite" value="{{ $product['quantite'] }}" min="1" max="{{ $product['qte'] }}" class="form-control mr-2" style="width: 0">
                                            </div>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn mt-1" style="border: none">Modifier</button>
                                        </td>
                                    </form>
                                    <td>{{ $product['prix'] * $product['quantite'] }} €</td>
                                    <td>
                                        <form action="{{ route('cart.remove') }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" value="{{ $product['id'] }}" name="id">
                                            <button type="submit" class="btn" style="border: none">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="row text-center">
                            <div class="col-auto me-auto">
                                <h2>Total : {{ $total }} €</h2>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('products') }}" class="btn btn-primary">Continuer votre commande</a>
                                <a href="{{ route('cart.destroy') }}" class="btn btn-danger">Vider le panier</a>
                                <a href="{{ route('cart.checkout') }}" class="btn btn-success">Réserver</a>
                            </div>
                            <p class="text-end">(Dans la limite des stocks disponibles)</p>
                        </div>
                    </div>
                </div>

            </div><!-- #content -->
@endsection

@section('scripts')

@endsection
