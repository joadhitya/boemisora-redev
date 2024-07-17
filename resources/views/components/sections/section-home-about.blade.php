<!-- Section Home About -->
<section class="section top-about">
    <div class="container">
        @if ($aboutUs)
            <div class="row" data-aos="fade-up" data-aos-easing="ease-in-sine">
                <div class="col-12 col-md-6 my-auto">
                    <img src="{{ asset('images/logo-primary.png') }}" class="w-75 img-fluid mb-4" alt="Logo Icon">
                    <h5>
                        <span>'A short getaway from the city’s hustle to reconnect and interact with nature'</span>
                    </h5>
                    <h5 class="my-3">
                        We are more than just a place; we create memories.
                    </h5>
                    
                    <img src="{{ asset('images/final-pattern-03.png') }}" class="w-100 img-fluid d-block d-md-none"
                        alt="Top About Image">

                    <a href="#" class="btn--primary" style="padding-top:5px; position: absolute;
                    margin-top: 10px;">Read Our Full Story</a>
                </div>

                <div class="col-12 col-md-6 d-none d-md-block">
                    {{-- <img src="/storage/{{ $aboutUs->about_us_image }}" class="w-100 img-fluid" alt="Top About Image"> --}}
                    <img src="{{ asset('images/final-pattern-03.png') }}" class="w-100 img-fluid"
                        alt="Top About Image">
                </div>
            </div>
        @else

        @endif

    </div>
</section>
