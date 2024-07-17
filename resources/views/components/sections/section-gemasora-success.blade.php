<section class="section contact-us">
    <div class="container">
        <div class="row">

            <div class="col-12 col-md-12 offset-md-0">

                <h2 class="mb-4" data-aos="fade-in" data-aos-easing="ease-in-sine">Terimakasih telah memilih terlibat di Gemasora.  <br />
                    <span style="font-size:14px">Pembelian tiket akan segera kami proses. Kode booking akan dikirimkan ke email setelah verifikasi maksimal 2x24 jam. </span> <br>
                    <span style="font-size:14px">Sampai jumpa di Boemisora</span>
                </h2>
                



                <hr>

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


        function submitGemasora() {

            $(`#form-gemasora`).submit(function(e) {
                $(`#add-gemasora`).attr("disabled", true);
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: `/function-gemasora`,
                    type: "post",
                    data: formData,
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response)
                        // await successResponse(
                        //     "add",
                        //     data,
                        //     response.message,
                        //     response.data.id
                        // );
                        $(`#form-gemasora`).unbind("submit");
                        alert(response.message)
                        window.location.reload();
                    },
                    error: function(err) {
                        $(`#form-gemasora`).unbind("submit");
                        console.log(err);
                        let err_log = err.responseJSON.errors;
                    }
                });
            });
        }
    </script>
@endpush
