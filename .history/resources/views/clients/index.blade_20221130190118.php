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
                            Liste de tout les clients {{ $deletecount }}
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
                        <button onclick="createRecord('{{ route('clients.create') }}')" class="btn px-4 btn-dark mb-1">
                            <span class="flaticon-refresh"></span>
                            Ajouter un client
                        </button>
                    </div>
                </div>
                <div class="float-end">
                    @if (request()->has('trashed'))
                        <a href="{{ route('clients.index') }}" class="btn btn-info">View All clients</a>
                        <a href="{{ route('clients.restoreAll') }}" class="btn btn-success">Rejenerer les cli</a>
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
                if (!confirm('Are you sure you want to delete this client?')) {
                    e.preventDefault();
                }
            });
        });
    </script>
@endsection