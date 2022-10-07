@extends('layouts.app')
@section('title', 'Administration - Liste des Clients')
@section('content')
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Liste des Clients</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <!--begin: Search Form-->
        <form class="kt-form kt-form--fit mb-15">
            <div class="row mb-6">
                <div class="col-lg-3 mb-lg-0 mb-6">
                    <label>RecordID:</label>
                    <input type="text" class="form-control datatable-input" placeholder="E.g: 4590" data-col-index="0" />
                </div>
                <div class="col-lg-3  mb-lg-0 mb-6">
                    <label>Numero client:</label>
                    <input type="text" class="form-control datatable-input" placeholder="Ex: 37000-300"
                        data-col-index="1" />
                </div>
                <div class="col-lg-3  mb-lg-0 mb-6">
                    <label>Agent Commercial:</label>
                    <select class="form-control datatable-input" data-col-index="2">
                        <option value="">Select</option>
                        {{-- @foreach ($users as $user)
                            <option value="{{ $user->user_id->id }}" @if ($loop->first) selected @endif>
                                {{ $user->firstname }} {{ $user->lastname }}</option>
                        @endforeach --}}
                    </select>
                </div>
                <div class="col-lg-3  mb-lg-0 mb-6">
                    <label>Nom du Client:</label>
                    <input type="text" class="form-control datatable-input" placeholder="Agent ID or name"
                        data-col-index="4" />
                </div>
            </div>

            <div class="row mb-8">
                <div class="col-lg-3  mb-lg-0 mb-6">
                    <label>Date d'inscription:</label>
                    <div class="input-daterange input-group" id="kt_datepicker">
                        <input type="text" class="form-control datatable-input" name="start" placeholder="From"
                            data-col-index="5" />
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
                        </div>
                        <input type="text" class="form-control datatable-input" name="end" placeholder="To"
                            data-col-index="5" />
                    </div>
                </div>
                <div class="col-lg-3  mb-lg-0 mb-6">
                    <label>Status:</label>
                    <select class="form-control datatable-input" data-col-index="6">
                        <option value="">Select</option>

                    </select>
                </div>
                <div class="col-lg-3  mb-lg-0 mb-6">
                    <label>Montant:</label>
                    <select class="form-control datatable-input" data-col-index="7">
                        <option value="">Select</option>
                    </select>
                </div>
            </div>

            <div class="row mt-8">
                <div class="col-lg-12">
                    <button class="btn btn-primary btn-primary--icon" id="kt_search">
                        <span>
                            <i class="la la-search"></i>
                            <span>Recherche</span>
                        </span>
                    </button>
                    &nbsp;&nbsp;
                    <button class="btn btn-secondary btn-secondary--icon" id="kt_reset">
                        <span>
                            <i class="la la-close"></i>
                            <span>Annuler</span>
                        </span>
                    </button>
                </div>
            </div>
        </form>

        <div class="card-body ">
            <table id="o2d-datatable" class="table table-bordered table-striped bgc-grey-l4 text-100 border-b-1">
                <thead style="border-color:#2a80c8">
                    <tr>
                        <th>Record ID</th>
                        <th>Numero Client</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Telephone</th>
                        <th>Status</th>
                        <th>Montant</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

@endsection
@section('js')
    <script src="{{ asset('assets/script.js') }}"></script>
    <script>
        $('#o2d-datatable').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': false,

            language: {
                processing: "Traitement en cours...",
                search: "Recherche &nbsp; :",
                lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
                info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                infoEmpty: "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                infoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                loadingRecords: "Chargement en cours...",
                zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
                emptyTable: "Aucune donnée disponible dans le tableau",
                paginate: {
                    first: "<<",
                    previous: "Précédent",
                    next: "Suivant",
                    last: ">>"
                },
                aria: {
                    sortAscending: ": activer pour trier la colonne par ordre croissant",
                    sortDescending: ": activer pour trier la colonne par ordre décroissant"
                }
            },
            ajax: '{!! route('cli.datatables') !!}',
            columns: [{
                    data: 'id',
                    name: 'id',
                    render: function render(data, type, full, meta) {
                        return '<span style="width: 250px;">' +
                            '<div class="ml-4">' +
                            '<div class="text-dark-75 font-weight-bolder font-size-lg mb-0">' + full
                            .firstname + '</div>' +
                            '<a class="text-muted font-weight-bold text-hover-primary">' + full.lastname +
                            '</a>' +
                            '</div>' +
                            '</div>' +
                            '</span>';
                    }
                },
                {
                    data: 'telephone',
                    name: 'telephone',
                    render: function render(data, type, full, meta) {
                        return '<span style="width: 250px;">' +
                            '<div class="d-flex align-items-center">' +
                            '<div class="ml-0">' +
                            '<div class="text-dark-75 font-weight-bolder font-size-lg mb-0">Tel: ' + data +
                            '</div>' +
                            '<a class="text-muted font-weight-bold text-hover-primary">Email: ' + full
                            .email + '</a>' +
                            '</div>' +
                            '</div>' +
                            '</span>';
                    }
                },
                {
                    data: 'roles',
                    name: 'roles.display_name'
                },
                {
                    data: 'status',
                    name: 'status',
                    render: function render(data, type, full, meta) {
                        var status = ' ';
                        var label;
                        var value = data;
                        switch (value) {
                            case "actif":
                                label = "bg-success";
                                break;
                            case "inactif":
                                label = "bg-danger";
                                break;
                            default:
                                label = "bg-primary";
                        }

                        if (typeof value === 'undefined') {
                            return value;
                        }
                        status = status + ' ' + '<span class="badge text-white ' + label + ' ">' + value +
                            '</span>';

                        return status;

                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    width: 100
                },
            ],
            columnDefs: [{
                targets: -3,
                render: function render(data, type, full, meta) {
                    var roles = ' ';
                    for (var keys in data) {
                        var label;
                        var value = data[keys].display_name;
                        switch (value) {
                            case "Superadministrateur":
                                label = "bg-danger";
                                break;
                            case "Administrateur":
                                label = "bg-success";
                                break;
                            case "Agent-relai":
                                label = "bg-info";
                                break;
                            default:
                                label = "bg-warning";
                        }

                        if (typeof value === 'undefined') {
                            return value;
                        }
                        roles = roles + ' ' + '<span class="badge text-white ' + label + ' ">' + value +
                            '</span>';
                    }
                    return roles;

                }
            }],
        });
    </script>
@endsection
