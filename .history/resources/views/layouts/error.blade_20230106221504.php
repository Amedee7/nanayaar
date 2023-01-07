<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Error-->
    <div class="error error-6 d-flex flex-row-fluid bgi-size-cover bgi-position-center"
        style="background-image: url(assets/media/error/bg6.jpg);">
        <!--begin::Content-->
        <div class="d-flex flex-column flex-row-fluid text-center">
            @isset($title)
                {{ $title }}
            @else
            <h1 class="error-title font-weight-boldest text-white mb-12" style="margin-top: 12rem;">Oops... erreur {{ $errorCode }}</h1>
            @endisset
            
            <p class="display-4 font-weight-bold text-white">
                Page invalide.</br>
                Reconnectez-vouz à nouveau @if ($homeLink ?? false)
                    <a href="{{ url('/') }}"
                        class="font-bold underline transition duration-300 hover:text-blue-600">Connexion</a>
                @endif
            </p>
        </div>
        <!--end::Content-->
    </div>
    <!--end::Error-->
</div>
<!--end::Main-->
