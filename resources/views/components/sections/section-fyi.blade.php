<!-- Section FYI -->
<section class="section fyi">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-7 first order-2 order-md-1"></div>

            <div class="col-12 col-md-6 col-lg-5 second order-1 order-md-2">
                <h2 class="mb-5">
                    For Your <br />
                    <span>Information</span>
                </h2>
                <ul class="mb-5">
                    <li>
                        <a href="" data-toggle="modal" data-target="#NewNormalModal">
                            {{-- <i class="fa fa-check mr-2"></i> --}}
                            New Normal Protocol
                        </a>
                    </li>
                    <li>
                        <a href="" data-toggle="modal" data-target="#TCModal">
                            {{-- <i class="fa fa-check mr-2"></i> --}}
                            Our Terms & Condition
                        </a>
                    </li>
                    <li>
                        <a href="" data-toggle="modal" data-target="#ListModal">
                            {{-- <i class="fa fa-check mr-2"></i> --}}
                            To-Bring List
                        </a>
                    </li>
                    {{-- <li>
                        <a href="" data-toggle="modal" data-target="#HouseRulesModal">
                            House Rules
                        </a>
                    </li> --}}
                </ul>
                {{-- <a href="{{ route('visit-information') }}" class="btn btn--primary">
                    <i class="fa fa-book-open mr-3"></i>
                    Read Details
                </a> --}}
            </div>
        </div>
    </div>
</section>



{{-- Modal Box --}}
<div class="modal fade" id="NewNormalModal" tabindex="-1" role="dialog" aria-labelledby="NewNormalModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>New Normal Protocol</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <style>
                #modal-text {
                    font-size: 12px !important;
                }

                #modal-text ul li {
                    font-size: 12px !important;
                }

            </style>
            <div class="modal-body" id="modal-text">
                <p style="color:#195637">
                    We are fully aware that covid-19 is living together with us now, therefore for the sake of each
                    other safety, we implement <span class="font-weight-bold"> health protocols </span>according to the
                    government policy
                </p>
                <br>
                <style>
                    #list-terms li{
                        font-size: 1rem!important;
                    }
                </style>
                <ul id="list-terms">
                    <li>
                        <i class="fa fa-check mr-2"></i>
                        We <b>limit the number of group </b>in one booking period
                    </li>
                    <li>
                        <i class="fa fa-check mr-2"></i>
                        All of our <b>staff </b> has been <b>vaccinated </b>
                    </li>
                    <li>
                        <i class="fa fa-check mr-2"></i>
                        <b>Wearing mask </b> is a must for all staff
                    </li>
                    <li>
                        <i class="fa fa-check mr-2"></i>
                        <b>Temperature checked </b>for all staff and guest on arrivals
                    </li>
                    <li>
                        <i class="fa fa-check mr-2"></i>
                        Tents & rooms are <b>desinfected </b> upon and after arrivals
                    </li>
                    <li>
                        <i class="fa fa-check mr-2"></i>
                        Make sure the <b>cleanliness of public facilities and amenities </b>, such as : towels, blankets,
                        and
                        sheets, for your pleasant rest.
                    </li>
                    <li>
                        <i class="fa fa-check mr-2"></i>
                        <b>Hand washing stations </b> and <b>garbage disposals </b>are provided in several points for
                        your convenience.
                    </li>
                </ul>

                <p style="color:#195637; font-weight: bold">Because guest and all staff safety are
                    our priority,  we only accept visitors with vaccine
                        certificates and encourage you to stay at home if you
                        don’t
                        feel well.
                    
                </p>

                {{-- <h5 class="text-center mb-4">COVID Protocol</h5> --}}

            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="TCModal" tabindex="-1" role="dialog" aria-labelledby="TCModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Our Terms & Condition</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- <h5 class="text-center mb-4">COVID Protocol</h5> --}}
                <style>
                    #term-condition li {
                        font-weight: 500;
                    }

                </style>
                <ul id="term-condition">
                    <li>
                        <i class="fa fa-check mr-2"></i>
                        We only accept reservations at least<span class="font-weight-bold"> two days </span>in advance
                        of arrival
                    </li>
                    <li>
                        <i class="fa fa-check mr-2"></i>
                        Our Balé Camp open for public <span class="font-weight-bold"> only on weekend</span>
                        (fri-Sat-Sun),
                        but if you want to make a
                        booking for
                        group event on weekday please contact us.
                    </li>
                    <li>
                        <i class="fa fa-check mr-2"></i>
                        We <span class="font-weight-bold">do not accept walk-in visitors </span>. If you need to do a
                        location survey, please let us
                        know in
                        advance
                    </li>
                    <li>
                        <i class="fa fa-check mr-2"></i>
                        Every reservation will be confirmed after completing <span class="font-weight-bold"> 50% of the
                            down payment </span>as a
                        non-refundable
                        deposit.
                    </li>
                    <li>
                        <i class="fa fa-check mr-2"></i>
                        Tent <span class="font-weight-bold"> Check In </span>Time: 13:00 WIB
                    </li>
                    <li>
                        <i class="fa fa-check mr-2"></i>
                        Tent <span class="font-weight-bold">Check Out </span> Time: 11:00 WIB
                    </li>
                    <li>
                        <i class="fa fa-check mr-2"></i>
                        Please <span class="font-weight-bold">confirm your arrival time </span>so we can prepare you a
                        special lunch (comes with an
                        additional
                        charge)
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="ListModal" tabindex="-1" role="dialog" aria-labelledby="ListModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>To-Bring List</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- <h5 class="text-center mb-4">COVID Protocol</h5> --}}
                <div class="row">
                    <div class="col-6 col-lg-4">
                        <div class="tile--bring-list mb-4">
                            <img src="{{ asset('images/01.png') }}" alt="Value Icon">
                            <h4 class="my-2">Pocket camera</h4>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4">
                        <div class="tile--bring-list mb-4">
                            <img src="{{ asset('images/02.png') }}" alt="Value Icon">
                            <h4 class="my-2">Jacket</h4>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4">
                        <div class="tile--bring-list mb-4">
                            <img src="{{ asset('images/03.png') }}" alt="Value Icon">
                            <h4 class="my-2">Comfortable clothes</h4>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4">
                        <div class="tile--bring-list mb-4">
                            <img src="{{ asset('images/04.png') }}" alt="Value Icon">
                            <h4 class="my-2">Hat</h4>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4">
                        <div class="tile--bring-list mb-4">
                            <img src="{{ asset('images/05.png') }}" alt="Value Icon">
                            <h4 class="my-2">Tumblr</h4>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4">
                        <div class="tile--bring-list mb-4">
                            <img src="{{ asset('images/06.png') }}" alt="Value Icon">
                            <h4 class="my-2">Personal medicine</h4>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4">
                        <div class="tile--bring-list mb-4">
                            <img src="{{ asset('images/07.png') }}" alt="Value Icon">
                            <h4 class="my-2">Hand sanitizer</h4>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4">
                        <div class="tile--bring-list mb-4">
                            <img src="{{ asset('images/08.png') }}" alt="Value Icon">
                            <h4 class="my-2">Mosquito repellent </h4>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4">
                        <div class="tile--bring-list mb-4">
                            <img src="{{ asset('images/09.png') }}" alt="Value Icon">
                            <h4 class="my-2">Shoes </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="HouseRulesModal" tabindex="-1" role="dialog" aria-labelledby="HouseRulesModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>House Rules</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- <h5 class="text-center mb-4">COVID Protocol</h5> --}}

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
</div>
