<!-- Section Hero -->
<section class="section hero">
    <div class="hero-video">
        {{-- <video src="{{ asset('images/video-cinematic.mp4') }}" autoplay="autoplay" loop="loop" preload="auto" muted defaultMuted playsinline></video> --}}
        <img src="{{ asset('images/banner-home.png') }}" class="w-100"/>

        <div class="overlay"></div>
        <!-- <a data-toggle="modal" data-target="#hero-video">
            <div class="btn--play-video">
                <ion-icon name="play-outline" class="icon"></ion-icon>
            </div>
        </a> -->

        <div class="hero-video__content d-none d-md-flex justify-content-center">
            <a href="https://web.facebook.com/boemisora" target="_blank">
                <div class="social-icon d-flex justify-content-center align-items-center">
                    <i class="fab fa-facebook"></i>
                </div>
            </a>
            {{-- <a href="#" target="_blank">
                <div class="social-icon d-flex justify-content-center align-items-center">
                    <i class="fab fa-youtube"></i>
                </div>
            </a> --}}
            <a href="https://www.instagram.com/boemisora/" target="_blank">
                <div class="social-icon d-flex justify-content-center align-items-center">
                    <i class="fab fa-instagram"></i>
                </div>
            </a>
        </div>
    </div>
</section>
