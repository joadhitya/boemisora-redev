<!-- Section Visit Information -->
<section class="section visit-information">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3 text-center">
                <h2 class="mb-4">Visit Information</h2>
                {{-- <p>
                    Ut enim ad minim veniam, quis nostrud exercitation ullam 
                    laboris nisi ut aliquip ex ea.
                </p> --}}
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12 col-md-5 col-lg-4 first"></div>

            <div class="col-12 col-md-7 col-lg-8 second">
                <h3 class="mb-4">COVID Protocol</h3>
                
                <div class="row">
                    {{-- @forelse ($covidProtocols as $covid_protocol) --}}
                    <div class="col-6">
                        <div class="tile--protocol mb-4">
                            {{-- <img src="/storage/{{ $covid_protocol->covid_protocol_logo }}" alt="Value Icon">
                            <h4 class="my-2">{{ $covid_protocol->covid_protocol_name }}</h4>
                            <p>
                                {{ $covid_protocol->covid_protocol_description }}
                            </p>
                        </div>
                    </div>
                    @empty
                    <div class="col-md-12">
                        <h5>There is no Covid Protocol</h5>
                    </div>
                    @endforelse --}}
                   
                            <img src="{{ asset('images/icon-covid_1.png') }}" alt="Value Icon">
                            {{-- <h4 class="my-2">Wear a Mask</h4> --}}
                            <p>
                                Disinfect tent areas and public facilities upon and after guests' arrivals
                            </p>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="tile--protocol mb-4">
                            <img src="{{ asset('images/icon-covid_2.png') }}" alt="Value Icon">
                            {{-- <h4 class="my-2">Check Your Temperature</h4> --}}
                            <p>
                                Guaranteed cleanliness of all amenities, including towels, blankets, and sheets.
                            </p>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="tile--protocol mb-4">
                            <img src="{{ asset('images/icon-covid_3.png') }}" alt="Value Icon">
                            {{-- <h4 class="my-2">Do a Social Distancing</h4> --}}
                            <p>
                                Hand washing stations and garbage disposals are placed in several points.
                            </p>
                        </div>
                    </div>

                    {{-- <div class="col-6">
                        <div class="tile--protocol mb-4">
                            <img src="{{ asset('images/icon-covid_4.png') }}" alt="Value Icon">
                            <h4 class="my-2">Use Hand Sanitizer</h4>
                            <p>
                                Ut enim ad minim veniam, quis nostrud exercitation ullam.
                            </p>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5 py-md-6">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3 text-center">
                <h3 class="mb-4">Our Terms - House Rules</h3>
                {{-- <p>
                    Ut enim ad minim veniam, quis nostrud exercitation ullam 
                    laboris nisi ut aliquip ex ea.
                </p> --}}
            </div>

            <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                <ul>
                    <li>
                        <i class="fa fa-check mr-2"></i>
                        Keep calm and quiet even when we are in the open space (be wise enough).
                    </li>
                    <li>
                        <i class="fa fa-check mr-2"></i>
                        Keep the area clean
                    </li>
                    <li>
                        <i class="fa fa-check mr-2"></i>
                        Always take care of your valuables
                    </li>
                    <li>
                        <i class="fa fa-check mr-2"></i>
                        Be nice to fellow participants
                    </li>
                    <li>
                        <i class="fa fa-check mr-2"></i>
                        It’s forbidden to make a bonfire except in the designated area
                    </li>
                    <li>
                        <i class="fa fa-check mr-2"></i>
                        Respect the nature
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2 col-lg-5 offset-lg-0 third">
                <h3 class="mb-4">Our Surrounding</h3>
                <p>
                    Find a new experience in the wilderness, where you can meet a group of monkeys in the morning and maybe
                    a snake on your tracking road. At night, you can stargaze above the Boemisora campsite. Oh and the one you
                    shouldn’t miss is the view of ‘Rawa Pening’ from the top of the hill!
                </p>
            </div>

            <div class="col-12 col-md-8 offset-md-2 col-lg-7 offset-lg-0 fourth">
                <div class="masonry-2">
                    <div class="brick">
                        <div class="content-masonry">
                            <div class="content-masonry-overlay"></div>
                            <img class="content-masonry-image" src="https://images.unsplash.com/photo-1560139517-d689341179a2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=3451&q=80">
                            <div class="content-masonry-details fadeIn-top">
                                {{-- <h5>Lorem Ipsum dolor sit amet</h5> --}}
                            </div>
                        </div>	        	
                    </div>
                    <div class="brick">
                        <div class="content-masonry">
                            <div class="content-masonry-overlay"></div>
                            <img class="content-masonry-image" src="https://images.unsplash.com/photo-1556912173-3bb406ef7e77?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=3450&q=80">
                            <div class="content-masonry-details fadeIn-top">
                                {{-- <h5>Lorem Ipsum dolor sit amet</h5> --}}
                            </div>
                        </div>	        	
                    </div>
                    <div class="brick">
                        <div class="content-masonry">
                            <div class="content-masonry-overlay"></div>
                            <img class="content-masonry-image" src="https://images.unsplash.com/photo-1560033311-b9b5cf8cbaa8?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1924&q=80">
                            <div class="content-masonry-details fadeIn-top">
                                {{-- <h5>Lorem Ipsum dolor sit amet</h5> --}}
                            </div>
                        </div>	        	
                    </div>
                    <div class="brick">
                        <div class="content-masonry">
                            <div class="content-masonry-overlay"></div>
                            <img class="content-masonry-image" src="https://images.unsplash.com/photo-1559989960-106e6cd6273e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=3500&q=80">
                            <div class="content-masonry-details fadeIn-top">
                                {{-- <h5>Lorem Ipsum dolor sit amet</h5> --}}
                            </div>
                        </div>	
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5 py-md-6">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3 text-center">
                <h3 class="mb-4">List to Bring</h3>
            </div>
        </div>

        <div class="row mt-4 mt-md-5">
            @forelse ($listToBring as $list_to_bring)
            <div class="col-6 col-lg-3">
                <div class="tile--bring-list mb-4">
                    <img src="/storage/{{ $list_to_bring->list_to_bring_logo }}" alt="Value Icon">
                    <h4 class="my-2">{{ $list_to_bring->list_to_bring_name }}</h4>
                    <p>
                        {{-- {{ $list_to_bring->list_to_bring_description }} --}}
                    </p>
                </div>
            </div>
            @empty
            <div class="col-md-12">
                <h5>There is no List To Bring</h5>
            </div>
            @endforelse
            
            {{-- <div class="col-6 col-lg-3">
                <div class="tile--bring-list mb-4">
                    <img src="{{ asset('images/icon-list-to-bring_2.png') }}" alt="Value Icon">
                    <h4 class="my-2">Jacket</h4>
                    <p>
                        Ut enim ad minim veniam, quis nostrud ullam.
                    </p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="tile--bring-list mb-4">
                    <img src="{{ asset('images/icon-list-to-bring_3.png') }}" alt="Value Icon">
                    <h4 class="my-2">Camera</h4>
                    <p>
                        Ut enim ad minim veniam, quis nostrud ullam.
                    </p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="tile--bring-list mb-4">
                    <img src="{{ asset('images/icon-list-to-bring_4.png') }}" alt="Value Icon">
                    <h4 class="my-2">Flashlight</h4>
                    <p>
                        Ut enim ad minim veniam, quis nostrud ullam.
                    </p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="tile--bring-list mb-4">
                    <img src="{{ asset('images/icon-list-to-bring_5.png') }}" alt="Value Icon">
                    <h4 class="my-2">Beanie</h4>
                    <p>
                        Ut enim ad minim veniam, quis nostrud ullam.
                    </p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="tile--bring-list mb-4">
                    <img src="{{ asset('images/icon-list-to-bring_6.png') }}" alt="Value Icon">
                    <h4 class="my-2">Guitar</h4>
                    <p>
                        Ut enim ad minim veniam, quis nostrud ullam.
                    </p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="tile--bring-list mb-4">
                    <img src="{{ asset('images/icon-list-to-bring_7.png') }}" alt="Value Icon">
                    <h4 class="my-2">Drinkwater</h4>
                    <p>
                        Ut enim ad minim veniam, quis nostrud ullam.
                    </p>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="tile--bring-list mb-4">
                    <img src="{{ asset('images/icon-list-to-bring_8.png') }}" alt="Value Icon">
                    <h4 class="my-2">Shoes</h4>
                    <p>
                        Ut enim ad minim veniam, quis nostrud ullam.
                    </p>
                </div>
            </div> --}}
        </div>
    </div>
</section>