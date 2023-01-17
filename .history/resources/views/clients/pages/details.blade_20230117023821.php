@extends('layouts.app')
@section('title', 'Clients - Détails du client')
@section('content')
    <div class="mb-3 container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center">
            <div class="btn-group dropup">
                <div class="btn-group dropup">
                    <a class="btn btn-primary" href="{{ route('clients.index') }}"><span class="flaticon-up-arrow-1"></span>
                        Retour à la liste des clients</a>
                </div>
            </div>
        </div>
    </div>
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
                                    @permission('client-modifier')
                                        @if ($client->status_updated_or_not == 0)
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold py-4 w-250px fs-6"
                                                    data-kt-menu="true" style="">

                                                    <div class="menu-item px-5">
                                                        <a href="{{ route('clients.edit', $client->id) }}"
                                                            class="btn btn-primary btn-sm"> <span
                                                                class="far fa-edit"></span>Modifier</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endpermission
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
                                            N client: {{ $client->numb_cli }}
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--end::User-->

                            <!--begin::Contact-->
                            <div class="pt-8 pb-6">
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
                                    <span class="font-weight-bold mr-2">N CNIB:</span>
                                    <span class="text-muted">{{ $client->numb_cnib }}</span>
                                </div>
                            </div>
                            <!--end::Contact-->

                            <div class="">
                                <a href="#">
                                    @if ($client->status == 'Rejeté')
                                        <span
                                            class="btn btn-light-danger font-weight-bold py-3 px-6 mb-2 text-center btn-block">Rejeté</span>
                                    @elseif ($client->status === 'Accepté')
                                        <span
                                            class="btn btn-light-success font-weight-bold py-3 px-6 mb-2 text-center btn-block">Accepté</span>
                                    @else
                                        <span
                                            class="btn btn-light-primary font-weight-bold py-3 px-6 mb-2 text-center btn-block">En
                                            attente</span>
                                    @endif
                                </a>
                            </div>
                            @permission('client-status')
                                @if ($client->status_updated_or_not == 0)
                                    <div class="btn-group mt-5" role="group">
                                        <button id="btnGroupDrop1" type="button"
                                            class="btn-sm btn btn-dark font-weight-bold dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <span class="flaticon2-gear"></span>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            @if ($client->status == 'Rejeté')
                                                <a class="dropdown-item btn"
                                                    onclick="accepteRecordConfirm('{{ route('clients.accepte', $client->id) }}')"
                                                    title="Accepté"><span class="flaticon2-accept mr-2"></span> Accepté</a>
                                            @endif

                                            @if ($client->status == 'Accepté')
                                                <a class="dropdown-item btn"
                                                    onclick="accepteRecordConfirm('{{ route('clients.rejete', $client->id) }}')"
                                                    title="Rejeté"><span class="flaticon2-delete mr-2"></span> Rejeté</a>
                                            @endif

                                            @if ($client->status == 'Attente')
                                                <a class="dropdown-item btn"
                                                    onclick="accepteRecordConfirm('{{ route('clients.accepte', $client->id) }}')"
                                                    title="Accepté"><span class="flaticon2-accept mr-2"></span> Accepté</a>
                                                <a class="dropdown-item btn"
                                                    onclick="accepteRecordConfirm('{{ route('clients.rejete', $client->id) }}')"
                                                    title="Rejeté"><span class="flaticon2-delete mr-2"></span> Rejeté</a>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            @endpermission

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
                                            <div
                                                class="w-100 d-flex flex-column flex-center border-dashed bg-light bg-opacity-75 py-6 px-10">

                                                <div class=" text-center">
                                                    <h1 class="text-dark fw-boldest">Mt. demandé </h1>
                                                    <div class="text-center">
                                                        <span
                                                            class="fs-2x font-weight-bold font-size-h2 text-info">{{ number_format($client->montant_demande, 0, '.', ' ') }}</span>
                                                        <span class="fs-7 fw-bold opacity-50">Fcfa</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="d-flex h-70 align-items-center">
                                            <div
                                                class="w-100 d-flex flex-column flex-center border-dashed bg-light bg-opacity-75 py-6 px-10">
                                                <div class=" text-center">
                                                    <h1 class="text-dark fw-boldest">Cs. Versée</h1>
                                                    <div class="text-center">
                                                        <span
                                                            class="fs-2x font-weight-bold font-size-h2 text-warning">{{ number_format($client->commission_averse, 0, '.', ' ') }}</span>
                                                        <span class="fs-7 fw-bold opacity-50">Fcfa</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="d-flex h-70 align-items-center">
                                            <div
                                                class="w-100 d-flex flex-column flex-center border-dashed bg-light bg-opacity-75 py-6 px-10">
                                                <div class="text-center">
                                                    <h1 class="text-dark fw-boldest">Sme. Versée</h1>
                                                    <div class="text-center">
                                                        <span
                                                            class="fs-2x font-weight-bold font-size-h2 text-success">{{ number_format($client->amount_credit, 0, '.', ' ') }}</span>
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
                            <div class="table-responsive">
                                <table
                                    class="table table-head-custom table-head-bg table-vertical-center table-borderless">
                                    <thead>
                                        <tr class="bg-gray-100 text-left">
                                            <th style="min-width: 250px" class="pl-7"><span
                                                    class="text-dark-75">products</span></th>
                                            <th style="min-width: 130px">price</th>
                                            <th style="min-width: 120px">deposit</th>
                                            <th style="min-width: 120px">agent</th>
                                            <th style="min-width: 110px">status</th>
                                            <th style="min-width: 110px"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="pl-0 py-8">
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50 flex-shrink-0 mr-4">
                                                        <div class="symbol-label"
                                                            style="background-image: url('assets/media/stock-600x400/img-26.jpg')">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <a href="#"
                                                            class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Sant
                                                            Extreanet Solution</a>
                                                        <span class="text-muted font-weight-bold d-block">HTML,
                                                            JS, ReactJS</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                    $2,790
                                                </span>
                                                <span class="text-muted font-weight-bold">
                                                    Paid
                                                </span>
                                            </td>
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                    $520
                                                </span>
                                                <span class="text-muted font-weight-bold">
                                                    Paid
                                                </span>
                                            </td>
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                    Bradly Beal
                                                </span>
                                                <span class="text-muted font-weight-bold">
                                                    Insurance
                                                </span>
                                            </td>
                                            <td>
                                                <span
                                                    class="label label-lg label-light-primary label-inline">Approved</span>
                                            </td>
                                            <td class="pr-0 text-right">
                                                <a href="#"
                                                    class="btn btn-icon btn-light btn-hover-primary btn-sm mr-3">
                                                    <span class="svg-icon svg-icon-md svg-icon-primary">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Bookmark.svg--><svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24"
                                                                    height="24" />
                                                                <path
                                                                    d="M8,4 L16,4 C17.1045695,4 18,4.8954305 18,6 L18,17.726765 C18,18.2790497 17.5522847,18.726765 17,18.726765 C16.7498083,18.726765 16.5087052,18.6329798 16.3242754,18.4639191 L12.6757246,15.1194142 C12.2934034,14.7689531 11.7065966,14.7689531 11.3242754,15.1194142 L7.67572463,18.4639191 C7.26860564,18.8371115 6.63603827,18.8096086 6.26284586,18.4024896 C6.09378519,18.2180598 6,17.9769566 6,17.726765 L6,6 C6,4.8954305 6.8954305,4 8,4 Z"
                                                                    fill="#000000" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span> </a>
                                                <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                    <span class="svg-icon svg-icon-md svg-icon-primary">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg--><svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                                <rect fill="#000000" opacity="0.3"
                                                                    transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) "
                                                                    x="11" y="5" width="2"
                                                                    height="14" rx="1" />
                                                                <path
                                                                    d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                    fill="#000000" fill-rule="nonzero"
                                                                    transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) " />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span> </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Advance Table Widget 8-->
                    <!--begin::Advance Table Widget 8-->
                    <div class="card card-custom gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 py-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark">Liste des versements effectués</span>
                            </h3>
                            @permission('versement-creer')
                                <div class="card-toolbar">
                                    <a onclick="createRecord('{{ route('versements.create') }}')"
                                        class="btn btn-success font-weight-bolder font-size-sm"><span
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
                                        </span>Effectuer un versement</a>
                                </div>
                            @endpermission
                        </div>
                        <!--end::Header-->

                        <!--begin::Body-->
                        <div class="card-body pt-0 pb-3">
                            <!--begin::Table-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <div class="card-body pt-0 pb-5">
                                    <!--begin::Table-->
                                    <div id="kt_table_customers_payment_wrapper"
                                        class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="table-responsive">
                                            <table
                                                class="table table-head-custom table-head-bg table-vertical-center table-borderless">
                                                <thead>
                                                    <tr class="bg-gray-100 text-left">
                                                        <th class="sorting">Id</th>
                                                        <th class="sorting">N. VERSEMENT</th>
                                                        <th class="sorting">STATUT</th>
                                                        <th class="sorting">ETAT</th>
                                                        <th class="sorting">Mt. DEBLOQUE</th>
                                                        <th class="sorting">Cs. VERSE</th>
                                                        <th class="sorting">Se. VERSE</th>
                                                        <th class="sorting">Rst. A PAYE</th>
                                                        <th class="sorting">Dt. DEBLOCAGE</th>
                                                        <th class="sorting">Dt. </th>
                                                        <th class="sorting">Dt. VERSEMENT</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($client->versements as $versement)
                                                        <tr>
                                                            <td>{{ $versement->id }}</td>
                                                            <td><span
                                                                    class="label label-lg label-light-primary label-inline">{{ $versement->identifier }}</span>
                                                            </td>
                                                            <td>
                                                                @if ($versement->status == 'Non remboursé')
                                                                <span
                                                                    class="label label-lg label-light-danger label-inline">Non remboursé</span>
                                                            @elseif ($versement->status === 'Remboursé')
                                                                <span
                                                                    class="label label-lg label-light-success label-inline">Remboursé</span>
                                                            @else
                                                                <span
                                                                    class="label label-lg label-light-primary label-inline">Remboursement partiel</span>
                                                            @endif
                                                        </td>
                                                            <td>
                                                                <span class="text-muted font-weight-bold">
                                                                    {{ $versement->status_news_versement }}
                                                                </span>
                                                                </td>
                                                            <td>
                                                                <span
                                                                    class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                                    {{ $versement->montant_octroye }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                                    {{ $versement->commission_verse }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                                    {{ $versement->somme_verse }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                                    {{ $versement->reste_apaye }}
                                                                </span>
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
    {{-- </form> --}}
    <div id="o2d-modal-container"></div>
    <form>
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    </form>
@endsection

@section('js')
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        $('#o2d-datatable').DataTable({
            "pageLength": 10,
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
                            data.toLocaleString('fr') + '</span>'
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
                    name: 'actions',
                    data: 'actions'
                }
            ],
        });
    </script>
@endsection
