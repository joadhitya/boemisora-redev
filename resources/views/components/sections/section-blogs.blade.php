<!-- Section Banner -->
<section class="section banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 px-0">
                <img src="{{ asset('images/banner-blog.jpg') }}" class="w-100 img-fluid" alt="Banner Image">
            </div>
        </div>
    </div>
</section>

<!-- Section Blogs -->
<section class="section blogs">
    <div class="container">
        <div class="row mb-5 mb-md-7">
            <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3 text-center">
                <h1 class="mb-4">Our Blogs</h1>
                {{-- <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore.
                </p> --}}
            </div>
        </div>

        <div class="row">
            @forelse ($blogs as $blog)
            <div class="col-12 col-md-6 col-lg-4">                
                {{-- {{ route('blog-single') }} --}}
                <a href="{{ url('blog-single/'.$blog->blog_slug) }}">
                    <div class="grid">
                        <figure class="effect-zoe">
                            <img src="/storage/{{ $blog->blog_image }}" alt="Blog Thumbnail" />
                            <figcaption>
                                <h5>{{ $blog->blog_headline }}</h5>
                                <p>{{ $blog->blog_short_description }}.</p>
                            </figcaption>
                        </figure>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-12 col-md-6 col-lg-12">
                <h5 class="text-center">There is no data Blog</h5>
            </div>
            @endforelse

            {{-- <div class="col-12 col-md-6 col-lg-4">
                <a href="{{ route('blog-single') }}">
            <div class="grid">
                <figure class="effect-zoe">
                    <img src="{{ asset('images/activities-3.jpg') }}" alt="Blog Thumbnail" />
                    <figcaption>
                        <h5>Ut enim ad minim veniam, quis nostrud exercitation ullam consectetur adipiscing elit.</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore.</p>
                    </figcaption>
                </figure>
            </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <a href="{{ route('blog-single') }}">
                <div class="grid">
                    <figure class="effect-zoe">
                        <img src="{{ asset('images/activities-4.jpg') }}" alt="Blog Thumbnail" />
                        <figcaption>
                            <h5>Ut enim ad minim veniam, quis nostrud exercitation ullam consectetur adipiscing elit.
                            </h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore.</p>
                        </figcaption>
                    </figure>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <a href="{{ route('blog-single') }}">
                <div class="grid">
                    <figure class="effect-zoe">
                        <img src="{{ asset('images/activities-5.jpg') }}" alt="Blog Thumbnail" />
                        <figcaption>
                            <h5>Ut enim ad minim veniam, quis nostrud exercitation ullam consectetur adipiscing elit.
                            </h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore.</p>
                        </figcaption>
                    </figure>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <a href="{{ route('blog-single') }}">
                <div class="grid">
                    <figure class="effect-zoe">
                        <img src="{{ asset('images/activities-2.jpg') }}" alt="Blog Thumbnail" />
                        <figcaption>
                            <h5>Ut enim ad minim veniam, quis nostrud exercitation ullam consectetur adipiscing elit.
                            </h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore.</p>
                        </figcaption>
                    </figure>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <a href="{{ route('blog-single') }}">
                <div class="grid">
                    <figure class="effect-zoe">
                        <img src="{{ asset('images/activities-1.jpg') }}" alt="Blog Thumbnail" />
                        <figcaption>
                            <h5>Ut enim ad minim veniam, quis nostrud exercitation ullam consectetur adipiscing elit.
                            </h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore.</p>
                        </figcaption>
                    </figure>
                </div>
            </a>
        </div> --}}
    </div>
    </div>
</section>
