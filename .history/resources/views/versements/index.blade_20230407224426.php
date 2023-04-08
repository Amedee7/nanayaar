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

                <div class="col-xl-12">
                    <div class="card card-xl-stretch mb-5 mt-3 mb-xl-8">

                        <div class="card-header border-0 pt-5 d-flex align-items-stretch justify-content-between">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">Liste des Clients/Versement</span>
                            </h3>
                            @permission('versement-creer')
                                <div class="btn-group dropup">
                                    <div class="btn-group dropup">
                                        <button onclick="createRecord('{{ route('versements.create') }}')" id="sender"
                                            type="button" class="btn btn-primary">
                                            <strong>
                                                <b id="text-load" class="text-hide">Veuillez patienter...</b>
                                                <b id="text-fix"><span class="fas fa-money-check mr-2"></span> Octroyé un
                                                    pret</b>
                                            </strong>
                                        </button>
                                        <button type="button" class="btn btn-dark dropdown-toggle dropdown-toggle-split"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" style="">
                                            <a onclick="createRecord('{{ route('versements.renews') }}')" class="dropdown-item"
                                                href="#"><span class="fas fa-retweet mr-2"></span> Renouvelé un pret</a>
                                        </div>
                                    </div>
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
                                            <th class="min-w-140px">STATUT</th>
                                            <th class="min-w-120px">Mt. DEBLOQUE</th>
                                            <th class="min-w-120px">PENALITE</th>
                                            <th class="min-w-120px">Mt. VERSE</th>
                                            <th class="min-w-120px">Sm. RESTANT</th>
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
            'pageLength': 50,
            lengthMenu: [
                [2, 15, 50, 100, -1],
                [2, 15, 50, 100, 'All']
            ],
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': false,
            'responsive': true,
            'serverSide': false,
            order: [
                [0, 'desc']
            ],

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
                        data: 'id',
                        name: 'id',
                    },

                    {
                        data: 'name',
                        name: 'name',
                        render: function render(data, type, full, meta) {
                            var output;
                            //devient rouge si on est a 2 jrs de la date limite et il na pas encore remboursé 
                            if (full.status != 'Remboursé' && full.nombreJour <= 2) {
                                return '<div style="background-color:rgb(238, 45, 45);" class="p-2">' +
                                    '<div class="d-flex align-items-center">' +
                                    '<div class="symbol symbol-50px me-5">' +
                                    '<span class="symbol-label bg-light-primary mr-2">' +
                                    '<span class="svg-icon svg-icon-3x svg-icon-primary">' +
                                    '<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">' +
                                    '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">' +
                                    '<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />' +
                                    '<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />' +
                                    '</svg>' +
                                    '</g>' +
                                    '</span>' +
                                    '</span>' +
                                    '</div>' +
                                    '<div class="d-flex justify-content-start flex-column">' +
                                    '<a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 fs-6">' +
                                    full.full_name_client +
                                    '</a>' +
                                    '<span class="text-muted font-weight-bolder text-muted d-block fs-7">' +
                                    '<div class="min-w-125px pe-2">N Client: ' +
                                    '<span class="fs-8 m-1">' +
                                    full.numb_cli +
                                    '</span>' +
                                    '</div>' +
                                    '<div class="min-w-125px pe-2">Tel: ' +
                                    '<span class="label label-light-primary label-inline fs-8 m-1">' + full
                                    .first_phone +
                                    '</span>' +
                                    '</div>' +
                                    '</span>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';
                            } else {
                                return '<div' +
                                    '<div class="d-flex align-items-center">' +
                                    '<div class="symbol symbol-50px me-5">' +
                                    '<span class="symbol-label bg-light-primary mr-2">' +
                                    '<span class="svg-icon svg-icon-3x svg-icon-primary">' +
                                    '<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">' +
                                    '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">' +
                                    '<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />' +
                                    '<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />' +
                                    '</svg>' +
                                    '</g>' +
                                    '</span>' +
                                    '</span>' +
                                    '</div>' +
                                    '<div class="d-flex justify-content-start flex-column">' +
                                    '<a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 fs-6">' +
                                    full.full_name_client +
                                    '</a>' +
                                    '<span class="text-muted font-weight-bolder text-muted d-block fs-7">' +
                                    '<div class="min-w-125px pe-2">N Client: ' +
                                    '<span class="fs-8 m-1">' +
                                    full.numb_cli +
                                    '</span>' +
                                    '</div>' +
                                    '<div class="min-w-125px pe-2">Tel: ' +
                                    '<span class="label label-light-primary label-inline fs-8 m-1">' + full
                                    .first_phone +
                                    '</span>' +
                                    '</div>' +
                                    '</span>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';
                            }
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
                                case "Non remboursé":
                                    label = "label-light-danger";
                                    break;
                                case "Remboursement partiel":
                                    label = "label-light-warning";
                                    break;
                                default:
                                    label = "label-light-success";
                            }

                            if (typeof value === 'undefined') {
                                return value;
                            }
                            status = status + ' ' + '<span class="label fs-7 m-1 ' + label +
                                ' label-inline">' +
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
                            return '<span class=" label label-light-success label-inline fs-6">' +
                                data.toLocaleString('fr') +
                                '</span>' +
                                '<span class="label label-light-primary label-inline fs-8 m-1">' +
                                full
                                .status_news_versement + '</span>';
                        }
                    },

                    // {
                    //     data: 'penality2',
                    //     name: 'penality2',
                    //     render: function render(data, type, full, meta) {
                    //         // if (full.versements_date_limite_paiement_depassee && full.versements_ayant_reste_payer) {

                    //         if (full.reste_apaye == 0) {
                    //             return '<span class=" label label-light-success label-inline fs-6">' + full
                    //                 .penality2.toLocaleString('fr') + ' Fcfa' + '</span>' +
                    //                 '<span class="label label-light-primary label-inline fs-8 m-1"> Retard: ' +
                    //                 full.joursApresDateLimite + ' jrs</span>';
                    //         } else {
                    //             return '<span class=" label label-light-success label-inline fs-6">' + full
                    //                 .penality.toLocaleString('fr') + ' Fcfa' + '</span>' +
                    //                 '<span class="label label-light-primary label-inline fs-8 m-1"> Retard: ' +
                    //                 full.joursApresDateLimite + ' jrs</span>';
                    //         }
                    //     }
                    // }

                    {
                        data: 'penalite',
                        name: 'penalite',

                        render: function render(data, type, full, meta) {
                        var status = ' ';
                        var label;
                        var value = data;
                        switch (value) {
                            case full.reste_apaye = 0:
                            return '<span class=" label label-light-success label-inline fs-6">' + full
                        //             .penality.toLocaleString('fr') + ' Fcfa' + '</span>' +
                        //             '<span class="label label-light-primary label-inline fs-8 m-1"> Retard: ' +
                        //             full.joursApresDateLimite + ' jrs</span>';
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

                        // render: function render(data, type, full, meta) {

                        //     if ( full.versements_ayant_reste_payer && full
                        //         .versements_date_limite_paiement_depassee) {
                        //         return '<span class=" label label-light-success label-inline fs-6">' + full
                        //             .penality.toLocaleString('fr') + ' Fcfa' + '</span>' +
                        //             '<span class="label label-light-primary label-inline fs-8 m-1"> Retard: ' +
                        //             full.joursApresDateLimite + ' jrs</span>';
                                
                        //     } else if (full.reste_apaye == 0 ) {
                        //         return '<span class=" label label-light-success label-inline fs-6">' + full
                        //             .penality2.toLocaleString('fr') + ' Fcfa' + '</span>' +
                        //             '<span class="label label-light-primary label-inline fs-8 m-1"> Retard: ' +
                        //             full.joursApresDateLimite + ' jrs</span>';
                                
                        //     } else {
                        //         return '<span class=" label label-light-success label-inline fs-6">' +
                        //             data +
                        //             '</span>';
                        //     }


                            
                        // }
                    },

                    {
                        data: 'somme_verse',
                        name: 'somme_verse',
                        render: function render(data, type, full, meta) {
                            return '<span class=" label label-light-warning label-inline fs-6">' +
                                data
                                .toLocaleString('fr') + '</span>' +
                                '<span class="text-muted font-weight-bolder label-inline text-muted d-block fs-9">Date Op: ' +
                                full
                                .updated_at + '</span>'
                        }

                    },

                    {
                        data: 'reste_apaye',
                        name: 'reste_apaye',
                        render: function render(data, type, full, meta) {
                            return '<span class=" label label-light-warning label-inline fs-6">' +
                                data
                                .toLocaleString('fr') + '</span>' +
                                '<span class="text-muted font-weight-bolder label-inline text-muted d-block fs-9">Date Rbsmt: ' +
                                full
                                .date_limite + '</span>'
                        }
                    },

                    {
                        name: 'actions',
                        data: 'actions'
                    }
                ]

                ,
        });
    </script>
@endsection
