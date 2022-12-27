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
                                    <!--begin::Svg Icon--><svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                        viewBox="0 0 24 24" version="1.1">
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
                                            <span
                                                class="font-weight-bold text-inverse-primary font-size-h2">{{ $clientAttente }}</span>
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
                                    <!--begin::Svg Icon--><svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                        viewBox="0 0 24 24" version="1.1">
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
                                            <span
                                                class="font-weight-bold text-inverse-success font-size-h2">{{ $clientAccepté }}</span>
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
                        <a href="#" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b">
                            <!--begin::Body-->
                            <div class="card-body">
                                <span class="svg-icon svg-icon-white svg-icon-3x">
                                    <!--begin::Svg Icon--><svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                        viewBox="0 0 24 24" version="1.1">
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
                                <div class="text-inverse-danger font-weight-bolder font-size-h5 mb-2 mt-5">
                                    Clients <span class="badge badge-light fw-bolder my-2">Rejetés</span></div>
                                <div class="font-weight-bold text-inverse-danger font-size-sm">
                                    <div class="symbol symbol-circle me-5">
                                        <div class="symbol-label bg-transparent border border-secondary border-dashed">
                                            <span
                                                class="font-weight-bold text-inverse-danger font-size-h2">{{ $clientRejeté }}</span>
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
                <!--end::les 3 card statistique-->


                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            <span class="flaticon-list icon-lg primary-color"></span>
                            Liste des clients inscrits
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        @permission('client-modifier')
                            <!--begin::Dropdown-->
                            <div class="dropdown dropdown-inline mr-2">
                                <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="svg-icon svg-icon-md">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                                                    fill="#000000" opacity="0.3" />
                                                <path
                                                    d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                                                    fill="#000000" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span> Export
                                </button>
                                <!--begin::Dropdown Menu-->
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <!--begin::Navigation-->
                                    <ul class="navi flex-column navi-hover py-2">
                                        <li
                                            class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
                                            Choisissez une option:
                                        </li>
                                        <li class="navi-item">
                                            <a href="{{ route('clients.export-clients') }}" class="navi-link">
                                                <span class="navi-icon"><i class="la la-file-excel-o"></i></span>
                                                <span class="navi-text">Excel</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon"><i class="la la-file-text-o"></i></span>
                                                <span class="navi-text">CSV</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon"><i class="la la-file-pdf-o"></i></span>
                                                <span class="navi-text">PDF</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <!--end::Navigation-->
                                </div>
                                <!--end::Dropdown Menu-->
                            </div>
                        @endpermission

                        <!--end::Dropdown-->
                        @permission('client-creer')
                            <h5 class="text-dark font-weight-bolder my-1 mr-5">
                                <a href="{{ route('clients.create') }}" class="btn btn-primary">
                                    <span class=" fas fa-user-plus">
                                    </span> Ajouter un client</a>
                            </h5>
                        @endpermission
                        {{-- <!--begin::Lable-->
                        <span class="font-weight-bolder text-warning py-1 font-size-lg">
                            @if (request()->has('trashed'))
                                <a href="{{ route('clients.restoreAll') }}" class="btn btn-success"> <i
                                        class="fas fa-undo"></i>Rejenerer les clients supprimés</a>
                            @else
                                <a href="{{ route('clients.index', ['trashed' => 'client']) }}"
                                    class="btn btn-warning">Voir les clients supprimés</a>
                            @endif
                        </span>
                        <!--end::Lable--> --}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-body ">
                        <table id="o2d-datatable"
                            class="table table-bordered table-striped bgc-grey-l4 text-100 border-b-1">
                            <thead style="border-color:#2a80c8">
                                <tr>
                                    <th>Record ID</th>
                                    <th>Nom & Prenom</th>
                                    <th>Telephones</th>
                                    <th>Mt. demandé</th>
                                    <th>Agent comm</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
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
    <script src="{{ asset('assets/script.js') }}"></script>
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
                            full.name +
                            '</a>' +
                            '<a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 fs-6">' +
                            full.lastname +
                            '</a>' +
                            '<span class="text-muted font-weight-bolder text-muted d-block fs-7">' +
                            '<div class="min-w-125px pe-2">N CLient: ' +
                            '<span class="fs-8 m-1">' + full.numb_cli +
                            '</span>' +
                            '<div class="min-w-125px pe-2">Date: ' +
                            '<span class="label label-light-primary label-inline fs-8 m-1">' + full
                            .created_at +
                            '</span>' +
                            '</div>' +
                            '</span>' +
                            '</div>' +
                            '</div>';
                        return output;
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
                    name: 'montant_demande',
                    render: function render(data, type, full, meta) {
                        return '<span class=" label label-light-success label-inline fw-bolder fs-6">' +
                            data
                            .toLocaleString('fr') + '</span>'
                    }
                },
                {
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
                }

                ,
                {
                    data: 'status',
                    name: 'status',
                    render: function render(data, type, full, meta) {
                        var status = ' ';
                        var label;
                        var value = data;
                        switch (value) {
                            case 'Accepté':
                                label = "label-light-success";
                                break;
                            case 'Rejeté':
                                label = "label-light-danger";
                                break;
                            default:
                                label = "label-light-primary";
                        }

                        if (typeof value === 'undefined') {
                            return value;
                        }
                        status = status + ' ' + '<span class="label font-size-3 m-1 ' + label +
                            ' label-inline">' + value +
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

        });
    </script>
@endsection
