<!-- Section Banner -->
<section class="section banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 px-0">
                <img src="/storage/{{ $blog->blog_image }}" class="w-100 img-fluid" alt="Blog Banner Image">
            </div>
        </div>
    </div>
</section>

<!-- Section Blog Single -->
<section class="section blog-single">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 mb-5">
                <ul class="breadcrumb">
                    <li><a href="#">Blog List</a></li>
                    <li>{{ $blog->blog_name }}</li>
                </ul>
            </div>

            <div class="col-12 col-lg-10">
                <h1>{{ $blog->blog_headline }}</h1>
                <p class="date">{{ $blog->created_at }}</p>
                <div class="mt-5">
                    {!! $blog->blog_content !!}
                </div>
            </div>

            <div class="col-12">
                <div class="share__wrapper">
                    <p class="share__title">Share this blog :</p>
                    <ul class="share__list">
                        <li class="share__item">
                            <button class="share__link share__link--facebook">
                                <i class="fab fa-facebook-f"></i>
                                <span class="sr-only">Share on Facebook</span>
                            </button>
                        </li>
                        <li class="share__item">
                            <button class="share__link share__link--twitter">
                                <i class="fab fa-twitter"></i>
                                <span class="sr-only">Share on Twitter</span>
                            </button>
                        </li>
                        <li class="share__item">
                            <button class="share__link share__link--whatsapp">
                                <i class="fab fa-whatsapp"></i>
                                <span class="sr-only">Share on WhatsApp</span>
                            </button>
                        </li>
                        <li class="share__item">
                            <button class="share__link share__link--linkedin">
                                <i class="fab fa-linkedin-in"></i>
                                <span class="sr-only">Share on LinkedIn</span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Section Related Blog -->
<section class="section related">
    <div class="container">
        <div class="row mb-4 mb-md-5">
            <div class="col-12">
                <h3>Related Blogs</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="owl-carousel owl-theme" id="owl-carousel-2">
                    <div class="item">
                        <a href="#">
                            <div class="grid">
                                <figure class="effect-zoe">
                                    <img src="{{ asset('images/activities-6.jpg') }}" alt="Blog Thumbnail"/>
                                    <figcaption>
                                        <h5>Ut enim ad minim veniam, quis nostrud exercitation ullam consectetur adipiscing elit.</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                    </figcaption>			
                                </figure>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <div class="grid">
                                <figure class="effect-zoe">
                                    <img src="{{ asset('images/activities-1.jpg') }}" alt="Blog Thumbnail"/>
                                    <figcaption>
                                        <h5>Ut enim ad minim veniam, quis nostrud exercitation ullam consectetur adipiscing elit.</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                    </figcaption>			
                                </figure>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <div class="grid">
                                <figure class="effect-zoe">
                                    <img src="{{ asset('images/activities-2.jpg') }}" alt="Blog Thumbnail"/>
                                    <figcaption>
                                        <h5>Ut enim ad minim veniam, quis nostrud exercitation ullam consectetur adipiscing elit.</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                    </figcaption>			
                                </figure>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <div class="grid">
                                <figure class="effect-zoe">
                                    <img src="{{ asset('images/activities-3.jpg') }}" alt="Blog Thumbnail"/>
                                    <figcaption>
                                        <h5>Ut enim ad minim veniam, quis nostrud exercitation ullam consectetur adipiscing elit.</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                    </figcaption>			
                                </figure>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>