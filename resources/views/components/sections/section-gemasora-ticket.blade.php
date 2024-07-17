<!-- Section Contact -->
<!-- Section Gemasora -->
<section class="section gemasora">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <img src="{{ asset('images/layout-gemasora.jpg') }}" class="w-100 img-fluid" alt="layout">
            </div>
        </div>
    </div>
</section>
<section class="section contact-us">
    <div class="container">
        <div class="row">

            <div class="col-12 col-md-12 offset-md-0">

                <h2 class="mb-4" data-aos="fade-in" data-aos-easing="ease-in-sine">Please full fill data <br />
                    <span>For
                        Booking</span>
                </h2>
                <hr>
                <form action="javascript:void(0)" id="form-gemasora" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="fullName">Nama Lengkap <span>(Required)</span></label>
                                <input type="text" class="form-control" id="fullName" name="fullName"
                                    placeholder="Full Name" autocomplete required>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="emailAddress">Email <span>(Required)</span></label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Email" autocomplete required>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="phoneNumber">No. Telepon <span>(Required)</span></label>
                                <input type="number" class="form-control" id="phoneNumber" name="phoneNumber"
                                    placeholder="Phone Number" autocomplete required>
                            </div>
                        </div>
                        <div class="col-4 col-sm-4">
                            <div class="form-group">
                                <style>
                                    select {

                                        font-size: 0.85rem !important;
                                        font-weight: 500 !important;
                                        color: #111 !important;
                                        border: none !important;
                                        border-radius: 0 !important;
                                        border-bottom: 1px solid #988259 !important;
                                        padding: 10px 0 !important;
                                        background-color: transparent !important;
                                        width: 100% !important;

                                    }
                                </style>
                                <label for="subject">Ticket <span>(Required)</span></label><br>
                                <select name="typeTicket" id="typeTicket" onchange="chooseTicket()">
                                    <option value="">--Choose--</option>
                                    <option value="SORA A">SORA A</option>
                                    <option value="SORA B">SORA B</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4 col-sm-4">
                            <div class="form-group">
                                <label for="qty">Quantity<span>(Required)</span></label>
                                <input type="number" class="form-control" id="qty" name="qty"
                                    onchange="chooseTicket()" placeholder="Quantity" autocomplete required>
                            </div>
                        </div>
                        <div class="col-4 col-sm-4">
                            <div class="form-group">
                                <label for="totalPrice">Harga Tiket <span>(Required)</span></label>
                                <input type="text" class="form-control" style="font-weigth:bold" id="ticketPrice"
                                    name="ticketPrice" placeholder="Total Price" autocomplete readonly>
                                <input type="hidden" class="form-control" style="font-weigth:bold" id="totalPrice"
                                    name="totalPrice" placeholder="Total Price" autocomplete readonly>
                            </div>
                        </div>

                        <div class="col-12">

                            <h5
                                style="color: #195637;
                            text-transform: unset;"class="mt-2">
                                Pembayaran tiket melalui transfer ke <br>
                                BANK BCA 0132008777 a/n PT Rapelo Tuju Tujuh
                                <br>
                                <span style="color:#988259;">Nominal Transfer : <span id="price-ticket"></span></span>
                                {{-- <span style="color:#988259;">PT Rapelo Tuju Tujuh</span> --}}
                            </h5>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="upload">Upload bukti transfer (max. 2mb) <span>(Required)</span></label>
                                <input type="file" class="form-control" id="upload" name="upload"
                                    placeholder="Subject" autocomplete required>
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <button class="btn btn--primary-outlined" type="submit" onclick="submitGemasora()"><i
                                    class="fa fa-paper-plane mr-3"></i>Submit</button>
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

        function chooseTicket() {
            var typeTicket = $("#typeTicket").val();
            var qty = $("#qty").val();
            $("#price-ticket").text('')
            if (qty > 4) {
                $("#qty").val(0);
                $("#totalPrice").val(`0`);
                alert('Maximal 1 ticket 4 person')
            }
            var price = 0;
            var totalPrice = 0;

            if (typeTicket == "SORA A") {
                price = 250000;
                $("#ticketPrice").val(`Rp. 250.000`)
            } else if (typeTicket == "SORA B") {
                price = 150000;
                $("#ticketPrice").val(`Rp. 150.000`)
            } else {
                price = 0;
            }

            totalPrice = price * qty
            $("#totalPrice").val(`Rp. ${totalPrice}`)
            $("#price-ticket").text(`Rp. ${totalPrice}`)
        }

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
                        window.location.href = "http://127.0.0.1:8000/gemasora-success";
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
