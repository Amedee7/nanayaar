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


    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed">
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-10">
                <div class="w-lg-500px bg-body shadow-sm p-7 p-lg-10 mx-auto text-center">
                    <a href="{{route('login')}}" class="mb-12">
                        <span class="badge badge-light-primary font-bold fs-3x">NANA YAAR</span>
                    </a>
                </div>
    
                <div class="w-lg-500px bg-body shadow-sm p-7 p-lg-10 mx-auto">
                    <form class="form w-100" method="POST" novalidate="novalidate" id="kt_sign_in_form" action="{{route('login')}}">
                        @csrf
                        <div class="fv-row mb-10">
                            <label class="form-label fs-6 fw-bolder text-dark">Adresse email</label>
                            <input placeholder="Adresse email" required class="form-control form-control-lg form-control @error('email') is-invalid @enderror" type="email" value="{{ old('email') }}" name="email" autocomplete="email" />
                        </div>
                        <div class="fv-row mb-10">
                            <div class="d-flex flex-stack mb-2">
                                <label class="form-label fw-bolder text-dark fs-6 mb-0">Mot de passe</label>
                            </div>
                            <input placeholder="Mot de passe" class="form-control form-control-lg form-control" type="password" required name="password" autocomplete="off" />
                        </div>
                        <div class="text-center">
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                <span class="indicator-label"><i class="fa fa-fingerprint"></i> Connexion</span>
                            </button>
                        </div>
    
                    </form>
                    @if ($errors->any())
                        <div  style="text-align:center;color:#f00000;" role="alert">
                            @foreach ($errors->all() as $error)
                                <strong>{{ $error }}</strong>
                            @endforeach
                        </div>
                    @endif
                    <div class="text-center mt-4">
                        <span class="text-muted text-hover-primary px-2 text-bold"><a href="mailto:balbonewahabou@gmail.com">UniDev</a> 2022© - Tout droits reservés</span>
                    </div>
                </div>
            </div>
        </div>
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
