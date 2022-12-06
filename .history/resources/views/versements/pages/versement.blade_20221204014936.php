@extends('layouts.app')
@section('title', 'Stock - Liste des stocks')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div id="kt_header" style="" class="header align-items-stretch">
            <div class="header-brand">
                <a href="{{route('home')}}">
                    <h3 style="color: white;" class="text-center">GESTION DE CAVE</h3>
                </a>
                <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-minimize" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
                    <span class="svg-icon svg-icon-1 me-n1 minimize-default">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="8.5" y="11" width="12" height="2" rx="1" fill="black"></rect>
                            <path d="M10.3687 11.6927L12.1244 10.2297C12.5946 9.83785 12.6268 9.12683 12.194 8.69401C11.8043 8.3043 11.1784 8.28591 10.7664 8.65206L7.84084 11.2526C7.39332 11.6504 7.39332 12.3496 7.84084 12.7474L10.7664 15.3479C11.1784 15.7141 11.8043 15.6957 12.194 15.306C12.6268 14.8732 12.5946 14.1621 12.1244 13.7703L10.3687 12.3073C10.1768 12.1474 10.1768 11.8526 10.3687 11.6927Z" fill="black"></path>
                            <path opacity="0.5" d="M16 5V6C16 6.55228 15.5523 7 15 7C14.4477 7 14 6.55228 14 6C14 5.44772 13.5523 5 13 5H6C5.44771 5 5 5.44772 5 6V18C5 18.5523 5.44771 19 6 19H13C13.5523 19 14 18.5523 14 18C14 17.4477 14.4477 17 15 17C15.5523 17 16 17.4477 16 18V19C16 20.1046 15.1046 21 14 21H5C3.89543 21 3 20.1046 3 19V5C3 3.89543 3.89543 3 5 3H14C15.1046 3 16 3.89543 16 5Z" fill="black"></path>
                        </svg>
                    </span>
                    <span class="svg-icon svg-icon-1 minimize-active">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" width="12" height="2" rx="1" transform="matrix(-1 0 0 1 15.5 11)" fill="black"></rect>
                            <path d="M13.6313 11.6927L11.8756 10.2297C11.4054 9.83785 11.3732 9.12683 11.806 8.69401C12.1957 8.3043 12.8216 8.28591 13.2336 8.65206L16.1592 11.2526C16.6067 11.6504 16.6067 12.3496 16.1592 12.7474L13.2336 15.3479C12.8216 15.7141 12.1957 15.6957 11.806 15.306C11.3732 14.8732 11.4054 14.1621 11.8756 13.7703L13.6313 12.3073C13.8232 12.1474 13.8232 11.8526 13.6313 11.6927Z" fill="black"></path>
                            <path d="M8 5V6C8 6.55228 8.44772 7 9 7C9.55228 7 10 6.55228 10 6C10 5.44772 10.4477 5 11 5H18C18.5523 5 19 5.44772 19 6V18C19 18.5523 18.5523 19 18 19H11C10.4477 19 10 18.5523 10 18C10 17.4477 9.55228 17 9 17C8.44772 17 8 17.4477 8 18V19C8 20.1046 8.89543 21 10 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H10C8.89543 3 8 3.89543 8 5Z" fill="#C4C4C4"></path>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Aside minimize-->
                <!--begin::Aside toggle-->
                <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
                    <div class="btn btn-icon btn-active-color-primary w-30px h-30px" id="kt_aside_mobile_toggle">
                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black"></path>
                                <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                </div>
                <!--end::Aside toggle-->
            </div>
            <!--end::Brand-->
            <div class="toolbar">
                <!--begin::Toolbar-->
                <div class="container-fluid py-6 py-lg-0 d-flex flex-column flex-lg-row align-items-lg-stretch justify-content-lg-between">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column me-5">
                        <!--begin::Title-->
                        <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M20 21H3C2.4 21 2 20.6 2 20V10C2 9.4 2.4 9 3 9H20C20.6 9 21 9.4 21 10V20C21 20.6 20.6 21 20 21Z" fill="black"></path>
                                    <path d="M20 7H3C2.4 7 2 6.6 2 6V3C2 2.4 2.4 2 3 2H20C20.6 2 21 2.4 21 3V6C21 6.6 20.6 7 20 7Z" fill="black"></path>
                                </svg>
                                Sortie de stock
                            </span>
                        </h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="{{route('home')}}" class="text-muted text-hover-primary">Tableau de bord</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-200 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-dark">Sortie de stock</li>
                        </ul>
                    </div>
                    <div class="d-flex align-items-center overflow-auto pt-3 pt-lg-0">
                        <div class="d-flex align-items-center">
                            <span class="fs-7 text-gray-700 fw-bolder pe-3 d-none d-xxl-block">{{Auth::user()->lastname}} {{Auth::user()->firstname}}</span>
                            <div class="d-flex">
                                <a class="btn btn-sm btn-icon btn-icon-muted btn-active-icon-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z" fill="black"></path>
                                            <path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z" fill="black"></path>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class=" container-fluid">

                <div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-6" style="background-size: auto calc(100% + 10rem); background-position-x: 100%; background-image: url('{{asset('assets/media/illustrations/sketchy-1/4.png')}}')">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <!--begin::Icon-->
                            <div class="symbol symbol-circle me-5">
                                <div class="symbol-label bg-transparent text-primary border border-secondary border-dashed">
                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs020.svg-->
                                    <span class="svg-icon svg-icon-2x svg-icon-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M4.875,20.75 C4.63541667,20.75 4.39583333,20.6541667 4.20416667,20.4625 L2.2875,18.5458333 C1.90416667,18.1625 1.90416667,17.5875 2.2875,17.2041667 C2.67083333,16.8208333 3.29375,16.8208333 3.62916667,17.2041667 L4.875,18.45 L8.0375,15.2875 C8.42083333,14.9041667 8.99583333,14.9041667 9.37916667,15.2875 C9.7625,15.6708333 9.7625,16.2458333 9.37916667,16.6291667 L5.54583333,20.4625 C5.35416667,20.6541667 5.11458333,20.75 4.875,20.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                <path d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z" fill="#000000"></path>
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
                                <h2 class="mb-1">Sortie de stock</h2>
                                <div class="text-muted fw-bolder">
                                    Effectuée par: <span class="badge badge-light-primary">{{Auth::user()->lastname}} {{Auth::user()->firstname}}</span>
                                    <span class="mx-3">|</span>
                                    <a href="{{route('stocks.outer.index')}}">Retour à la liste</a>
                                </div>
                            </div>
                            <!--end::Title-->
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-column flex-lg-row">
                    <div class="flex-lg-row-fluid mb-4 mb-lg-0 me-lg-7 me-xl-10">
                        <div class="card">
                            <div class="card-body p-6">
                                <div class="d-flex flex-column align-items-start flex-xxl-row">
                                    <div class="d-flex align-items-center flex-equal fw-row me-4 order-2">
                                        <div class="fs-6 fw-bolder text-gray-700 text-nowrap">Date de création: {{\Illuminate\Support\Carbon::make($versement->created_at)->format('d/m/Y à H:i:s') }}</div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-end flex-equal order-3 fw-row">
                                        <div class="fs-1x fw-bolder text-gray-700 text-nowrap">
                                            <span class="badge fs-7 m-1 badge-light-success ">Sortie de stock</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <div class="mb-0">
                                    <table class="table align-middle table-row-dashed fs-6 fw-bold gy-4 dataTable no-footer table-responsive" id="kt_subscription_products_table">
                                        <thead>
                                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                                <th class="min-w-250px sorting_disabled" style="width: 200px;">PRODUIT</th>
                                                <th class="min-w-100px sorting_disabled" >QUANTITE</th>
                                                <th class="min-w-100px sorting_disabled" style="width: 100px;">P. UNITAIRE</th>
                                                <th class="min-w-150px sorting_disabled" style="width: 150px;">P. TOTAL</th>
                                                <th class="min-w-70px text-end sorting_disabled" style="width: 70px;">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-600">
                                            @foreach($productAdded as $item)
                                                <tr class="even">
                                                    <td><a class="text-muted fw-bolder text-hover-primary mb-1 fs-6">{{$item->name}}/{{$item->volume}}CL/{{$item->bottles}}T/PU:{{$item->price}}</a></td>
                                                    <td><div class="symbol symbol-40px symbol-circle mb-5">
                                                            <span class="symbol-label fs-1x fw-bold text-success bg-light-success">
                                                                <span class="pulse-ring"></span>
                                                                <strong>{{$item->objects}}</strong>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td><span class=" badge badge-light-success fw-bolder fs-6">{{number_format($item->amount_unique,0, '.',' ')}} F</span></td>
                                                    <td><span class=" badge badge-light-success fw-bolder fs-6">{{number_format($item->amount_total_product,0, '.',' ')}} F</span></td>
                                                    <td class="text-end">
                                                        <a onclick="outStockProductDelete('{{route('stocks.outer.delete.stock', $item->id)}}')" class="btn btn-sm btn-flex btn-light-danger "><strong>Supprimer</strong></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr><th colspan="5" class="text-end"><span class="fs-sm-3 fw-bolder">{{count($productAdded)}} Produit(s)</span></th></tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            @if($versement->state=='En cours')
                            <div class="card-footer p-6">
                                <button onclick="editRecord('{{route('versements.modify.add', $id)}}')" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Ajouter</button>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="flex-lg-auto min-w-lg-250px">
                        <div class="card" data-kt-sticky="true" data-kt-sticky-name="invoice" data-kt-sticky-offset="{default: false, lg: '200px'}"  style="">
                            <div class="card-header">
                                <div class="d-flex align-items-center flex-equal fw-row me-4 order-2" data-bs-toggle="tooltip" data-bs-trigger="hover" title="">
                                    <div class="fs-6 fw-bolder text-gray-700 text-nowrap">Client concerné</div>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <div class="mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light-primary">
                                                <span class="svg-icon svg-icon-2x svg-icon-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black"></path>
                                                        <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black"></path>
                                                    </svg>
                                                </span>
                                            </span>
                                        </div>
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$client->name}}</a>
                                            <span class="text-muted fw-bold text-muted d-block fs-7">
                                                <div class="min-w-125px pe-2">Téléphone: <span class="badge badge-light-primary fs-8 m-1">{{$client->first_phone}}</span></div>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card" data-kt-sticky="true" data-kt-sticky-name="invoice" data-kt-sticky-offset="{default: false, lg: '200px'}"  style="">
                            <!--begin::Card body-->
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="fs-1x fw-bolder text-gray-700 text-nowrap">
                                        <span class="badge fs-7 m-1 badge-light-success ">TOTAL</span>
                                    </div>
                                    <div class="col">
                                        <div class="card card-dashed flex-center  min-w-175px my-3 p-6">
                                            <span class="fs-lg-2x fw-bolder d-flex justify-content-center">{{number_format($versement->montant_octroye,0, '.',' ')}} Fcfa</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Sidebar-->
                </div>

                <br>
                @if($versement->state=='En cours')
                <div class="card">
                    <div class="card-footer d-flex justify-content-end py-6">
                        <a onclick="cancelRecordConfirm('{{route('stocks.outer.cancel',$versement->id)}}')" class="btn btn-danger btn-active-light-danger me-2">Annuler</a>
                        <button id="senderX" onclick="outStockClose('{{route('stocks.outer.termine',$versement->id)}}')" class="btn btn-primary">
                            <strong>
                                <b id="text-loadX" class="visually-hidden">Veuillez patienter... <div class="spinner-border" role="status"></div></b>
                                <b id="text-fixX">Terminer</b>
                            </strong>
                        </button>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div id="evote-modal-container"></div>
    <form>
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    </form>
@endsection

@section('js')
    <script src="{{asset('js/script.js')}}"></script>

    <script>


        $('#kt_docs_repeater_advanced').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function () {
                $(this).slideDown();

                // Re-init select2
                $(this).find('[data-kt-repeater="select2"]').select2();
            },

            hide: function (deleteElement) {
                $(this).slideUp(deleteElement);
            },

            ready: function(){
                // Init select2
                $('[data-kt-repeater="select2"]').select2();
            }
        });


    </script>
@endsection
