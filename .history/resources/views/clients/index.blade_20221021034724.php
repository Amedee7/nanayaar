@extends('layouts.app')
@section('title', 'Administration - Liste des Clients')
@section('content')

    <!--begin::Details-->
    <div class="d-flex align-items-center flex-wrap mr-2">

        <!--begin::Title-->
        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
            Users </h5>
        <!--end::Title-->

        <!--begin::Separator-->
        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
        <!--end::Separator-->

        <!--begin::Search Form-->
        <div class="d-flex align-items-center" id="kt_subheader_search">
            <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">
                450 Total </span>
            <form class="ml-5">
                <div class="input-group input-group-sm input-group-solid" style="max-width: 175px">
                    <input type="text" class="form-control" id="kt_subheader_search_form" placeholder="Search..." />
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <span class="svg-icon">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                            fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <path
                                            d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                            fill="#000000" fill-rule="nonzero" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <!--<i class="flaticon2-search-1 icon-sm"></i>-->
                        </span>
                    </div>
                </div>
            </form>
        </div>
        <!--end::Search Form-->

        <!--begin::Group Actions-->
        <div class="d-flex- align-items-center flex-wrap mr-2 d-none" id="kt_subheader_group_actions">
            <div class="text-dark-50 font-weight-bold">
                <span id="kt_subheader_group_selected_rows">23</span> Selected:
            </div>
            <div class="d-flex ml-6">
                <div class="dropdown mr-2" id="kt_subheader_group_actions_status_change">
                    <button type="button" class="btn btn-light-primary font-weight-bolder btn-sm dropdown-toggle"
                        data-toggle="dropdown">
                        Update Status
                    </button>
                    <div class="dropdown-menu p-0 m-0 dropdown-menu-sm">
                        <ul class="navi navi-hover pt-3 pb-4">
                            <li class="navi-header font-weight-bolder text-uppercase text-primary font-size-lg pb-0">
                                Change status to:
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link" data-toggle="status-change" data-status="1">
                                    <span class="navi-text"><span
                                            class="label label-light-success label-inline font-weight-bold">Approved</span></span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link" data-toggle="status-change" data-status="2">
                                    <span class="navi-text"><span
                                            class="label label-light-danger label-inline font-weight-bold">Rejected</span></span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link" data-toggle="status-change" data-status="3">
                                    <span class="navi-text"><span
                                            class="label label-light-warning label-inline font-weight-bold">Pending</span></span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link" data-toggle="status-change" data-status="4">
                                    <span class="navi-text"><span
                                            class="label label-light-info label-inline font-weight-bold">On
                                            Hold</span></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <button class="btn btn-light-success font-weight-bolder btn-sm mr-2" id="kt_subheader_group_actions_fetch"
                    data-toggle="modal" data-target="#kt_datatable_records_fetch_modal">
                    Fetch Selected
                </button>
                <button class="btn btn-light-danger font-weight-bolder btn-sm mr-2"
                    id="kt_subheader_group_actions_delete_all">
                    Delete All
                </button>
            </div>
        </div>
        <!--end::Group Actions-->
    </div>
    <!--end::Details-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Liste des Clients</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-3 container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-1">
            <div class="d-flex align-items-baseline flex-wrap mr-5">
                <h5 class="text-dark font-weight-bolder my-1 mr-5">
                    <span class="flaticon-user-add primary-color icon-lg"></span>
                    Gestion de clients. <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">
                        {{ $nbClient = DB::table('clients')->count() }} Clients au Totals </span>
                </h5>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <div class="btn-group dropup">
                <div class="btn-group dropup">
                    <a class="btn btn-primary" href="{{ route('clients.create') }}"><span
                            class="flaticon-up-arrow-1"></span> Insrire un client</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="card-body ">
            <table id="o2d-datatable" class="table table-bordered table-striped bgc-grey-l4 text-100 border-b-1">
                <thead style="border-color:#2a80c8">
                    <tr>
                        <th>Record ID</th>
                        <th>Numero Client</th>
                        <th>Nom & Prenom</th>
                        <th>Telephones</th>
                        <th>Montant</th>
                        <th>L'agent commercial</th>
                        <th>Status</th>
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
            ajax: '{!! route('clients.datatables') !!}',
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'numb_cli',
                    name: 'numb_cli',
                    render: function render(data, type, full, meta) {
                        return '<span style="width: 250px;">' +
                            '<div class="ml-4">' +
                            '<div class="text-dark-75 font-weight-bolder font-size-lg mb-0">' + full
                            .numb_cli + '</div>' +
                            '</div>' +
                            '</span>';
                    }
                },
                {
                    data: 'nom',
                    name: 'nom',
                    render: function render(data, type, full, meta) {
                        return '<span style="width: 250px;">' +
                            '<div class="ml-4">' +
                            '<div class="text-dark-75 font-weight-bolder font-size-lg mb-0">' + full
                            .name + '</div>' +
                            '<a class="text-muted font-weight-bold text-hover-primary">' + full.lastname +
                            '</a>' +
                            '</div>' +
                            '</div>' +
                            '</span>';
                    }
                },
                {
                    data: 'first_phone',
                    name: 'first_phone',
                    render: function render(data, type, full, meta) {
                        return '<span style="width: 250px;">' +
                            '<div class="d-flex align-items-center">' +
                            '<div class="ml-0">' +
                            '<div class="text-dark-75 font-weight-bolder font-size-lg mb-0">Tel 1: ' +
                            data +
                            '</div>' +
                            '<a class="text-muted font-weight-bold text-hover-primary">Tel 2: ' + full
                            .second_phone + '</a>' +
                            '</div>' +
                            '</div>' +
                            '</span>';
                    }
                },
                {
                    data: 'montant_demande',
                    name: 'montant_demande'
                }, {
                    data: 'user.firstname',
                    name: 'user.firstname',
                    render: function render(data, type, full, meta) {
                        return '<span style="width: 250px;">' +
                            '<div class="ml-4">' +
                            '<div class="text-dark-75 font-weight-bolder font-size-lg mb-0">' + full.user
                            .firstname + '</div>' +
                            '<a class="text-muted font-weight-bold text-hover-primary">' + full.user
                            .lastname + '</a>' +
                            '</div>' +
                            '</div>' +
                            '</span>';


                    }
                },
                {
                    data: 'status',
                    name: 'status',
                    render: function render(data, type, full, meta) {
                        var status = ' ';
                        var label;
                        var value = data;
                        switch (value) {
                            case 'Accepter':
                                label = "bg-success";
                                break;
                            case 'En attente':
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
            ],

        });
    </script>
@endsection
