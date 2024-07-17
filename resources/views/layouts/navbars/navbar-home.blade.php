<!-- Header Video -->
<x-hero.hero-video />

<!-- Navbar Tab-Desktop Screen -->
<nav class="navbar navbar-expand-lg sticky-top d-none d-lg-block">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('images/logo-primary.png') }}" alt="Navbar Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li <?php if (Route::is('home')) {
                    echo 'class="nav-item active"';
                } ?> class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
            </ul>
        </div>
    </div>
</nav>



<!-- Navbar Mobile Screen -->
<div class="button_container d-block d-lg-none">
    <div class="button" id="toggle">
        <span class="top"></span>
        <span class="middle"></span>
        <span class="bottom"></span>
    </div>
</div>

<div class="overlay" id="overlay">
    <nav class="overlay-menu">
        <ul>
            <li class="mb-4">
                <a class="nav-link" href="{{ route('home') }}">
                    <img src="{{ asset('images/logo-primary.png') }}" alt="Navbar Logo">
                </a>
            </li>
            <li <?php if (Route::is('home')) {
                echo 'class="active"';
            } ?> class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li <?php if (Route::is('our-story')) {
                echo 'class="active"';
            } ?> class="nav-item">
                <a class="nav-link" href="#">Our Story</a>
            </li>
            <li <?php if (Route::is('ecopark')) {
                echo 'class="active"';
            } ?> class="nav-item">
                <a class="nav-link" href="#">Ecopark</a>
            </li>
            <li <?php if (Route::is('bale')) {
                echo 'class="nav-item active"';
            } ?> class="nav-item">
                <a class="nav-link" href="#">Balé</a>
            </li>
            <li <?php if (Route::is('blogs')) {
                echo 'class="active"';
            } ?> class="nav-item">
                <a class="nav-link" href="#">Blogs</a>
            </li>
            <li <?php if (Route::is('contact-us')) {
                echo 'class="active"';
            } ?> class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
            </li>
            <!-- <li <?php if (Route::is('rates')) {
                echo 'class="active"';
            } ?> class="nav-item">
                <a class="nav-link" href="#">Rates</a>
            </li> -->
            <li class="nav-item mt-3">
                <a class="btn btn--secondary-sm" href="#">Book Now</a>
            </li>
        </ul>
    </nav>
</div>
