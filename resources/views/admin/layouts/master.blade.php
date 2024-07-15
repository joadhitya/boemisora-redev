<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Boemisora</title>
    {{-- <title>@yield('title') - {{config('app.name')}}</title> --}}

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/simplebar.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/css/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/fullcalendar.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/uppy.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/jquery.steps.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/app-light.css') }}" id="lightTheme">
    <link rel="stylesheet" href="{{ asset('admin/css/app-dark.css') }}" id="darkTheme" disabled>
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet">

    <style>
        .append-select {
            width: 65px;
            border-top-left-radius: 0px;
            border-bottom-left-radius: 0px;
            padding-right: 0px;
        }

        .borad-right {
            border-top-right-radius: 0px;
            border-bottom-right-radius: 0px;
        }

        .padd-5 {
            padding-left: 5px !important;
            padding-right: 5px !important;
        }

        ::-webkit-scrollbar {
            width: 5px;
        }

        ::-webkit-scrollbar-track {
            background-color: #DEE2E6;
            -webkit-border-radius: 10px;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            -webkit-border-radius: 10px;
            border-radius: 10px;
            background: #001A4E;
        }
    </style>
    @stack('page-styles')
</head>


<body class="vertical light">
    <div class="wrapper">
        @include('admin.layouts.header')
        @include('admin.layouts.sidebar')
        <main role="main" class="main-content py-1">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        @include('admin.layouts.breadcrumb')
                        <div class="mb-2 align-items-center">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>

            {{-- Modal Side --}}
            <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog"
                aria-labelledby="defaultModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="list-group list-group-flush my-n3" id="list-notification">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" onclick="readAllNotification()" class="btn btn-secondary btn-block"
                                data-dismiss="modal">Read
                                All</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>



    @yield('modal')
    @stack('before-scripts')
    <!-- JAVA SCRIPT -->
    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/moment.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/simplebar.min.js') }}"></script>
    <script src='{{ asset('admin/js/daterangepicker.js') }}'></script>
    <script src='{{ asset('admin/js/jquery.stickOnScroll.js') }}'></script>
    <script src="{{ asset('admin/js/tinycolor-min.js') }}"></script>
    <script src="{{ asset('admin/js/d3.min.js') }}"></script>
    <script src="{{ asset('admin/js/topojson.min.js') }}"></script>
    <script src="{{ asset('admin/js/datamaps.all.min.js') }}"></script>
    <script src="{{ asset('admin/js/datamaps-zoomto.js') }}"></script>
    <script src="{{ asset('admin/js/datamaps.custom.js') }}"></script>
    <script src="{{ asset('admin/js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/js/gauge.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.sparkline.min.js') }}"></script>
    <script src='{{ asset('admin/js/jquery.mask.min.js') }}'></script>
    <script src='{{ asset('admin/js/select2.min.js') }}'></script>
    <script src='{{ asset('admin/js/jquery.steps.min.js') }}'></script>
    <script src='{{ asset('admin/js/jquery.validate.min.js') }}'></script>
    <script src='{{ asset('admin/js/jquery.timepicker.js') }}'></script>
    <script src='{{ asset('admin/js/dropzone.min.js') }}'></script>
    <script src='{{ asset('admin/js/uppy.min.js') }}'></script>
    <script src='{{ asset('admin/js/quill.min.js') }}'></script>

    <script src='{{ asset('admin/js/jquery.dataTables.min.js') }}'></script>
    <script src='{{ asset('admin/js/dataTables.bootstrap4.min.js') }}'></script>

    {{-- EXPORT TO EXCELL --}}
    <script src="{{ asset('admin/datatables.net-bs/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/datatables.net-bs/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/datatables.net-bs/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin/datatables.net-bs/js/jszip.min.js') }}"></script>
    <script src="{{ asset('admin/datatables.net-bs/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/datatables.net-bs/js/vfs_fonts.js') }}"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        $('.select2').select2({
            theme: 'bootstrap4',
        });
        $('.select2-multi').select2({
            multiple: true,
            theme: 'bootstrap4',
        });
        $('.drgpicker').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            showDropdowns: true,
            locale: {
                format: 'MM/DD/YYYY'
            }
        });
        $('.time-input').timepicker({
            'scrollDefault': 'now',
            'zindex': '9999' /* fix modal open */
        });
        /** date range picker */
        if ($('.datetimes').length) {
            $('.datetimes').daterangepicker({
                timePicker: true,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(32, 'hour'),
                locale: {
                    format: 'M/DD hh:mm A'
                }
            });
        }
        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(end.format('MMMM D, YYYY'));
        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month')
                    .endOf('month')
                ]
            }
        }, cb);
        cb(start, end);
        $('.input-placeholder').mask("00/00/0000", {
            placeholder: "__/__/____"
        });
        $('.input-zip').mask('00000-000', {
            placeholder: "____-___"
        });
        $('.input-money').mask("#.##0,00", {
            reverse: true
        });
        $('.input-phoneus').mask('(000) 000-0000');
        $('.input-mixed').mask('AAA 000-S0S');
        // $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
        //     translation: {
        //         'Z': {
        //             pattern: /[0-9]/,
        //             optional: true
        //         }
        //     }
        // });
        $('.money').mask("000.000.000.000", {
            reverse: true
        });
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <script>
        var uptarg = document.getElementById('drag-drop-area');
        if (uptarg) {
            var uppy = Uppy.Core().use(Uppy.Dashboard, {
                inline: true,
                target: uptarg,
                proudlyDisplayPoweredByUppy: false,
                theme: 'dark',
                width: 770,
                height: 210,
                plugins: ['Webcam']
            }).use(Uppy.Tus, {
                endpoint: 'https://master.tus.io/files/'
            });
            uppy.on('admin/complete', (result) => {
                console.log('Upload complete! We’ve uploaded these files:', result.successful)
            });
        }
    </script>
    <script src="{{ asset('admin/js/apps.js') }}"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('admin/js', new Date());
        gtag('admin/config', 'UA-56159088-1');
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js">
    </script>

    <script src="{{ asset('admin/js/fullcalendar.js') }}"></script>

    <script src="{{ asset('admin/js/fullcalendar.custom.js') }}"></script>


    <script src="{{ asset('script/admin/general.js') }}"></script>

    <script>
        fnBrowserDetect()

        function fnBrowserDetect() {
            let userAgent = navigator.userAgent;
            let browserName;
            if (userAgent.match(/chrome|chromium|crios/i)) {
                browserName = "chrome";
            } else if (userAgent.match(/firefox|fxios/i)) {
                browserName = "firefox";
            } else if (userAgent.match(/safari/i)) {
                browserName = "safari";
            } else if (userAgent.match(/opr\//i)) {
                browserName = "opera";
            } else if (userAgent.match(/edg/i)) {
                browserName = "edge";
            } else {
                browserName = "No browser detection";
            }
            if (browserName == 'firefox') {
                Swal.fire({
                    icon: 'info',
                    title: 'Browser Validation',
                    html: 'Please use another <span class="text-primary">Web Browser</span> except <span class="text-danger">Firefox</span> because several input form not supported yet.',
                })
            }
        }
    </script>

    <!-- include FilePond library -->
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>

    <!-- include FilePond plugins -->
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>

    <!-- include FilePond jQuery adapter -->
    <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>


    @stack('page-scripts')
    @stack('after-scripts')

</body>
