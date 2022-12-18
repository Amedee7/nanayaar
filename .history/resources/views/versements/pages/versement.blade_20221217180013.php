@extends('layouts.app')
@section('title', 'Administration - Liste des clients')
@section('content')


    <div class="d-flex flex-column-fluid">
        <div class="container col-md-12">
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
                                                    <div class="d-flex align-items-center flex-equal fw-row me-4 order-2">
                                                        <div class="fs-6 fw-bolder text-gray-700 text-nowrap">Date de
                                                            création: {{ $versement->created_at }}</div>
                                                            <div class="text-muted fw-bolder">
                                                                Effectuée par: <span class="badge badge-light-primary">{{Auth::user()->lastname}} {{Auth::user()->firstname}}</span>
                                                                <span class="mx-3">|</span>
                                                                <a href="{{route('versement.index')}}">Retour à la liste</a>
                                                            </div>
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
                                                                <th class="min-w-70px text-end sorting_disabled"
                                                                    style="width: 70px;">ACTION</th>
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
                                                        <tfoot>
                                                            <tr>
                                                                <th colspan="5" class="text-end"><span
                                                                        class="fs-sm-3 fw-bolder"> Versement(s)</span></th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                            @if ($versement->state == 'En cours')
                                                <div class="card-footer p-6">
                                                    <button
                                                        onclick="editRecord('{{ route('versements.modify.add', $id) }}')"
                                                        class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                                                        Ajouter</button>
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
                                <span class="card-label font-size-h3 font-weight-bolder text-dark">Client concerné</span>
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
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
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
        </div>

    </div>

    @if ($versement->state == 'En cours')
        <div class="card">
            <div class="card-footer d-flex justify-content-end py-6">
                <a onclick="cancelRecordConfirm('{{ route('versements.cancel', $versement->id) }}')"
                    class="btn btn-danger btn-active-light-danger mr-2">Annuler</a>
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

@endsection
@section('js')
    <script src="{{ asset('assets/script.js') }}"></script>
    <script type="text/javascript"></script>
@endsection
