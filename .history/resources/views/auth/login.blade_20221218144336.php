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
                <div style="background-color: #00345f;" class="card-header justify-content-center">
                    <h1 class="text-white font-weight-bolder mt-5 mb-2 h1 text-uppercase text-center primary-color">
                        <u>PANNEAU D'ADMINISTRATION </u>
                    </h1>
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
                        <span class="text-muted text-hover-primary px-2 text-bold"><a href="mailto:amedeeouedraogo01@gmail.com">Creadev</a> 2022© - Tout droits reservés</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var HOST_URL = "/metronic/theme/html/tools/preview";
    </script>
    <script src="{{ asset('frontend/plugins/global/plugins.bundle.js?v=7.2.9') }}"></script>
    <script src="{{ asset('frontend/plugins/custom/prismjs/prismjs.bundle.js?v=7.2.9') }}"></script>
    <script src="{{ asset('frontend/js/scripts.bundle.js?v=7.2.9') }}"></script>
    <script src="{{ asset('custom/pace.min.js') }}"></script>
    @yield('js')
</body>

</html>
