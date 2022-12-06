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
<div class="row mt-5">
    <div class="col-xl-4">
        <!--begin::Stats Widget 13-->
        <a href="#"
            class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b">
            <!--begin::Body-->
            <div class="card-body">
                <span class="svg-icon svg-icon-white svg-icon-3x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Group.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24"/>
                        <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                        <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                    </g>
                </svg><!--end::Svg Icon--></span>
                <div class="text-inverse-primary font-weight-bolder font-size-h5 mb-2 mt-5">
                    Clients <span class="badge badge-light fw-bolder my-2">En attente de validation</span>
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
            class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b">
            <!--begin::Body-->
            <div class="card-body">
                <span class="svg-icon svg-icon-white svg-icon-3x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Group.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24"/>
                        <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                        <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                    </g>
                </svg><!--end::Svg Icon--></span>
                <div class="text-inverse-success font-weight-bolder font-size-h5 mb-2 mt-5">
                    Clients <span class="badge badge-light fw-bolder my-2">Acceptés</span></div>
                    <div class="font-weight-bold text-inverse-success font-size-sm">
                        <div class="symbol symbol-circle me-5">
                            <div class="symbol-label bg-transparent border border-secondary border-dashed">
                                <span class="font-weight-bold text-inverse-success font-size-h2">{{$clientAccepté}}</span>
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
            class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b">
            <!--begin::Body-->
            <div class="card-body">
                <span class="svg-icon svg-icon-white svg-icon-3x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Group.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24"/>
                        <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                        <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                    </g>
                </svg><!--end::Svg Icon--></span>
                <div class="text-inverse-danger font-weight-bolder font-size-h5 mb-2 mt-5">
                    Clients <span class="badge badge-light fw-bolder my-2">Rejetés</span></div>
                    <div class="font-weight-bold text-inverse-danger font-size-sm">
                        <div class="symbol symbol-circle me-5">
                            <div class="symbol-label bg-transparent border border-secondary border-dashed">
                                <span class="font-weight-bold text-inverse-danger font-size-h2">{{$clientRejeté}}</span>
                                <span class="pulse-ring"></span>
                            </div>
                        </div>
                    </div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Stats Widget 15-->
    </div>
</div>
<!--End::Row-->
                <div class="row justify-content-between">
                    div
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