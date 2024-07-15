<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Boemisora</title>
    <link rel="stylesheet" href="css/simplebar.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/feather.css">
    <link rel="stylesheet" href="css/app-light.css" id="lightTheme">
</head>

<body class="light">
    <div class="wrapper vh-100" style="overflow:hidden" id="login-form">
        <div class="row align-items-center h-100">
            <form method="POST" class="col-lg-3 col-md-4 col-10 mx-auto text-center" action="{{ route('login') }}">
                @csrf
                <a class="navbar-brand mx-auto my-2 flex-fill text-center">
                    <img class="navbar-brand-img brand-md" style="width: 12rem;"
                        src="{{ asset('admin/assets/images/logo.png') }}" alt="">
                </a>
                <div class="form-group mt-3">
                    <label for="inputUsername" class="sr-only">Email</label>
                    <input type="text" id="username"
                        class="form-control form-control-lg @error('username') is-invalid @enderror" name="username"
                        value="{{ old('username') }}" placeholder="Username" required="" autofocus=""
                        autocomplete="username">
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-0">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="password" name="password"
                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                        placeholder="Password" required="" autocomplete="current-password">

                    <i id="icon-show-password" class="fe fe-eye fe-24 text-black"
                        style="position: relative; top : -35px;left: 130px;display: none;cursor: pointer;"
                        onclick="showPassword('show')"></i>
                    <i id="icon-not-show-password" class="fe fe-eye-off fe-24 text-black"
                        style="position: relative; top : -35px;left: 130px;cursor: pointer;"
                        onclick="showPassword('close')"></i>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-0" style="position: relative; top: -15px">
                    <label onclick="changePage('forget-password')" for="changePass" style="cursor: pointer!important;"
                        class="text-danger float-lg-right pointer">Forget
                        Password</label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>

                <p class="my-3 text-muted">Sertikomlis© 2023</p>
            </form>
        </div>
    </div>
    {{-- Form Forget Password --}}
    <div class="wrapper vh-100" style="display:none;overflow:hidden" id="forget-password-form">
        <div class="row align-items-center h-100">
            <form method="POST" class="col-lg-3 col-md-4 col-10 mx-auto text-center card"
                action="{{ route('login') }}">
                @csrf
                <div class="card-title float-left pt-3 mb-0">
                    <h5 onclick="changePage('login')" class="float-left font-weight-bold pointer"
                        style="cursor: pointer!important;"> <i class="fe fe-arrow-left"></i>Forget Password</h5>
                </div>
                <div class="card-body pt-0">
                    <a class="navbar-brand mx-auto my-2 flex-fill text-center">
                        <img class="navbar-brand-img brand-md" style="width: 12rem;"
                            src="{{ asset('admin/assets/images/logo.png') }}" alt="">
                    </a>
                    <div class="form-group mt-3">
                        <label for="inputEmail" class="float-left">Email</label>
                        <input type="text" id="email_fp" class="form-control " name="email" value=""
                            placeholder="Enter your Email" required="" autofocus="" autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <p class="">The email you enter must be the email registered in the system</p>
                    <button id="btn-send-email-password" class="btn btn-lg btn-primary btn-block" type="button"
                        onclick="changePage('password-send')">Send</button>
                </div>


            </form>
        </div>
    </div>
    {{-- End Form Forget Password --}}
    <div class="wrapper vh-100" style="display:none;overflow:hidden" id="password-send-form">
        <div class="row align-items-center h-100">
            <div class="col-lg-3 col-md-4 col-10 mx-auto text-center card">

                <a class="navbar-brand mx-auto my-2 flex-fill text-center">
                    <img class="navbar-brand-img brand-md" style="width: 12rem;"
                        src="{{ asset('admin/assets/images/logo.png') }}" alt="">
                </a>
                <p class="">Please check your email, to proceed to the next step</p>
                <p class="">sent to <span class="font-weight-bold" id="email-text-target"></span> </p>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });

        function changePage(type) {
            if (type == 'forget-password') {
                $("#login-form").hide();
                $("#forget-password-form").show();
            } else if (type == 'login') {
                $("#forget-password-form").hide();
                $("#login-form").show();
            } else if (type == 'password-send') {
                if ($("#email_fp").val() == "") {
                    alert('Please Require Email Address');
                    return;
                }

                $("#btn-send-email-password").attr('disabled', true)
                var loadingAnimate =
                    '<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading.....';
                $("#btn-send-email-password").html(loadingAnimate);
                // AJAX SEND TO EMAIL
                $.ajax({
                    type: "post",
                    url: "/admin/authorization/forget-password",
                    data: {
                        email: $("#email_fp").val()
                    },
                    dataType: "json",
                    success: function(response) {
                        $("#btn-send-email-password").html('Send');
                        $("#btn-send-email-password").removeAttr('disabled');

                        if (response.status == '400') {
                            alert(`${response.message}`)
                            return;
                        }

                        alert(`${response.message}`)

                        $("#forget-password-form").hide();
                        $("#password-send-form").show();
                        $("#email-text-target").text($("#email_fp").val())
                    },
                    error: function(err) {

                        let err_log = err.responseJSON.message;
                        createLogError(`Forget Password Send Email`,
                            `/admin/authorization/forget-password`, 'POST',
                            `FORGET-PASSWORD`, 'FORGET PASSWORD', `email=${$("#email_fp").val()}`, err_log)

                        console.log(err)
                    }
                });

            }
        }

        function showPassword(type) {
            const inputPass = document.getElementById("password");
            if (type == 'show') {
                $("#icon-show-password").hide()
                $("#icon-not-show-password").show()
                inputPass.type = "password";
            } else {
                $("#icon-show-password").show()
                $("#icon-not-show-password").hide()
                inputPass.type = "text";
            }
        }
    </script>
</body>

</html>
