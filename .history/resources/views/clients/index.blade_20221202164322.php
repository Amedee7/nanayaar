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
                                            <span class="text-warning fw-bolder fs-2x pt-2">{{$clientAttente}}</span>
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
                                    <span class="card-label fw-bolder fs-3 mb-1">Clients <span class="badge badge-light-success fw-bolder my-2">Acceptés</span> </span>
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