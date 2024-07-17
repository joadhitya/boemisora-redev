<!-- Section Banner -->
<section class="section banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 px-0">
                <img src="{{ asset('images/banner-contact.jpg') }}" class="w-100 img-fluid" alt="Banner Image">
            </div>
        </div>
    </div>
</section>

<!-- Section Contact -->
<section class="section contact-us">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-0 mb-5 mb-md-0">
                <h2 class="mb-4" data-aos="fade-in" data-aos-easing="ease-in-sine">Feel Free to <br /> <span>Contact Us</span></h2>

                <ul class="mb-5">
                    <li>
                        <a href="https://www.google.com/maps/place/Boemisora/@-7.351881,110.452257,16z/data=!4m5!3m4!1s0x0:0x55fa57c7d7665f2e!8m2!3d-7.3518814!4d110.4522573?hl=en" target="_blank">
                            <i class="fa fa-map-marked-alt mr-2"></i>
                            Dusun Polobogo, Polobogo <br/>
                            Getasan, Kabupaten Semarang <br/>
                            Indonesia 50774
                        </a>
                    </li>
                    <li>
                        <a href="mailto:hi@boemisora.com" target="_blank">
                            <i class="fa fa-envelope mr-2"></i>
                            hi@boemisora.com
                        </a>
                    </li>
                    <li>
                        <a href="https://wa.me/6282135527500?text=Halo%20saya%20ingin%20menanyakan%20" target="_blank">
                            <i class="fa fa-phone mr-2"></i>
                            +62 821-3552-7500
                        </a>
                    </li>
                </ul>

                <a href="https://www.google.com/maps/place/Boemisora/@-7.351881,110.452257,16z/data=!4m5!3m4!1s0x0:0x55fa57c7d7665f2e!8m2!3d-7.3518814!4d110.4522573?hl=en" class="btn btn--primary-outlined" target="_blank">
                    <i class="fa fa-map-marker-alt mr-3"></i>
                    Get Direction
                </a>
            </div>

            <div class="col-12 col-md-6 offset-md-0">
                <form action="javascript:void(0)" id="form-contact-us" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="fullName">Full Name <span>(Required)</span></label>
                                <input type="text" class="form-control" id="fullName" name="fullName"
                                    placeholder="Full Name" autocomplete required>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="emailAddress">Email <span>(Required)</span></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                    autocomplete required>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="phoneNumber">Phone Number <span>(Required)</span></label>
                                <input type="number" class="form-control" id="phoneNumber" name="phoneNumber"
                                    placeholder="Phone Number" autocomplete required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="subject">Subject <span>(Required)</span></label>
                                <input type="text" class="form-control" id="subject" name="subject"
                                    placeholder="Subject" autocomplete required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <button class="btn btn--primary-outlined" type="button" onclick="submitContactUs()"><i
                                    class="fa fa-paper-plane mr-3"></i>Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@push('page-scripts')
<script>
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });

    function submitContactUs() {
        var formData = $(`#form-contact-us`).serialize();
        console.log(formData)
        $.ajax({
            url: `/function-contact-us`,
            type: "post",
            data: formData,
            dataType: "json",
            success: function (response) {
                console.log(response)

            },
            error: function (err) {
                console.log(err);
                let err_log = err.responseJSON.errors;
            }
        });
    }

    // $(`#form-contact-us`).submit(function (e) {
    //     e.preventDefault();
    //     var formData = new FormData(this);
    //     // var formData = $(`#form-contact-us`).serialize();
    //     // console.log(formData)
    //     alert('test')
    //     $.ajax({
    //         url: `/function-contact-us`,
    //         type: "post",
    //         data: formData,
    //         dataType: "json",
    //         cache: false,
    //         contentType: false,
    //         processData: false,
    //         success: async function (response) {
    //             await console.log(response)

    //         },
    //         error: async function (err) {
    //             console.log(err);
    //             let err_log = err.responseJSON.errors;
    //         }
    //     });
    // });

</script>
@endpush
