<!-- Section Home Story -->
<section class="section top-story">
    <div class="container">
        <div class="row">
            {{-- <div class="col-12 col-md-6 first">
                <h2>The <br/>Story</h2>
                <h5 class="mt-4 mt-md-5 mb-3">
                    Boemisora is located on a hill, with a view to the southwest of Rawa Pening and on the north side of
                    the
                    mountains
                </h5>
                <p>
                    Carrying the theme of "Farming" which has been presented from the beginning since entering the area
                    and
                    the activities inside. Boemisora provides a place to stay and pamper visitors with a very
                    comfortable
                    architectural arrangement of the building with the coolness of nature that spoils the senses.

                </p>
            </div> --}}

            <div class="col-12 second">
                <h2 class="text-left text-md-center" data-aos="fade-in" data-aos-easing="ease-in-sine">Find Your Happiness</h2>
                <div class="row mt-4 mt-md-5">
                    {{-- @forelse ($values as $value)
                    <div class="col-6">
                        <div class="tile--value mb-4">
                            @php
                            $logo = $value['value_logo'];
                            $img_src = "storage/".$logo;
                            @endphp
                            <img src="{{ asset($img_src) }}" alt="{{ $value['value_description'] }}">
                            <h5 class="my-2 text-white">{{ $value['value_name'] }}</h5>
                            <p>{{ $value['value_description'] }}</p>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="tile--value mb-4">
                            <h5>There is no Data Value
                            </h5> --}}
                    <div class="col-6 col-lg-4">
                        <div class="tile--value mb-4">
                            {{-- <img src="{{ asset('images/icon-value_1.png') }}" alt="Value Icon"> --}}
                            <img src="{{ asset('images/IMG_1218 (1).PNG') }}" alt="Value Icon">
                            <h4 class="mt-2 mb-3">Escaping</h4>
                            <p>
                                Take a break from your routines, disconnect from the digital world and enjoy the moment
                            </p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4">
                        <div class="tile--value mb-4">
                            <img src="{{ asset('images/IMG_1222.PNG') }}" alt="Value Icon">
                            <h4 class="mt-2 mb-3">Farming</h4>
                            <p>
                                Get your hands dirty in the soil and discover the story behind the food on your table
                            </p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4">
                        <div class="tile--value mb-4">
                            <img src="{{ asset('images/IMG_1220.PNG') }}" alt="Value Icon">
                            <h4 class="mt-2 mb-3">Exploring</h4>
                            <p>
                                Learn and explore new things by spending time with our Bala Boemi
                            </p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 offset-lg-2">
                        <div class="tile--value mb-4">
                            <img src="{{ asset('images/IMG_1216.PNG') }}" alt="Value Icon">
                            <h4 class="mt-2 mb-3">Healing</h4>
                            <p>Immerse yourself in the fresh breeze while enjoying the calming sound of chirping birds and cicadas
                            </p>
                        </div>
                    </div>
                    <div class="col-6 offset-3 col-lg-4 offset-lg-0">
                        <div class="tile--value mb-4">
                            <img src="{{ asset('images/IMG_1221.PNG') }}" alt="Value Icon">
                            <h4 class="mt-2 mb-3">Relaxing</h4>
                            <p>
                                Rest and recharge your energy inside our comfortable Balé Camp and Villa
                            </p>
                        </div>
                    </div>
                    {{-- @endforelse --}}

                </div>
            </div>
        </div>
    </div>
</section>
