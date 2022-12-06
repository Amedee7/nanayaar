@extends('layouts.app')
@section('title', 'Clients - Détails du client')
@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">
            <!--begin::Profile 4-->
            <div class="d-flex flex-row">
                <!--begin::Aside-->
                <div class="flex-row-auto offcanvas-mobile w-300px w-xl-350px" id="kt_profile_aside">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b">
                        <!--begin::Body-->
                        <div class="card-body pt-4">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end">
                                <div class="dropdown dropdown-inline">
                                    <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ki ki-bold-more-hor"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                        <!--begin::Navigation-->
                                        <ul class="navi navi-hover py-5">
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon"><i class="flaticon2-drop"></i></span>
                                                    <span class="navi-text">New Group</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon"><i class="flaticon2-list-3"></i></span>
                                                    <span class="navi-text">Contacts</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <!--end::Navigation-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Toolbar-->

                            <!--begin::User-->
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                                    <div class="symbol-label"
                                        style="background-image:url('{{ asset('custom/clients/' . $client->photo . '') }}')">
                                    </div>
                                    <i class="symbol-badge bg-success"></i>
                                </div>
                                <div>
                                    <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">
                                        {{ $client->name }} {{ $client->lastname }}
                                        <div class="text-muted">
                                            Numero client: {{ $client->numb_cli }}
                                        </div>
                                        <div class="mt-2">
                                            <a href="#"
                                                class="btn btn-sm btn-primary font-weight-bold mr-2 py-2 px-3 px-xxl-5 my-1">Modifier</a>
                                        </div>
                                </div>
                            </div>
                            <!--end::User-->

                            <!--begin::Contact-->
                            <div class="pt-8 pb-6">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">Email:</span>
                                    <a href="#" class="text-muted text-hover-primary">{{ $client->numb_cli }}</a>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">Phone 1:</span>
                                    <span class="text-muted">{{ $client->first_phone }}</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">Phone 2:</span>
                                    <span class="text-muted">{{ $client->second_phone }}</span>
                                </div>

                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">Date de naissance:</span>
                                    <span class="text-muted">{{ $client->date_naiss }}</span>
                                </div>

                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">Numero CNIB:</span>
                                    <span class="text-muted">{{ $client->numb_cnib }}</span>
                                </div>
                            </div>
                            <!--end::Contact-->

                            <a href="#">
                                @if ($client->status == 'En attente')
                                    <span
                                        class="btn btn-primary btn-shadow-hover font-weight-bolder w-100 py-3">{{ $client->status }}</span>
                                @elseif($client->status === 'Accepté')
                                    <span
                                        class="btn btn-success btn-shadow-hover font-weight-bolder w-100 py-3">{{ $client->status }}</span>
                                @elseif($client->status === 'Rejeté')
                                    <span
                                        class="btn btn-danger btn-shadow-hover font-weight-bolder w-100 py-3">{{ $client->status }}</span>
                                @endif
                            </a>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->

                </div>
                <!--end::Aside-->

                <!--begin::Content-->
                <div class="flex-row-fluid ml-lg-8">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-lg-12">
                            <!--begin::Mixed Widget 5-->
                            <div class="card pt-6 mb-3 mb-xl-9">
                                <div class="card-body pt-0 row">
                                    <div class="col-xl-4">
                                        <div class="d-flex h-70 align-items-center">
                                            <div class="w-100 d-flex flex-column flex-center border-dashed bg-light bg-opacity-75 py-6 px-10">
                                                <div class=" text-center">
                                                    <h1 class="text-dark fw-boldest">Montant demandé</h1>
                                                    <div class="text-center">
                                                        <span class="fs-2x font-weight-bold font-size-h2 text-danger" >{{number_format($client->montant_demande,0, '.',' ')}}</span>
                                                        <span class="fs-7 fw-bold opacity-50">Fcfa</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="d-flex h-70 align-items-center">
                                            <div class="w-100 d-flex flex-column flex-center border-dashed bg-light bg-opacity-75 py-6 px-10">
                                                <div class=" text-center">
                                                    <h1 class="text-dark fw-boldest">Commission versé</h1>
                                                    <div class="text-center">
                                                        <span class="fs-2x font-weight-bold font-size-h2 text-warning">{{number_format($client->commission_averse,0, '.',' ')}}</span>
                                                        <span class="fs-7 fw-bold opacity-50">Fcfa</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="d-flex h-70 align-items-center">
                                            <div class="w-100 d-flex flex-column flex-center border-dashed bg-light bg-opacity-75 py-6 px-10">
                                                <div class="text-center">
                                                    <h1 class="text-dark fw-boldest">Somme renboursé</h1>
                                                    <div class="text-center">
                                                        <span class="fs-2x font-weight-bold font-size-h2 text-success">{{number_format($client->commission_averse,0, '.',' ')}}</span>
                                                        <span class="fs-7 fw-bold opacity-50">Fcfa</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Mixed Widget 5-->
                        </div>
                    </div>
                    <!--end::Row-->

                    <!--begin::Advance Table Widget 8-->
                    <div class="card card-custom gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 py-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark">Liste des versements effectués</span>
                            </h3>
                            <div class="card-toolbar">
                                <a href="#" class="btn btn-success font-weight-bolder font-size-sm">
                                        <i class="menu-bullet menu-bullet-dot"></i>
                                        <!--end::Svg Icon-->
                                    Effectuer un versement</a>
                            </div>
                        </div>
                        <!--end::Header-->

                        <!--begin::Body-->
                        <div class="card-body pt-0 pb-3">
                            <!--begin::Table-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <div class="card-body pt-0 pb-5">
                                    <!--begin::Table-->
                                    <div id="kt_table_customers_payment_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="table-responsive">
                                            <table class="table align-middle table-row-dashed gy-5 dataTable no-footer" id="evote-datatable">
                                                <thead class="border-bottom border-gray-200 fs-7 fw-bolder">
                                                    <tr class="text-start text-muted text-uppercase gs-0">
                                                    <th class="min-w-100px sorting" >N COMMANDE</th>
                                                    <th class="sorting">STATUT</th>
                                                    <th class="sorting">MONTANT</th>
                                                    <th class=" sorting">RESTE</th>
                                                    <th class="text-end  pe-4 sorting_disabled">ACTIONS</th>
                                                </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Advance Table Widget 8-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Profile 4-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->

    <div id="evote-modal-container"></div>
    <form>
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    </form>
@endsection

@section('js')
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        $('#evote-datatable').DataTable({
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
        });
    </script>
@endsection
