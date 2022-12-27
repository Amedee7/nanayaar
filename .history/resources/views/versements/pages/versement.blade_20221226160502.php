@extends('layouts.app')
@section('title', 'Administration - Liste des versements')
@section('content')


    <div class="d-flex flex-column-fluid">
        <div class="container col-md-12">
            <div class="card card-custom">
                <!--begin::Card header-->
                <div class="card card-custom card-stretch gutter-b">
                    <div class="d-flex align-items-center mb-9 bg-light-warning rounded p-5">
                        <!--begin::Icon-->
                        <span class="svg-icon svg-icon-warning mr-5">
                            <span class="svg-icon svg-icon-lg">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                            fill="#000000" />
                                        <rect fill="#000000" opacity="0.3"
                                            transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) "
                                            x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span> </span>
                        <!--end::Icon-->

                        <!--begin::Title-->
                        <div class="d-flex flex-column flex-grow-1 mr-2">
                            <h2 class="mb-1">Gestion des clients</h2>
                            <div class="text-muted fw-bolder">
                                Effectuée par: <a href="#">{{ Auth::user()->lastname }}
                                    {{ Auth::user()->firstname }}</a>
                            </div>
                        </div>
                        <!--end::Title-->
                    </div>
                </div>
                <!--end::Card header-->
                <div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-6"
                    style="background-size: auto calc(100% + 10rem); background-position-x: 100%; background-image: url('{{ asset('assets/media/illustrations/sketchy-1/4.png') }}')">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <!--begin::Icon-->
                            <div class="symbol symbol-circle me-5">
                                <div class="symbol-label bg-transparent text-primary border border-secondary border-dashed">
                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs020.svg-->
                                    <span class="svg-icon svg-icon-2x svg-icon-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path
                                                    d="M4.875,20.75 C4.63541667,20.75 4.39583333,20.6541667 4.20416667,20.4625 L2.2875,18.5458333 C1.90416667,18.1625 1.90416667,17.5875 2.2875,17.2041667 C2.67083333,16.8208333 3.29375,16.8208333 3.62916667,17.2041667 L4.875,18.45 L8.0375,15.2875 C8.42083333,14.9041667 8.99583333,14.9041667 9.37916667,15.2875 C9.7625,15.6708333 9.7625,16.2458333 9.37916667,16.6291667 L5.54583333,20.4625 C5.35416667,20.6541667 5.11458333,20.75 4.875,20.75 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                <path
                                                    d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z"
                                                    fill="#000000"></path>
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="pulse-ring"></span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end::Icon-->
                            <!--begin::Title-->
                            <div class="d-flex flex-column">
                                <h2 class="mb-1">Gestion des versements</h2>
                                <div class="text-muted fw-bolder">
                                    Effectuée par: <span class="badge badge-light-primary">{{ Auth::user()->lastname }}
                                        {{ Auth::user()->firstname }}</span>
                                    <span class="mx-3">|</span>
                                    <a href="{{ route('versements.index') }}">Retour à la liste</a>
                                </div>
                            </div>
                            <!--end::Title-->
                        </div>
                    </div>
                </div>
                <!--begin::Page Layout-->
                <div class="d-flex flex-row">
                    <!--begin::Layout-->
                    <div class="flex-row-fluid ml-lg-8 mr-5">
                        <!--begin::Card-->
                        <div class="card card-custom card-stretch gutter-b">
                            <div class="card-body">

                                <!--begin::Engage Widget 15-->
                                <div class="card card-custom mb-12">
                                    <div class="card-body rounded p-0 d-flex " style="background-color:#DAF0FD;">
                                        <div class="flex-lg-row-fluid mb-4 mb-lg-0 me-lg-7 me-xl-10">
                                            <div class="card">
                                                <div class="card-body p-6">
                                                    <div
                                                        class="d-flex flex-column align-items-start justify-content-between flex-xxl-row">
                                                        <div
                                                            class="d-flex align-items-center flex-equal fw-row me-4 order-2">
                                                            <div class="fs-6 fw-bolder text-gray-700 text-nowrap">Date de
                                                                création: {{ $versement->created_at }}</div>
                                                        </div>
                                                        <div
                                                            class="d-flex align-items-center justify-content-end flex-equal order-3 fw-row">
                                                            <div class="fs-1x fw-bolder text-gray-700 text-nowrap">
                                                                <span
                                                                    class="label font-size-h5 m-1 label-light-success label-inline">Operation
                                                                    de versement</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="separator separator-dashed my-10"></div>
                                                    <div class="mb-0">
                                                        <table
                                                            class="table align-middle table-row-dashed fs-6 fw-bold gy-4 dataTable no-footer table-responsive"
                                                            id="kt_subscription_products_table">
                                                            <thead>
                                                                <tr
                                                                    class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                                                    <th class="min-w-250px sorting_disabled"
                                                                        style="width: 200px;">N VERSEMENT</th>
                                                                    <th class="min-w-100px sorting_disabled">SOMME</th>
                                                                    <th class="min-w-150px sorting_disabled"
                                                                        style="width: 150px;">M. TOTAL</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="text-gray-600">
                                                                @foreach ($versements as $item)
                                                                    <tr class="even">
                                                                        <td><a
                                                                                class="text-muted fw-bolder text-hover-primary mb-1 fs-6">{{ $item->identifiant_versement }}</a>
                                                                        </td>
                                                                        <td><span
                                                                                class=" badge badge-light-success fw-bolder fs-6">{{ number_format($item->somme_verse, 0, '.', ' ') }}
                                                                                Fcfa</span></td>
                                                                        <td><span
                                                                                class=" badge badge-light-success fw-bolder fs-6">{{ number_format($item->montant_octroye, 0, '.', ' ') }}
                                                                                Fcfa</span></td>
                                                                        <td class="text-end">
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                @if ($versement->state == 'En cours')
                                                    <div class="card-footer p-6">
                                                        <button
                                                            onclick="editRecord('{{ route('versements.modify.add', $id) }}')"
                                                            class="btn btn-primary btn-sm"><i class="fas fa-undo"></i>
                                                            Modifier la somme pour un renouvelement</button>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Engage Widget 15-->
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Layout-->

                    <!--begin::Aside-->
                    <div class="flex-column offcanvas-mobile w-300px w-xl-325px" id="kt_profile_aside">
                        <!--begin::Forms Widget 13-->
                        <div class="card card-custom gutter-b">
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column mb-3">
                                    <span class="card-label font-size-h3 font-weight-bolder text-dark">Client
                                        concerné</span>
                                </h3>
                            </div>
                            <!--begin::Body-->
                            <div class="card-body pt-4">
                                <!--begin::Item-->
                                <div class="d-flex mb-8">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-50 symbol-2by3 flex-shrink-0 mr-4">
                                        <div class="d-flex flex-column">
                                            <div class="symbol-label mb-3">
                                                <span class="symbol-label bg-light-primary">
                                                    <span class="svg-icon svg-icon-2x svg-icon-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <path opacity="0.3"
                                                                d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"
                                                                fill="black"></path>
                                                            <path
                                                                d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"
                                                                fill="black"></path>
                                                        </svg>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                        <a href="#"
                                            class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg mb-2">
                                            {{ $versement->full_name_client }}
                                        </a>
                                        <span class="text-muted font-weight-bold font-size-sm mb-3">
                                            Téléphone 1: <span
                                                class="text-dark-75 font-weight-bolder">{{ $versement->numero_telephone1_client }}</span>
                                        </span>
                                        <span class="text-muted font-weight-bold font-size-sm mb-3">
                                            Téléphone 2: <span
                                                class="text-dark-75 font-weight-bolder">{{ $versement->numero_telephone2_client }}</span>
                                        </span>

                                        <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                            <a href="#"
                                                class=" label label-light-success label-inline text-dark-75 font-weight-bolder text-hover-primary font-size-lg mb-2">
                                                {{ $versement->identifiant_versement }}
                                            </a>
                                        </div>
                                    </div>


                                    <!--end::Title-->
                                </div>
                                <!--end::Item-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Forms Widget 13-->
                        <!--begin::List Widget 21-->
                        <div class="card card-custom gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column mb-5">
                                    <span class="card-label font-weight-bolder text-dark mb-1">Montant Octroyé</span>
                                </h3>
                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div class="card-body pt-2">
                                <div class="row">
                                    <div class="col">
                                        <div class="border border-5 border-primary flex-center  min-w-175px my-3 p-6">
                                            <span
                                                class="font-size-h3 font-weight-boldest d-flex justify-content-center">{{ number_format($versement->montant_octroye, 0, '.', ' ') }}
                                                Fcfa</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::List Widget 21-->
                    </div>
                    <!--end::Aside-->
                </div>
                <!--end::Page Layout-->

                 @if ($versement->state == 'En cours')
        <div class="card">
            <div class="card-footer d-flex justify-content-end py-6">
                <a onclick="cancelRecordConfirm('{{ route('versements.cancel', $versement->id) }}')"
                    class="btn btn-danger btn-active-light-danger mr-2">Annuler le versement</a>
                <button id="senderX" onclick="versementClose('{{ route('versements.termine', $versement->id) }}')"
                    class="btn btn-primary">
                    <strong>
                        <b id="text-load" class="text-hide">Veuillez patienter...</b>
                        <b id="text-fix"><span class="flaticon-file-1 mr-2"></span> Effectuer un versement</b>
                    </strong>
                </button>
            </div>
        </div>
    @endif
    <div id="o2d-modal-container"></div>
    <form>
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    </form>
            </div>
        </div>
    </div>

   

@endsection
@section('js')
    <script src="{{ asset('assets/script.js') }}"></script>
    <script type="text/javascript"></script>
@endsection
