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
    {{-- Form Forget Password --}}
    <div class="wrapper vh-100" style="overflow:hidden" id="submit-forgot-passcode-form">
        <div class="row align-items-center h-100">
            <form method="POST" class="col-lg-3 col-md-4 col-10 mx-auto text-center card"
                action="{{ route('login') }}">
                @csrf
                <div class="card-title float-left pt-3 mb-0">
                    <h5 onclick="changePage('login')" class="float-left font-weight-bold pointer"
                        style="cursor: pointer!important;">Submit Token Forgot Password
                    </h5>
                </div>
                <div class="card-body pt-0">
                    <a class="navbar-brand mx-auto my-2 flex-fill text-center">
                        <img class="navbar-brand-img brand-md" style="width: 12rem;"
                            src="{{ asset('admin/assets/images/logo.png') }}" alt="">
                    </a>
                    <div class="form-group mt-3">
                        <label for="inputEmail" class="float-left">Email</label>
                        <input type="text" id="email" class="form-control " name="email" value=""
                            placeholder="Enter your Email" required="" autofocus="" autocomplete="Email">
                    </div>
                    <div class="form-group mt-3">
                        <label for="inputEmail" class="float-left">Forgot Password Token</label>
                        <input type="text" id="forgot_passcode" class="form-control " name="forgot_passcode"
                            value="" placeholder="Enter your Forgot Password Token" required="" autofocus=""
                            autocomplete="Token">
                    </div>
                    <p class="">Please insert forgot password token from email, that we've sent before.
                    </p>
                    <button id="btn-send-email-password" class="btn btn-lg btn-primary btn-block" type="button"
                        onclick="submitToken()">Submit Token</button>
                </div>

                <p class="my-3 text-muted">Sertikomlis© 2023</p>

            </form>
        </div>
    </div>

    {{-- Form Forget Password --}}
    <div class="wrapper vh-100" style="display:none;overflow:hidden" id="create-new-password-form">
        <div class="row align-items-center h-100">
            <form method="POST" class="col-lg-3 col-md-4 col-10 mx-auto text-center card"
                action="{{ route('login') }}">
                @csrf
                <div class="card-title float-left pt-3 mb-0">
                    <h5 onclick="changePage('login')" class="float-left font-weight-bold pointer"
                        style="cursor: pointer!important;">Create a New Password</h5>
                </div>
                <div class="card-body pt-0">
                    <a class="navbar-brand mx-auto my-2 flex-fill text-center">
                        <img class="navbar-brand-img brand-md" style="width: 12rem;"
                            src="{{ asset('admin/assets/images/logo.png') }}" alt="">
                    </a>
                    <div class="form-group mt-3">
                        <label for="inputEmail" class="float-left">New Password</label>
                        <input type="password" id="new_password" class="form-control " name="new_password"
                            value="" placeholder="Enter your new password" required="" autofocus=""
                            autocomplete="new_password">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="form-group mt-3">
                        <label for="inputEmail" class="float-left">Confirm New Password</label>
                        <input type="password" id="confirm_new_password" class="form-control "
                            name="confirm_new_password" value="" placeholder="Confirm your new password"
                            required="" autofocus="" autocomplete="confirm_new_password">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button id="btn_submit_reset_password" class="btn btn-lg btn-primary btn-block" type="button"
                        onclick="submitResetPassword()">Submit Reset Password</button>
                </div>

                <p class="my-3 text-muted">Sertikomlis© 2021</p>

            </form>
        </div>
    </div>
    {{-- End Form Forget Password --}}

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
                        // console.log(response);
                        // return;

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
                        console.log(err)
                    }
                });

            }
        }

        function showPassword(type) {
            if (type == 'show') {
                $("#icon-show-password").hide()
                $("#icon-not-show-password").show()
            } else {
                $("#icon-show-password").show()
                $("#icon-not-show-password").hide()
            }
        }

        function submitToken() {
            const email = $("#email").val();
            const token = $("#forgot_passcode").val();
            console.log(email, token)

            if (email && token) {
                $.ajax({
                    type: "post",
                    url: "/admin/authorization/check-token",
                    data: {
                        email,
                        token
                    },
                    dataType: "json",
                    success: function(response) {

                        if (response.status == '400') {
                            alert(`${response.message}`)
                            return;
                        }

                        $("#submit-forgot-passcode-form").hide();
                        $("#create-new-password-form").show();

                    },
                    error: function(err) {
                        console.log(err)
                    }
                });
            } else {
                alert('Please Fill the Email and Token !');
            }

        }

        function submitResetPassword() {
            const email = $("#email").val();
            const token = $("#forgot_passcode").val();
            const newPassword = $("#new_password").val();
            const confirmNewPassword = $("#confirm_new_password").val();
            var lowArray = [];
            var upArray = [];

            if (newPassword === confirmNewPassword) {
                const checkPassword = strengthResult(confirmNewPassword);
                console.log('checkPassword : ', checkPassword)

                if (checkPassword.success) {
                    $.ajax({
                        type: "post",
                        url: "/admin/authorization/reset-password",
                        data: {
                            email,
                            token,
                            newPassword
                        },
                        dataType: "json",
                        success: function(response) {
                            alert(response.message);
                            window.location.assign("http://127.0.0.1:8000/admin/login");

                            if (response.status == '400') {
                                alert(`${response.message}`)
                                return;
                            }
                        },
                        error: function(err) {
                            console.log(err)
                        }
                    });

                } else {
                    alert(checkPassword.message)
                }
            } else {
                alert('Please make sure the new password and confirm new password is matched')
            }

        }

        function strengthResult(p) {
            if (p.length < 6 || p.length > 18) {
                return {
                    success: false,
                    message: 'Passwords must be 6-18 characters'
                };
            }

            var strength = checkStrength(p);

            if (strength > 50 && strength <= 100) {
                return {
                    success: true
                };
            } else {
                return {
                    success: false,
                    message: 'Password is Weak, Please add any combination with capital and number on your password.'
                };
            }
            // switch(true) {
            // case strength<=30:
            //     return 'Password "'+p+'" ('+strength+') is Very Weak';
            //     break;
            // case strength>30 && strength<=35:
            //     return 'Password "'+p+'" ('+strength+') is Weak';
            //     break;
            // case strength>35 && strength<=50:
            //     return 'Password "'+p+'" ('+strength+') is below Average';
            //     break;
            // case strength>50 && strength<=60:
            //     return 'Password "'+p+'" ('+strength+') is almost Good';
            //     break;
            // case strength>60 && strength<=70:
            //     return 'Password "'+p+'" ('+strength+') is Good';
            //     break;
            // case strength>70 && strength<=80:
            //     return 'Password "'+p+'" ('+strength+') is Very Good';
            //     break;
            // case strength>80 && strength<=90:
            //     return 'Password "'+p+'" ('+strength+') is Strong';
            //     break;
            // case strength>90 && strength<=100:
            //     return 'Password "'+p+'" ('+strength+') is Very Strong';
            //     break;
            //     default:
            //     return 'Error';
            // }
        }

        function strengthMap(w, arr) {
            var c = 0;
            var sum = 0;
            newArray = arr.map(function(i) {
                i = c;
                //sum += w-2*i;
                sum += w;
                c++;
                return sum;
            });
            return newArray[c - 1];
        }

        function checkStrength(p) {
            var weight;
            var extra;
            let dgtArray = [];
            let upArray = [];
            switch (true) {
                case p.length < 6:
                    return false;
                    break;
                case p.length > 18:
                    return false;
                    break;
                case p.length >= 6 && p.length <= 10:
                    weight = 7;
                    extra = 4;
                    break;
                case p.length > 10 && p.length <= 14:
                    weight = 6;
                    extra = 3;
                    break;
                case p.length > 14 && p.length <= 18:
                    weight = 5;
                    extra = 2.5;
                    break;
            }
            allDigits = p.replace(/\D+/g, '');
            allLower = p.replace(/[^a-z]/g, '');
            allUpper = p.replace(/[^A-Z]/g, '');
            allSpecial = p.replace(/[^\W]/g, '');
            if (allDigits && typeof allDigits !== 'undefined') {
                dgtArray = Array.from(new Set(allDigits.split('')));
                dgtStrength = strengthMap(weight, dgtArray);
            } else {
                dgtStrength = 0;
            }
            if (allLower && typeof allLower !== 'undefined') {
                lowArray = Array.from(new Set(allLower.split('')));
                lowStrength = strengthMap(weight, lowArray);
            } else {
                lowStrength = 0;
            }
            if (allUpper && typeof allUpper !== 'undefined') {
                upArray = Array.from(new Set(allUpper.split('')));
                upStrength = strengthMap(weight, upArray);
            } else {
                upStrength = 0;
            }
            if (allSpecial && typeof allSpecial !== 'undefined') {
                splArray = Array.from(new Set(allSpecial.split('')));
                splStrength = strengthMap(weight, splArray);
            } else {
                splStrength = 0;
            }
            strength = dgtStrength + lowStrength + upStrength + splStrength;
            if (dgtArray.length > 0) {
                strength = strength + extra;
            }
            if (splStrength.length > 0) {
                strength = strength + extra;
            }
            if (p.length >= 6) {
                strength = strength + extra;
            }
            if (lowArray.length > 0 && upArray.length > 0) {
                strength = strength + extra;
            }
            return strength;
        }
    </script>
</body>

</html>
