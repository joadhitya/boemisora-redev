<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

@endphp

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Boemisora" />
    <meta name="keywords" content="" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="A short getaway from the city’s hustle to reconnect and interact with nature. We are more than just a place; we create memories.">
    <meta property="og:type" content="website" />
	<meta property="og:image" content="{{ asset('images/favicon.ico') }}" />
	<meta property="og:image:type" content="image/png" />

    <title>Boemisora</title>
    <link rel="icon" href="{{ asset('images/logo-icon.png') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 4.3.1 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- CSS Vendors -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.5.1/collection/components/icon/icon.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl-carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl-carousel-theme.css') }}" rel="stylesheet">
</head>

<body>
    <div id="preloader" aria-busy="true" aria-label="Loading, please wait." role="progressbar">
        <img src="{{ asset('images/logo-primary.png') }}" class="icon" alt="Preloader Logo">
    </div>
    <div id="app">
        <div id="page">
            @php
                $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
                $segment = $uriSegments[1];
            @endphp

            @if($segment == "")
                @include('layouts.navbars.navbar-home')

            @else
                @include('layouts.navbars.navbar')
            @endif

            <!-- Content -->
            @yield('content')

            @include('layouts.footers.footer')    
        </div>
    </div>

    <!-- Scripts -->
    <!-- JS Base -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- JS Vendors -->
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- JS Assets -->
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/accordion.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/mobile-nav.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/share-link-generator.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/page-loader.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript">
	    $("#owl-carousel").owlCarousel({
            items: 3,
            slideTransition: 'linear',
            loop: true,
            margin: 0,
            autoplay: true,
            smartSpeed: 500,
            autoplayTimeout: 7000,
            autoplayHoverPause: true,
            rewind: true,
            stagePadding: 0,
            // navText:["<div class='nav-btn prev-slide'><ion-icon name='arrow-back-outline'></ion-icon></div>","<div class='nav-btn next-slide'><ion-icon name='arrow-forward-outline'></ion-icon></div>"],
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    stagePadding: 25,
                },
                768: {
                    items: 3,
                    stagePadding: 40,
                },
                992: {
                    items: 3,
                    stagePadding: 60,
                },
            }
	    });
    </script>

    <script type="text/javascript">
	    $("#owl-carousel-2").owlCarousel({
            items: 3,
            slideTransition: 'linear',
            loop: true,
            margin: 0,
            autoplay: true,
            smartSpeed: 500,
            autoplayTimeout: 7000,
            autoplayHoverPause: true,
            rewind: true,
            stagePadding: 0,
            navText:["<div class='nav-btn prev-slide'><ion-icon name='arrow-back-outline'></ion-icon></div>","<div class='nav-btn next-slide'><ion-icon name='arrow-forward-outline'></ion-icon></div>"],
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                992: {
                    items: 3,
                }
            }
	    });
    </script>

    <script>
        AOS.init({
            duration: 500,
            once: true,
        });
    </script>
    
    @stack('page-scripts')
</body>

</html>
