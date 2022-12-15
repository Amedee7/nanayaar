@extends('layouts.app')
@section('title', 'Administration - Liste des clients')
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
                            <h2 class="mb-1">Gestion des prets</h2>
                            <div class="text-muted fw-bolder">
                                Effectuée par: <a href="#">{{ Auth::user()->lastname }}
                                    {{ Auth::user()->firstname }}</a>
                            </div>
                        </div>
                        <!--end::Title-->
                    </div>
                </div>
                <!--end::Card header-->

                
            </div>
        </div>
    </div>
    <div class="col-xl-12">
        <div class="card card-xl-stretch mb-5 mt-3 mb-xl-8">
            <div class="card-header border-0 pt-5 d-flex align-items-stretch justify-content-between">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Liste des Clients/Versement</span>
                </h3>
                <div class="card-toolbar">
                    <a onclick="createRecord('{{ route('versements.create') }}')"
                        class="btn btn-sm btn-flex btn-primary fw-bolder">Effectuer une versement</a>
                </div>
            </div>
            <div class="card-body py-3">
                <div class="table-responsive">
                    <table id="o2d-datatable" class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                        <thead>
                            <tr class="fw-bolder text-muted">
                                <th class="min-w-140px">ID</th>
                                <th class="min-w-140px">CLIENT</th>
                                <th class="min-w-140px">ETAT</th>
                                <th class="min-w-120px">TOTAL</th>
                                <th class="min-w-120px">PAYE</th>
                                <th class="min-w-120px">RESTANT</th>
                                <th class="min-w-120px">STATUT</th>
                                <th class="min-w-100px text-end">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="o2d-modal-container"></div>
    <form>
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    </form>
@endsection

@section('js')
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        $('#o2d-datatable').DataTable({
            "buttons": ["csv", "excel", "pdf", "print"],
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': false,
            'responsive': true,
            'serverSide': false,

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
            ajax: '{!! route('versements.datatables') !!}',
            columns: [{
                    data: 'identifier',
                    name: 'identifier',
                    render: function render(data, type, full, meta) {
                        return '<span class="label label-light-success label-inline fs-8 font-weight-bolder">' + data +
                            '</span>' +
                            '<span class="text-muted font-weight-bolder text-muted d-block fs-9">Par: ' + full
                            .full_name + '</span>'
                    }
                },
                {
                    data: 'name',
                    name: 'name',
                    render: function render(data, type, full, meta) {
                        var output;
                        output = '<div class="d-flex align-items-center">' +
                            '<div class="symbol symbol-50px me-5">' +
                            '<span class="symbol-label bg-light-primary">' +
                            '<span class="svg-icon svg-icon-2x svg-icon-primary">' +
                            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">' +
                            '<path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black"></path>' +
                            '<path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black"></path>' +
                            '</svg>' +
                            '</span>' +
                            '</span>' +
                            '</div>' +
                            '<div class="d-flex justify-content-start flex-column">' +
                            '<a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 fs-6">' + full.full_name_client +
                            '</a>' +
                            '<span class="text-muted font-weight-bolder text-muted d-block fs-7">' +
                            '<div class="min-w-125px pe-2">N CLient: ' +
                            '<span class="fs-8 m-1">' + full.numb_cli +
                            '</span>' +
                            '<div class="min-w-125px pe-2">Tel: ' +
                            '<span class="label label-light-primary label-inline fs-8 m-1">' + full.first_phone +
                            '</span>' +
                            '</div>' +
                            '</span>' +
                            '</div>' +
                            '</div>';
                        return output;
                    }
                },
                {
                    data: 'state',
                    name: 'state',
                    render: function render(data, type, full, meta) {
                        var status = ' ';
                        var label;
                        var value = data;
                        switch (value) {
                            case "Terminé":
                                label = "label-light-success";
                                break;
                            case "En cours":
                                label = "label-light-warning";
                                break;
                            default:
                                label = "label-light-danger";
                        }

                        if (typeof value === 'undefined') {
                            return value;
                        }
                        status = status + ' ' + '<span class="label fs-7 ' + label + ' label-inline">' + value +
                            '</span>' +
                            '<span class="text-muted font-weight-bolder label-inline text-muted d-block fs-9">Date: ' + full
                            .created_at + '</span>';

                        return status;

                    }
                },

                {
                    data: 'montant_octroye',
                    name: 'montant_octroye',
                    render: function render(data, type, full, meta) {
                        return '<span class=" label label-light-success label-inline font-weight-bolder fs-6">' + data
                            .toLocaleString('fr') + '</span>'
                    }
                },

                {
                    data: 'somme_verse',
                    name: 'somme_verse',
                    render: function render(data, type, full, meta) {
                        return '<span class=" label label-light-warning label-inline font-weight-bolder fs-6">' + data
                            .toLocaleString('fr') + '</span>'
                    }
                },

                {
                    data: 'reste_apaye',
                    name: 'reste_apaye',
                    render: function render(data, type, full, meta) {
                        return '<span class=" label label-light-danger label-inline font-weight-bolder fs-6">' + data
                            .toLocaleString('fr') + '</span>'
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
                            case "Non payé":
                                label = "label-light-danger";
                                break;
                            case "Paiement partiel":
                                label = "label-light-warning";
                                break;
                            default:
                                label = "label-light-success";
                        }

                        if (typeof value === 'undefined') {
                            return value;
                        }
                        status = status + ' ' + '<span class="label fs-7 m-1 ' + label + ' label-inline">' + value +
                            '</span>';

                        return status;

                    }
                },

                {
                    name: 'actions',
                    data: 'actions'
                }
            ],
        });
    </script>
@endsection
