<!-- Section Banner -->
<section class="section banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 px-0">
                <img src="{{ asset('images/banner-our-story.jpg') }}" class="w-100 img-fluid" alt="Banner Image">
            </div>
        </div>
    </div>
</section>

<!-- Section Our Story -->
<section class="section our-story">
    <div class="container">
        <div class="row">
            {{-- <div class="col-12 col-md-4">
                <h1 class="mb-4">Our Story</h1>
                <img src="{{ asset('images/ilus-2.png') }}" class="w-100 img-fluid" alt="Our Story Image">
            </div>

            <div class="col-12 col-md-8">
                <h5 class="mb-3">
                    Boemisora is located on a hill, on the north side of the mountains, 
                    with a view to the southwest of Rawa Pening.
                </h5>
                @for ($i = 0; $i < 4; $i++)
                <p>
                    We carry a “farming” theme which can be seen from the entrance area up to the activities inside.
                    Boemisore pampers visitors with a comfortable place to stay along with a sophisticated architecture and the
                    serenity of nature that spoils your senses. We also have “Bala Boemi” which are local people around the site
                    while you are there.
                </p>
                <br>
                @endfor
               
            </div> --}}






            {{--  --}}

            <div class="col-12 col-md-12">
                <h1 class="mb-3">Our Story</h1>
            </div>
            <div class="col-12 mb-4">
                <img src="{{ asset('images/our-story.png') }}" class="w-100 img-fluid" alt="Our Story Image">
            </div>

            <div class="col-12 col-md-6">
                <h5 class="mb-2">
                    Experience the never-before experienced in Boemisora!
                    {{-- Boemisora is located on a hill, on the north side of the mountains,
                    with a view to the southwest of Rawa Pening. --}}
                </h5>
                <p class="mb-3">
                    {{-- <span class="font-weight-bold text-underline">Boemisora</span> is located on the slope of Merbabu
                    mountain in middle of beautiful village known as
                    ‘Polobogo’. It’s perfectly situated on a hill that flanked by 2 rivers (Gopak & Parat) with a
                    crystal-clear view to the southwest side of Rawa Pening. At just <span
                        class="font-weight-bold text-underline">20 mins </span>drive from Salatiga, this
                    is an ideal getaway to spend the day-off. As you get here, you can feel the authentic forest
                    atmosphere consist of various type of trees including woods and fruit trees. --}}Boemisora is located on the slope of Merbabu mountain, right in the middle of a
                    beautiful village known as <span class="font-weight-bold"> ‘Polobogo’ </span>. It’s perfectly
                    situated on a hill that is flanked by two
                    rivers (Gopak & Parat) with a crystal-clear view to the southwest side of Rawa Pening. At just
                    <span class="font-weight-bold">20 minutes drive from Salatiga</span>, it is an ideal getaway to
                    spend a day off.
                </p>
                {{-- To provide an authentic experience of <span class="font-weight-bold text-underline">blending with nature</span> --}}
                {{-- We want to share to the community and make the better environment for living. --}}
                {{-- As we mention before, Boemisora is not only a place, but we want you to make a  memorable moment with nature. --}}

                {{-- <p class="mb-3">We establish an <span
                        class="font-weight-bold text-underline">Agroforestry</span> farming concept where
                    the existing trees are managed together with crops and livestocks to make a sustainable
                    environtment.
                </p> --}}
            </div>
            <div class="col-12 col-md-6">
                {{-- <p class="mb-3">
                    We will have an Ecopark in our masterplan, it is a leisure park with several farming models that
                    would be great for you and your family to spend time with. We will have a restaurant to fulfill your
                    appetite, edible garden, green house for a modern urban farming, ‘Tabulampot’ garden, farm animals,
                    playground and picnic area. Those all facilities are provided to give you a new experience about
                    living coexist with nature. But we have to say sorry that it’s still on progress and we are hoping
                    to see you soon.</p> --}}
                {{-- <p class="mb-3">Here is the good news for you who wants to get to know Boemisora in the first
                    place. We have Bale
                    Camp & Vila for you to recharge your energy and keep your sanity. Spend your time here with fun and
                    thrill activities or just relax and enjoy the forest serenity, you decide.</p> --}}
                <p class="mt-4 mb-3">By the time you arrive, you will be greeted by the alluring <span
                        class="font-weight-bold">forest atmosphere </span>filled with an abundant variety of fruit trees
                    and greeneries. We establish an <span class="font-weight-bold">agroforestry farming </span> concept where
                        existing trees are maintained and cared for together with crops and livestocks to create a
                        sustainable environment.</p>
            </div>
            <div class="col-12 col-md-12 text-center mt-4">
                <h3 onclick="goToBale()" class="mb-3 font-weight-bold pointer-event"
                    style="color:#ffb74b;cursor: pointer;">Are you ready to make a joyful escape plan with us? <br>
                    Well, we’ll be waiting for you here in Boemisora!</h3>
            </div>
        </div>
    </div>
</section>

<script>
    const goToBale = () => {
        window.location.href = 'bale'
    }
</script>
