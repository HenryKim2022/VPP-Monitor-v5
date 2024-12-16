@php
    $page = Session::get('page');
    $page_title = $page['page_title'];
@endphp

<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-layout="dark-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description"
        content="Project Monitor is super flexible, powerful, clean &amp; modern responsive bootstrap 4 website with unlimited possibilities.">
    <meta name="keywords" content="Projects, Progress, Monitors">
    <meta name="author" content="PT. VERTECH PERDANA">
    <title>{{ $page_title }}</title>
    <link rel="apple-touch-icon" href="{{ asset('public/assets/logo/favicon.ico') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/assets/logo/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/theme/vuexy/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/theme/vuexy/app-assets/vendors/css/extensions/toastr.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/theme/vuexy/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/theme/vuexy/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/theme/vuexy/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/theme/vuexy/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/theme/vuexy/app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/theme/vuexy/app-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/theme/vuexy/app-assets/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/theme/vuexy/app-assets/css/core/menu/menu-types/horizontal-menu.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/theme/vuexy/app-assets/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/theme/vuexy/app-assets/css/pages/page-auth.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/theme/vuexy/app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/theme/vuexy/assets/css/style.css') }}">
    <!-- END: Custom CSS-->

    <!-- BEGIN: ADD LACKS PY -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/assets/css/dev.general.custom.css') }}?v={{ time() }}">
    <!-- END: ADD LACKS PY -->

    <!-- BEGIN: CHROME & FIREFOX HTML CUSTOM SCROLLBAR -->
    <style>
        /* For WebKit browsers (Chrome, Safari) */
        html::-webkit-scrollbar {
            width: 0;
            /* Hide scrollbar */
            height: 0;
            /* Hide horizontal scrollbar */
            display: none;
        }

        /* Show scrollbar when hovering over the scrollbar area */
        html:hover::-webkit-scrollbar {
            width: 8px;
            /* Width of the scrollbar */
            height: 12px;
            /* Height of the scrollbar */
            display: inline;
        }

        /* Scrollbar track styles */
        html::-webkit-scrollbar-track {
            background: #f8f9fa;
            /* Default background of the scrollbar track */
            border-radius: 10px;
            /* Rounded corners for track */
        }

        /* Scrollbar thumb styles */
        html::-webkit-scrollbar-thumb {
            background-color: #6c757d;
            /* Color of the scrollbar thumb */
            border-radius: 10px;
            /* Rounded corners for the thumb */
        }

        html::-webkit-scrollbar-thumb:hover {
            background-color: #6E6B7B;
            /* Darker grey on hover */
        }

        /* For Firefox */
        html.light-layout {
            scrollbar-width: thin;
            /* Make scrollbar thin */
            scrollbar-color: #6c757d transparent;
            /* Thumb color and track color */
        }

        /* For Firefox */
        html.dark-layout {
            scrollbar-width: thin;
            /* Make scrollbar thin */
            scrollbar-color: #6c757d transparent;
            /* Thumb color and track color */
        }

        /* Show scrollbar color when hovering over the track */
        html:hover {
            scrollbar-color: #6c757d transparent;
            /* Thumb color and track color on hover */
        }
    </style>
    <!-- END: CHROME & FIREFOX HTML CUSTOM SCROLLBAR -->


    <!-- BEGIN: CUSTOM PRELOADER-->
    <style>
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* background: rgba(255, 255, 255, 0.9); */
            /* Light background */
            z-index: 99999;
            /* Ensure it covers everything */
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 1;
            /* Initial opacity */
            transition: opacity 0.8 ease;
            /* Transition for fade effect */
        }

        .dark-layout #preloader {
            background: rgba(23, 30, 49, 1);
        }

        .light-layout #preloader {
            background: rgba(246, 246, 246, 1);
        }

        .loader {
            border: 8px solid #f3f3f3;
            /* Light grey */
            border-top: 8px solid var(--primary);
            /* Blue */
            border-radius: 50%;
            width: 112px;
            height: 112px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .loader-logo-container {
            position: absolute;
            /* Position it in the center */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .loader-logo-container img {
            width: 100px;
            height: auto;
        }

        body.no-scroll {
            overflow: hidden !important;
            /* Prevents scrolling */
        }
    </style>
    <!-- BEGIN: CUSTOM PRELOADER -->


    <!-- BEGIN: Fontawesome v5.15.4 CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/assets/fa.pro@5.15.4.web/css/all.css') }}?v={{ time() }}">
    <!-- END: Fontawesome v5.15.4 CSS-->


</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu blank-page navbar-floating footer-static  " data-open="hover"
    data-menu="horizontal-menu" data-col="blank-page">
    <div id="preloader">
        <div class="loader">
        </div>
        <div class="loader-logo-container d-flex col-3">
            <img src="{{ asset('public/assets/logo/vp_logo.svg') }}" alt="Project MonitorLogo">
        </div>
    </div>
    <script>
        function hidePreloader() {
            const preloader = document.getElementById('preloader');
            setTimeout(() => {
                preloader.style.display = 'none';
                document.body.classList.remove('no-scroll');
            }, 1000); // 2000ms = 2 seconds
        }
        document.body.classList.add('no-scroll'); // Add no-scroll class when preloader is shown
        window.onload = function() {
            hidePreloader();
        };
    </script>


    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v2">
                    <div class="auth-inner row m-0">
                        <a class="brand-logo d-flex align-items-center justify-content-start"
                            href="{{ env('APP_URL') }}">
                            <img src="{{ asset('public/assets/logo/vp_logo.svg') }}" alt="Project MonitorLogo"
                                style="width: fit-content; height: 35px;">
                            <h2 class="brand-text text-primary ml-1 mb-0">{{ $site_name }}</h2>
                        </a>


                        <!-- /Brand logo-->
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img
                                    class="img-fluid"
                                    src="{{ asset('public/theme/vuexy/app-assets/images/pages/login-v2-dark.svg') }}"
                                    alt="Login V2" /></div>
                        </div>
                        <!-- /Left Text-->
                        <!-- Login-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h4 class="card-title font-weight-bold mb-1 text-center">Reset Password</h4>
                                <p class="card-text mb-2 text-center">We've already sent a password reset link. Please check your email inbox or spam folder.</p>
                                <p class="text-center mt-2"><a href="{{ route('reset.page') }}"><i data-feather="chevron-left"></i> Retry</a></p>
                                <p class="text-center mt-2"><a href="{{ route('login.page') }}"><i data-feather="chevron-left"></i> Back to login</a></p>





                            </div>
                        </div>
                        <!-- /Login-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('public/theme/vuexy/app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('public/theme/vuexy/app-assets/vendors/js/ui/jquery.sticky.js') }}"></script>
    <script src="{{ asset('public/theme/vuexy/app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('public/theme/vuexy/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('public/theme/vuexy/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('public/theme/vuexy/app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    {{-- <script src="{{ asset('public/theme/vuexy/app-assets/js/scripts/pages/page-auth-login.js') }}"></script> --}}
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>




    <!-- BEGIN: Toast CustomJS Bundle's--> @include('v_res.toasts.v_toast_js_bundle') <!-- END: Toast CustomJS Bundle's-->


    {{-- ////////////////////////////////////////////////////////////////////// TOAST //////////////////////////////////////////////////////////////////////  --}}
    {{-- TOAST:  VALIDATION ERROR/FAILED --}}
    {{-- @if ($errors->any())
        @php
            $errorMessages = $errors->all();
        @endphp

        @foreach ($errorMessages as $index => $message)
            @if ($index == 0)
                <input type="hidden" class="error-message" data-delay="{{ ($index + 1) * 0 }}"
                    value="{{ $message }}">
            @else
                <input type="hidden" class="error-message" data-delay="{{ ($index + 1) * 1000 }}"
                    value="{{ $message }}">
            @endif
        @endforeach
    @endif
    <script>
        $(document).ready(function() {
            @if ($errors->any())
                @php
                    $errorMessages = $errors->all();
                @endphp

                @foreach ($errorMessages as $index => $message)
                    var toastErrorMsg_{{ $index }} = "{{ $message }}";
                    var delay_{{ $index }};
                    @if ($index == 1)
                        delay_{{ $index }} = {{ ($index + 1) * 0 }};
                    @else
                        delay_{{ $index }} = {{ ($index + 1) * 1000 }};
                    @endif

                    setTimeout(function() {
                        toastr.error(toastErrorMsg_{{ $index }}, '', {
                            closeButton: false,
                            debug: false,
                            newestOnTop: false,
                            progressBar: true,
                            positionClass: 'toast-top-right',
                            preventDuplicates: false,
                            onclick: null,
                            showDuration: '300',
                            hideDuration: '1000',
                            timeOut: '5000',
                            extendedTimeOut: '1000',
                            showEasing: 'swing',
                            hideEasing: 'linear',
                            showMethod: 'fadeIn',
                            hideMethod: 'fadeOut'
                        });
                    }, delay_{{ $index }});
                @endforeach
            @endif
        });
    </script> --}}


    {{-- TOAST: SUCCESS --}}
    {{-- @if (Session::has('success'))
        @foreach (Session::get('success') as $index => $message)
            @if ($index == 1)
                <input type="hidden" class="success-message" data-delay="{{ ($index + 1) * 0 }}"
                    value="{{ $message }}">
            @else
                <input type="hidden" class="success-message" data-delay="{{ ($index + 1) * 1000 }}"
                    value="{{ $message }}">
            @endif
        @endforeach
    @endif
    <script>
        $(document).ready(function() {
            @if (Session::has('success'))
                @foreach (Session::get('success') as $index => $message)
                    var toastSuccessMsg_{{ $index }} = "{{ $message }}";
                    var delay_{{ $index }};
                    @if ($index == 1)
                        delay_{{ $index }} = {{ ($index + 1) * 0 }};
                    @else
                        delay_{{ $index }} = {{ ($index + 1) * 1000 }};
                    @endif

                    setTimeout(function() {
                        toastr.success(toastSuccessMsg_{{ $index }}, '', {
                            closeButton: false,
                            debug: false,
                            newestOnTop: false,
                            progressBar: true,
                            positionClass: 'toast-top-right',
                            preventDuplicates: false,
                            onclick: null,
                            showDuration: '300',
                            hideDuration: '1000',
                            timeOut: '5000',
                            extendedTimeOut: '1000',
                            showEasing: 'swing',
                            hideEasing: 'linear',
                            showMethod: 'fadeIn',
                            hideMethod: 'fadeOut'
                        });
                    }, delay_{{ $index }});
                @endforeach
            @endif
        });
    </script> --}}


    {{-- TOAST: NORMAL ERROR MESSAGE --}}
    {{-- @if (Session::has('n_errors'))
        @foreach (Session::get('n_errors') as $index => $message)
            @if ($index == 1)
                <input type="hidden" class="n-error-message" data-delay="{{ ($index + 1) * 0 }}"
                    value="{{ $message }}">
            @else
                <input type="hidden" class="n-error-message" data-delay="{{ ($index + 1) * 1000 }}"
                    value="{{ $message }}">
            @endif
        @endforeach
    @endif
    <script>
        $(document).ready(function() {
            @if (Session::has('n_errors'))
                @foreach (Session::get('n_errors') as $index => $message)
                    var toastNErrorMsg_{{ $index }} = "{{ $message }}";
                    var delay_{{ $index }};
                    @if ($index == 1)
                        delay_{{ $index }} = {{ ($index + 1) * 0 }};
                    @else
                        delay_{{ $index }} = {{ ($index + 1) * 1000 }};
                    @endif

                    setTimeout(function() {
                        toastr.error(toastNErrorMsg_{{ $index }}, '', {
                            closeButton: false,
                            debug: false,
                            newestOnTop: false,
                            progressBar: true,
                            positionClass: 'toast-top-right',
                            preventDuplicates: false,
                            onclick: null,
                            showDuration: '300',
                            hideDuration: '1000',
                            timeOut: '5000',
                            extendedTimeOut: '1000',
                            showEasing: 'swing',
                            hideEasing: 'linear',
                            showMethod: 'fadeIn',
                            hideMethod: 'fadeOut'
                        });
                    }, delay_{{ $index }});
                @endforeach
            @endif
        });
    </script> --}}


    {{-- TOAST: AUTH ERROR MESSAGE --}}
    {{-- @if (Session::has('auth_errors'))
        @foreach (Session::get('auth_errors') as $index => $message)
            @if ($index == 1)
                <input type="hidden" class="n-error-message" data-delay="{{ ($index + 1) * 0 }}"
                    value="{{ $message }}">
            @else
                <input type="hidden" class="n-error-message" data-delay="{{ ($index + 1) * 1000 }}"
                    value="{{ $message }}">
            @endif
        @endforeach
    @endif
    <script>
        $(document).ready(function() {
            @if (Session::has('auth_errors'))
                @foreach (Session::get('auth_errors') as $index => $message)
                    var toastNErrorMsg_{{ $index }} = "{{ $message }}";
                    var delay_{{ $index }};
                    @if ($index == 1)
                        delay_{{ $index }} = {{ ($index + 1) * 0 }};
                    @else
                        delay_{{ $index }} = {{ ($index + 1) * 1000 }};
                    @endif

                    setTimeout(function() {
                        toastr.error(toastNErrorMsg_{{ $index }}, '', {
                            closeButton: false,
                            debug: false,
                            newestOnTop: false,
                            progressBar: true,
                            positionClass: 'toast-top-right',
                            preventDuplicates: false,
                            onclick: null,
                            showDuration: '300',
                            hideDuration: '1000',
                            timeOut: '5000',
                            extendedTimeOut: '1000',
                            showEasing: 'swing',
                            hideEasing: 'linear',
                            showMethod: 'fadeIn',
                            hideMethod: 'fadeOut'
                        });
                    }, delay_{{ $index }});
                @endforeach
            @endif
        });
    </script> --}}


    {{-- ////////////////////////////////////////////////////////////////////// ./TOAST //////////////////////////////////////////////////////////////////////  --}}




</body>
<!-- END: Body-->

</html>
