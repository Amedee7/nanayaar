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
                                <span class="card-label font-weight-bolder text-dark">New
                                    Arrivals</span>
                                <span class="text-muted mt-3 font-weight-bold font-size-sm">More than
                                    400+ new members</span>
                            </h3>
                            <div class="card-toolbar">
                                <a href="#" class="btn btn-success font-weight-bolder font-size-sm"><span
                                        class="svg-icon svg-icon-md svg-icon-white">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path
                                                    d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path
                                                    d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                    fill="#000000" fill-rule="nonzero" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>Add New Member</a>
                            </div>
                        </div>
                        <!--end::Header-->

                        <!--begin::Body-->
                        <div class="card-body pt-0 pb-3">
                            <!--begin::Table-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <div class="card-header border-0">
                                    <div class="card-title">
                                        <h2>Liste des commandes effectuées</h2>
                                    </div>
                                    <div class="card-toolbar">
                                        <a href="#" class="btn btn-sm btn-flex btn-light-primary">
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"></rect>
                                                    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black"></rect>
                                                    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black"></rect>
                                                </svg>
                                            </span>
                                            Effectuer une commande
                                        </a>
                                    </div>
                                </div>
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
                                                <tbody class="fs-6 fw-bold text-gray-600">
                                                    @foreach($clients as $item)
                                                        <tr class="odd">
                                                            <td>
                                                                <span class="badge badge-light-success">{{$item->numb}}</span>
                                                                <span class="text-muted fw-bold text-muted d-block fs-9">Créée: {{$item->created_at}}</span>
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-light-{{$item->status=='Paiement partiel'?'warning':'success'}}">{{$item->status}}</span>
                                                            </td>
                                                            <td class="text-success">{{number_format($item->amount_total,0, '.',' ')}}</td>
                                                            <td class="text-danger">{{number_format($item->amount_rule,0, '.',' ')}}</td>
                                                            <td class="pe-0 text-end">
                                                            <a href="#" title="Actions" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                                <span class="svg-icon svg-icon-muted svg-icon-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3" d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z" fill="black"/>
                                                                    <path d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z" fill="black"/>
                                                                    </svg>
                                                                </span>
                                                            </a>
                                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                                                @if($item->status == "Paiement partiel")
                                                                <div class="menu-item px-3">
                                                                    <a onclick="showRecord('{{route('stocks.outer.rule', $item->id)}}')"  class="menu-link px-3">Régler</a>
                                                                </div>
                                                                @endif
                                                                <div class="menu-item px-3">
                                                                    <a onclick="showRecord('{{route('stocks.outer.show', $item->id)}}')" class="menu-link px-3">Détails</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
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
