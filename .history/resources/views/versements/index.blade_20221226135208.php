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

                <!--begin::les 3 card statistique-->
                <div class="row mt-5">
                    <div class="col-xl-4">
                        <!--begin::Stats Widget 13-->
                        <a href="#" class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b">
                            <!--begin::Body-->
                            <div class="card-body">
                                <span class="svg-icon svg-icon-white svg-icon-3x">
                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Group.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <path
                                                d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            <path
                                                d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                fill="#000000" fill-rule="nonzero" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                <div class="text-inverse-primary font-weight-bolder font-size-h5 mb-2 mt-5">
                                    Clients <span class="badge badge-light fw-bolder my-2">En attente de validation</span>
                                </div>
                                <div class="font-weight-bold text-inverse-primary font-size-sm">
                                    <div class="symbol symbol-circle me-5">
                                        <div class="symbol-label bg-transparent border border-secondary border-dashed">
                                            <span class="font-weight-bold text-inverse-primary font-size-h2"></span>
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
                        <a href="#" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b">
                            <!--begin::Body-->
                            <div class="card-body">
                                <span class="svg-icon svg-icon-white svg-icon-3x">
                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Group.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <path
                                                d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            <path
                                                d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                fill="#000000" fill-rule="nonzero" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                <div class="text-inverse-success font-weight-bolder font-size-h5 mb-2 mt-5">
                                    Clients <span class="badge badge-light fw-bolder my-2">Acceptés</span></div>
                                <div class="font-weight-bold text-inverse-success font-size-sm">
                                    <div class="symbol symbol-circle me-5">
                                        <div class="symbol-label bg-transparent border border-secondary border-dashed">
                                            <span class="font-weight-bold text-inverse-success font-size-h2"></span>
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
                        <!--begin::Stats Widget 14-->
                        <a href="#" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b">
                            <!--begin::Body-->
                            <div class="card-body">
                                <span class="svg-icon svg-icon-white svg-icon-3x">
                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Group.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <path
                                                d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            <path
                                                d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                fill="#000000" fill-rule="nonzero" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                <div class="text-inverse-success font-weight-bolder font-size-h5 mb-2 mt-5">
                                    Clients <span class="badge badge-light fw-bolder my-2">Acceptés</span></div>
                                <div class="font-weight-bold text-inverse-success font-size-sm">
                                    <div class="symbol symbol-circle me-5">
                                        <div class="symbol-label bg-transparent border border-secondary border-dashed">
                                            <span class="font-weight-bold text-inverse-success font-size-h2"></span>
                                            <span class="pulse-ring"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                        </a>
                        <!--end::Stats Widget 14-->
                    </div>
                </div>
                <!--end::les 3 card statistique-->
                <div class="col-xl-12">
                    <div class="card card-xl-stretch mb-5 mt-3 mb-xl-8">
                        <div class="card-header border-0 pt-5 d-flex align-items-stretch justify-content-between">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">Liste des Clients/Versement</span>
                            </h3>
                            @permission('versement-modifier')
                                <div class="card-toolbar">
                                    <a onclick="createRecord('{{ route('versements.create') }}')"
                                        class="btn btn-sm btn-flex btn-primary fw-bolder">Octroyé un pret</a>
                                </div>
                            @endpermission
                            @permission('versement-modifier')
                                <div class="card-toolbar">
                                    <a onclick="createRecord('{{ route('versements.renews') }}')"
                                        class="btn btn-sm btn-flex btn-primary fw-bolder">Renouvelé un pret</a>
                                </div>
                            @endpermission
                        </div>
                        <div class="card-body py-3">
                            <div class="table-responsive">
                                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                                    id="o2d-datatable">
                                    <thead>
                                        <tr class="fw-bolder text-muted">
                                            <th class="min-w-140px">ID</th>
                                            <th class="min-w-140px">CLIENT</th>
                                            <th class="min-w-140px">ETAT</th>
                                            <th class="min-w-120px">Mt. DEBLOQUE</th>
                                            <th class="min-w-120px">PENALITE</th>
                                            <th class="min-w-120px">Cs. VERSE</th>
                                            <th class="min-w-120px">Mt. VERSE</th>
                                            <th class="min-w-120px">Sm. RESTANT</th>
                                            <th class="min-w-120px">STATUT</th>
                                            <th class="min-w-120px">Dt. REMBOURSEMENT</th>
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
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        $('#o2d-datatable').DataTable({
            "pageLength": 50,
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
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
                        return '<span class="label label-light-success label-inline fs-8 font-weight-bolder">' +
                            data +
                            '</span>' +
                            '<span class="text-muted font-weight-bolder text-muted d-block fs-9">Par: ' +
                            full
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
                            '<a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 fs-6">' +
                            full.full_name_client +
                            '</a>' +
                            '<span class="text-muted font-weight-bolder text-muted d-block fs-7">' +
                            '<div class="min-w-125px pe-2">N CLient: ' +
                            '<span class="fs-8 m-1">' + full.numb_cli +
                            '</span>' +
                            '<div class="min-w-125px pe-2">Tel: ' +
                            '<span class="label label-light-primary label-inline fs-8 m-1">' + full
                            .first_phone +
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
                        status = status + ' ' + '<span class="label fs-7 ' + label + ' label-inline">' +
                            value +
                            '</span>' +
                            '<span class="text-muted font-weight-bolder label-inline text-muted d-block fs-9">Dt déblocage: ' +
                            full
                            .created_at + '</span>';

                        return status;

                    }
                },

                {
                    data: 'montant_octroye',
                    name: 'montant_octroye',
                    render: function render(data, type, full, meta) {
                        return '<span class=" label label-light-success label-inline font-weight-bolder fs-6">' +
                            data.toLocaleString('fr') + 
                            '</span>'+
                            '<span class="label label-light-primary label-inline fs-8 m-1">CLient ' +
                            full
                            .status_news_versement + '</span>';
                    }
                },

                {
                    data: 'penalite',
                    name: 'penalite',
                    render: function render(data, type, full, meta) {
                        return '<span class=" label label-light-success label-inline font-weight-bolder fs-6">' +
                            data.toLocaleString('fr') + '</span>'
                    }
                },

                {

                    data: 'commission_verse',
                    name: 'commission_verse',
                    render: function render(data, type, full, meta) {
                        return '<span class=" label label-light-success label-inline font-weight-bolder fs-6">' +
                            data
                            .toLocaleString('fr') + '</span>'
                    }
                },
                {
                    data: 'somme_verse',
                    name: 'somme_verse',
                    render: function render(data, type, full, meta) {
                        return '<span class=" label label-light-warning label-inline font-weight-bolder fs-6">' +
                            data
                            .toLocaleString('fr') + '</span>' +
                            '<span class="text-muted font-weight-bolder label-inline text-muted d-block fs-9">Date: ' +
                            full
                            .updated_at + '</span>'
                    }
                },


                {
                    data: 'reste_apaye',
                    name: 'reste_apaye',
                    render: function render(data, type, full, meta) {
                        return '<span class=" label label-light-danger label-inline font-weight-bolder fs-6">' +
                            data
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
                        status = status + ' ' + '<span class="label fs-7 m-1 ' + label + ' label-inline">' +
                            value +
                            '</span>';

                        return status;

                    }
                },
                {
                    data: 'limit',
                    name: 'limit',
                    render: function render(data, type, full, meta) {
                        return '<span class="label label-light-danger label-inline fs-8 font-weight-bolder">Date: ' +
                            data +
                            '</span>';
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
