@extends('layouts.app')
@section('title', 'Administration - Liste des clients')
@section('content')
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Liste des clients</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column-fluid">
        <div class="container col-md-12">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            <span class="flaticon-list icon-lg primary-color"></span>
                            Liste de tout les clients
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <h5 class="text-dark font-weight-bolder my-1 mr-5">
                            <a href="{{ route('clients.clientAcceptes') }}"><span
                                    class="flaticon-up-arrow-1"></span> Clients acceptés</a>
                        </h5>
                        <h5 class="text-dark font-weight-bolder my-1 mr-5">
                            <a href="{{ route('clients.index') }}"><span
                                    class="flaticon-up-arrow-1"></span> Clients refusés</a>
                        </h5>
                        <h5 class="text-dark font-weight-bolder my-1 mr-5">
                            <a href="{{ route('clients.create') }}">
                            <span class="fas fa-user-plus">
                            </span> Ajouter un client</a>
                        </h5>
                    </div>
                </div>
<!--Begin::Row-->
<div class="row">
    <div class="col-xl-4">
        <!--begin::Stats Widget 13-->
        <a href="#"
            class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b">
            <!--begin::Body-->
            <div class="card-body">
                <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg--><svg
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <path
                                d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z"
                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                            <path
                                d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z"
                                fill="#000000" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
                <div class="text-inverse-primary font-weight-bolder font-size-h5 mb-2 mt-5">
                    Clients <span class="badge badge-light-warning fw-bolder my-2">En attente de validation</span>
                </div>
                <div class="font-weight-bold text-inverse-primary font-size-sm">
                    <div class="symbol symbol-circle me-5">
                        <div class="symbol-label bg-transparent border border-secondary border-dashed">
                            <span class="font-weight-bold text-inverse-primary font-size-h2">{{$clientAttente}}</span>
                            <span class="pulse-ring"></span>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Stats Widget 13-->
    </div>
    <div class="col-xl-4">
        <!--begin::Stats Widget 14-->
        <a href="#"
            class="card card-custom bg-dan bg-hover-state-dan card-stretch gutter-b">
            <!--begin::Body-->
            <div class="card-body">
                <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg--><svg
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <rect fill="#000000" x="4" y="4" width="7" height="7"
                                rx="1.5" />
                            <path
                                d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                                fill="#000000" opacity="0.3" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
                <div class="text-inverse-dan font-weight-bolder font-size-h5 mb-2 mt-5">
                    Apartments</div>
                    <div class="font-weight-bold text-inverse-danger font-size-sm">
                        <div class="symbol symbol-circle me-5">
                            <div class="symbol-label bg-transparent border border-secondary border-dashed">
                                <span class="font-weight-bold text-inverse-dan font-size-h2">{{$clientAccepté}}</span>
                                <span class="pulse-ring"></span>
                            </div>
                        </div>
                    </div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Stats Widget 14-->
    </div>
    <div class="col-xl-4">
        <!--begin::Stats Widget 15-->
        <a href="#"
            class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b">
            <!--begin::Body-->
            <div class="card-body">
                <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg--><svg
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <rect fill="#000000" opacity="0.3" x="13" y="4" width="3"
                                height="16" rx="1.5" />
                            <rect fill="#000000" x="8" y="9" width="3" height="11"
                                rx="1.5" />
                            <rect fill="#000000" x="18" y="11" width="3" height="9"
                                rx="1.5" />
                            <rect fill="#000000" x="3" y="13" width="3" height="7"
                                rx="1.5" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
                <div class="text-inverse-success font-weight-bolder font-size-h5 mb-2 mt-5">
                    Sales Stats</div>
                <div class="font-weight-bold text-inverse-success font-size-sm">50%
                    Increased for FY20</div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Stats Widget 15-->
    </div>
</div>
<!--End::Row-->
                <div class="row g-5 g-xl-8">
                    <div class="col-xl-4">
                        <div class="card card-xl-stretch-90 mb-5 mb-xl-8">
                            <div class="card-header border-0 py-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder fs-3 mb-1">Clients <span class="badge badge-light-warning fw-bolder my-2">En attente de validation</span> </span>
                                </h3>
                                <div class="d-flex text-center flex-column pt-1" style="position: relative;">
                                    <div class="symbol symbol-circle me-5">
                                        <div class="symbol-label bg-transparent text-primary border border-secondary border-dashed">
                                            <span class="text-warning font-weight-bold fs-8x pt-2">{{$clientAttente}}</span>
                                            <span class="pulse-ring"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card card-xl-stretch-90 mb-5 mb-xl-8">
                            <div class="card-header border-0 py-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder fs-3 mb-1">Clients <span class="badge badge-success fw-bolder my-2">Acceptés</span> </span>
                                </h3>
                                <div class="d-flex text-center flex-column pt-1" style="position: relative;">
                                    <div class="symbol symbol-circle me-5">
                                        <div class="symbol-label bg-transparent text-success border border-secondary border-dashed">
                                            <span class="text-success fw-bolder fs-2x pt-2">{{$clientAccepté}}</span>
                                            <span class="pulse-ring"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card card-xl-stretch-90 mb-5 mb-xl-8">
                            <div class="card-header border-0 py-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder fs-3 mb-1">Clients <span class="badge badge-light-danger fw-bolder my-2">Rejetés</span> </span>
                                </h3>
                                <div class="d-flex text-center flex-column pt-1" style="position: relative;">
                                    <div class="symbol symbol-circle me-5">
                                        <div class="symbol-label bg-transparent text-danger border border-secondary border-dashed">
                                            <span class="text-danger fw-bolder fs-2x pt-2">{{$clientRejeté}}</span>
                                            <span class="pulse-ring"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="float-end">
                    @if (request()->has('trashed'))
                            
                            <a href="{{ route('clients.restoreAll') }}" class="btn btn-success"> <i class="fas fa-undo"></i>Rejenerer les clients supprimés</a>
                    @else
                        <a href="{{ route('clients.index', ['trashed' => 'client']) }}" class="btn btn-primary">Voir les clients supprimés</a>
                    @endif
                </div>
                <div class="card-body">
                    <input style="border: solid black;" data-table="table-clients" placeholder="Rechercher un client" type="text" class="light-table-filter form-control form-control-lg mb-3">
                    <div id="client-datatable" class="table-responsive">
                        @include('clients.partials.paginate')
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="{{ asset('assets/script.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.delete').click(function(e) {
                if (!confirm('Voulez vous vraiment supprimer cet enregistrememn?')) {
                    e.preventDefault();
                }
            });
        });
    </script>
@endsection