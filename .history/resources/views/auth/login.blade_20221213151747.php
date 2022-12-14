<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>NANA YAAR</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('css/font.css') }}" />
    <link href="{{ asset('plugins/global/plugins.bundle.css?v=7.2.9') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/custom/prismjs/prismjs.bundle.css?v=7.2.9') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.bundle.css?v=7.2.9') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('custom/flash.css') }}">
    <link rel="shortcut icon" href="{{ asset('frontend/media/logos/favicon.ico') }}" />
    <style>
        .card {
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .16), 0 2px 10px 0 rgba(0, 0, 0, .12) !important;
            font-weight: 400;
        }
    </style>
</head>

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">


    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-4 wizard d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Content-->
            <div
                class="login-container order-2 order-lg-1 d-flex flex-center flex-row-fluid px-7 pt-lg-0 pb-lg-0 pt-4 pb-6 bg-white">
                <!--begin::Wrapper-->
                <div class="login-content d-flex flex-column pt-lg-0 pt-12">
                    <!--begin::Logo-->
                    <a href="#" class="login-logo pb-xl-20 pb-15">
                        <img src="assets/media/logos/logo-4.png" class="max-h-70px" alt="" />
                    </a>
                    <!--end::Logo-->

                    <!--begin::Signin-->
                    <div class="login-form">
                        <!--begin::Form-->
                        <form method="POST" action="{{ route('login') }}" class="form" id="kt_login_singin_form">
                            @csrf
                            <!--begin::Title-->
                            <div class="pb-5 pb-lg-15">
                                <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Se connecter</h3>
                                <div class="text-muted font-weight-bold font-size-h4">
                                    Vous etes nouveau?
                                    <a href="#"
                                        class="text-primary font-weight-bolder">Creer un compte</a>
                                </div>
                            </div>
                            <!--begin::Title-->
                            @if (Session::has('message'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('message') }}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div style="text-align:center;color:#f00000;" role="alert">
                                    @foreach ($errors->all() as $error)
                                        <strong>{{ $error }}</strong>
                                    @endforeach
                                </div>
                            @endif
                            <!--begin::Form group-->
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Votre Email</label>
                                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0"
                                    type="email"
                                    class="form-control form-control-lg @error('msisdn') is-invalid @enderror"
                                    placeholder="Adresse email" name="email" value="{{ old('email') }}" required
                                    autocomplete="email" autofocus autocomplete="off" />
                            </div>
                            <!--end::Form group-->

                            <!--begin::Form group-->
                            <div class="form-group">
                                <div class="d-flex justify-content-between mt-n5">
                                    <label class="font-size-h6 font-weight-bolder text-dark pt-5">Mot de passe</label>

                                </div>
                                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0"
                                    id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Mot de passe" name="password" required autofocus autocomplete="off" />
                            </div>
                            <!--end::Form group-->

                            <!--begin::Action-->
                            <div class="pb-lg-0 pb-5">
                                <button type="submit" id="kt_login_singin_form_submit_button"
                                    class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Connexion</button>
                                <button type="button"
                                    class="btn btn-light-primary font-weight-bolder px-8 py-4 my-3 font-size-lg">
                                    <span class="svg-icon svg-icon-md">
                                        
                                    </span> Mot de passe oublier
                                </button>
                            </div>
                            <!--end::Action-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Signin-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--begin::Content-->

            <!--begin::Aside-->
    <div class="login-aside order-1 order-lg-2 bgi-no-repeat bgi-position-x-right">
        <div class="login-conteiner bgi-no-repeat bgi-position-x-right bgi-position-y-bottom" style="background-image: url(custom/illustrations/login-visual-4.svg);">
            p   
        </div>

        <!--begin::Aside title-->
        <h3 class="pt-lg-40 pl-lg-20 pb-lg-0 pl-10 p-20 m-0 d-flex justify-content-lg-start font-weight-boldest display5 display1-lg text-primary">
            N A N A<br/>
            Y A A R<br/>
            2022
        </h3>
        <!--end::Aside title-->
    </div>
    <!--end::Aside-->
        </div>
        <!--end::Login-->
    </div>
    <!--end::Main-->
    </div>

    <div id="kt_scrolltop" class="scrolltop">
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <rect fill="#000000" opacity="0.3" x="11" y="10" width="2"
                        height="10" rx="1" />
                    <path
                        d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                        fill="#000000" fill-rule="nonzero" />
                </g>
            </svg>
        </span>
    </div>



    <script>
        var HOST_URL = "/metronic/theme/html/tools/preview";
    </script>
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1200
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#0BB783",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#F3F6F9",
                        "dark": "#212121"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#D7F9EF",
                        "secondary": "#ECF0F3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#212121",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#ECF0F3",
                    "gray-300": "#E5EAEE",
                    "gray-400": "#D6D6E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#80808F",
                    "gray-700": "#464E5F",
                    "gray-800": "#1B283F",
                    "gray-900": "#212121"
                }
            },
            "font-family": "Poppins"
        };
    </script>
    <script src="{{ asset('frontend/plugins/global/plugins.bundle.js?v=7.2.9') }}"></script>
    <script src="{{ asset('frontend/plugins/custom/prismjs/prismjs.bundle.js?v=7.2.9') }}"></script>
    <script src="{{ asset('frontend/js/scripts.bundle.js?v=7.2.9') }}"></script>
    <script src="{{ asset('custom/pace.min.js') }}"></script>
    @yield('js')
</body>

</html>
