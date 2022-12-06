@extends('layouts.app')
@section('title', 'Clients - Détails du client')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div id="kt_header" style="" class="header align-items-stretch">
            <div class="header-brand">
                <a href="{{ route('home') }}">
                    <h3 style="color: white;" class="text-center">NANA YAAR</h3>
                </a>
                <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-minimize"
                    data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
                    data-kt-toggle-name="aside-minimize">
                    <span class="svg-icon svg-icon-1 me-n1 minimize-default">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect opacity="0.3" x="8.5" y="11" width="12" height="2" rx="1"
                                fill="black"></rect>
                            <path
                                d="M10.3687 11.6927L12.1244 10.2297C12.5946 9.83785 12.6268 9.12683 12.194 8.69401C11.8043 8.3043 11.1784 8.28591 10.7664 8.65206L7.84084 11.2526C7.39332 11.6504 7.39332 12.3496 7.84084 12.7474L10.7664 15.3479C11.1784 15.7141 11.8043 15.6957 12.194 15.306C12.6268 14.8732 12.5946 14.1621 12.1244 13.7703L10.3687 12.3073C10.1768 12.1474 10.1768 11.8526 10.3687 11.6927Z"
                                fill="black"></path>
                            <path opacity="0.5"
                                d="M16 5V6C16 6.55228 15.5523 7 15 7C14.4477 7 14 6.55228 14 6C14 5.44772 13.5523 5 13 5H6C5.44771 5 5 5.44772 5 6V18C5 18.5523 5.44771 19 6 19H13C13.5523 19 14 18.5523 14 18C14 17.4477 14.4477 17 15 17C15.5523 17 16 17.4477 16 18V19C16 20.1046 15.1046 21 14 21H5C3.89543 21 3 20.1046 3 19V5C3 3.89543 3.89543 3 5 3H14C15.1046 3 16 3.89543 16 5Z"
                                fill="black"></path>
                        </svg>
                    </span>
                    <span class="svg-icon svg-icon-1 minimize-active">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect opacity="0.3" width="12" height="2" rx="1"
                                transform="matrix(-1 0 0 1 15.5 11)" fill="black"></rect>
                            <path
                                d="M13.6313 11.6927L11.8756 10.2297C11.4054 9.83785 11.3732 9.12683 11.806 8.69401C12.1957 8.3043 12.8216 8.28591 13.2336 8.65206L16.1592 11.2526C16.6067 11.6504 16.6067 12.3496 16.1592 12.7474L13.2336 15.3479C12.8216 15.7141 12.1957 15.6957 11.806 15.306C11.3732 14.8732 11.4054 14.1621 11.8756 13.7703L13.6313 12.3073C13.8232 12.1474 13.8232 11.8526 13.6313 11.6927Z"
                                fill="black"></path>
                            <path
                                d="M8 5V6C8 6.55228 8.44772 7 9 7C9.55228 7 10 6.55228 10 6C10 5.44772 10.4477 5 11 5H18C18.5523 5 19 5.44772 19 6V18C19 18.5523 18.5523 19 18 19H11C10.4477 19 10 18.5523 10 18C10 17.4477 9.55228 17 9 17C8.44772 17 8 17.4477 8 18V19C8 20.1046 8.89543 21 10 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H10C8.89543 3 8 3.89543 8 5Z"
                                fill="#C4C4C4"></path>
                        </svg>
                    </span>
                </div>
                <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
                    <div class="btn btn-icon btn-active-color-primary w-30px h-30px" id="kt_aside_mobile_toggle">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                    fill="black"></path>
                                <path opacity="0.3"
                                    d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                    fill="black"></path>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            <div class="toolbar">
                <div
                    class="container-fluid py-6 py-lg-0 d-flex flex-column flex-lg-row align-items-lg-stretch justify-content-lg-between">
                    <div class="page-title d-flex flex-column me-5">
                        <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
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
                                Détails du client
                            </span>
                        </h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('home') }}" class="text-muted text-hover-primary">Tableau de bord</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-200 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-dark">Détails du client</li>
                        </ul>
                    </div>
                    <div class="d-flex align-items-center overflow-auto pt-3 pt-lg-0">
                        <div class="d-flex align-items-center">
                            <span class="fs-7 text-gray-700 fw-bolder pe-3 d-none d-xxl-block">{{ Auth::user()->lastname }}
                                {{ Auth::user()->firstname }}</span>
                            <div class="d-flex">
                                <a class="btn btn-sm btn-icon btn-icon-muted btn-active-icon-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_invite_friends">
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z"
                                                fill="black"></path>
                                            <path
                                                d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z"
                                                fill="black"></path>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class=" container-xxl">
                <div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-6"
                    style="background-size: auto calc(100% + 10rem); background-position-x: 100%; background-image: url('http://127.0.0.1:8000/assets/media/illustrations/sketchy-1/4.png')">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-circle me-5">
                                <div
                                    class="symbol-label bg-transparent text-primary border border-secondary border-dashed">
                                    <span class="svg-icon svg-icon-2x svg-icon-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                d="M20 21H3C2.4 21 2 20.6 2 20V10C2 9.4 2.4 9 3 9H20C20.6 9 21 9.4 21 10V20C21 20.6 20.6 21 20 21Z"
                                                fill="black"></path>
                                            <path
                                                d="M20 7H3C2.4 7 2 6.6 2 6V3C2 2.4 2.4 2 3 2H20C20.6 2 21 2.4 21 3V6C21 6.6 20.6 7 20 7Z"
                                                fill="black"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex flex-column">
                                <h2 class="mb-1">Détail du client</h2>
                                <div class="text-muted fw-bolder">
                                    <a href="{{ route('clients.index') }}">Retour à la liste</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column flex-xl-row">
                    <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
                        <div class="card mb-5 mb-xl-8">
                            <div class="card-body pt-15">
                                <div class="d-flex flex-center flex-column mb-5">
                                    <div class="symbol symbol-100px symbol-circle mb-7">
                                        <span class="svg-icon svg-icon-5x svg-icon-primary ms-n2 me-3">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                    <path
                                                        d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                    <path
                                                        d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                        fill="#000000" fill-rule="nonzero"></path>
                                                </g>
                                            </svg>
                                        </span>
                                    </div>
                                    <a href="#"
                                        class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-1">{{ $client->name }}</a>
                                    <div class="d-flex flex-wrap flex-center">
                                        <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                            <div class="fs-4 fw-bolder text-gray-700">
                                                <span class="w-50px">Date de création: {{ $client->created_at }}</span>
                                            </div>
                                            <div class="fw-bold text-muted">Par: {{ $client->full_name }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-stack fs-4 py-3">
                                    <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse"
                                        href="#kt_customer_view_details" role="button" aria-expanded="false"
                                        aria-controls="kt_customer_view_details">Détails
                                        <span class="ms-2 rotate-180">
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                        fill="black"></path>
                                                </svg>
                                            </span>
                                        </span>
                                    </div>
                                    <span data-bs-toggle="tooltip" data-bs-trigger="hover" title=""
                                        data-bs-original-title="Modifier les informations du client">
                                        <a onclick="editRecord('{{ route('clients.edit', $client->id) }}')"
                                            class="btn btn-sm btn-light-primary">Modifier</a>
                                    </span>
                                </div>
                                <div class="separator separator-dashed my-3"></div>
                                <div id="kt_customer_view_details" class="collapse show">
                                    <div class="py-5 fs-6">
                                        <div class="fw-bolder mt-5">Statut</div>
                                        <div class="text-gray-600">
                                            @if ($item->status == 'En attente')
                                                <span
                                                    class="label font-weight-bolder label-lg label-primary label-inline">{{ $item->status }}</span>
                                            @elseif($item->status === 'Accepté')
                                                <span
                                                    class="label font-weight-bolder label-lg label-success label-inline">{{ $item->status }}</span>
                                            @elseif($item->status === 'Rejeté')
                                                <span
                                                    class="label font-weight-bolder label-lg label-danger label-inline">{{ $item->status }}</span>
                                            @endif
                                            <span
                                                class="badge badge-light-{{ $client->status == 'En attente' ? 'success' : 'danger' }}">{{ $client->status }}</span>
                                        </div>

                                        <div class="fw-bolder mt-5">Numero du client</div>
                                        <div class="text-gray-600">{{ $client->numb_cli }}</div>

                                        <div class="fw-bolder mt-5">Numero CNIB</div>
                                        <div class="text-gray-600">{{ $client->numb_cnib }}</div>

                                        <div class="fw-bolder mt-5">Numero de téléphone</div>
                                        <div class="text-gray-600">{{ $client->first_phone }}</div>

                                        <div class="fw-bolder mt-5">Adresse</div>
                                        <div class="text-gray-600">{{ $client->second_phone }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-lg-row-fluid ms-lg-15">
                        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
                            <!--begin:::Tab item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                    href="#kt_customer_view_overview_tab">Aperçu</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true"
                                    data-bs-toggle="tab" href="#kt_customer_view_overview_statements">Autres</a>
                            </li>

                            <li class="nav-item ms-auto">
                                <a href="#" class="btn btn-primary btn-sm ps-7" data-kt-menu-trigger="click"
                                    data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">Actions
                                    <span class="svg-icon svg-icon-2 me-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                fill="black"></path>
                                        </svg>
                                    </span>
                                </a>

                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold py-4 w-250px fs-6"
                                    data-kt-menu="true" style="">

                                    <div class="menu-item px-5">
                                        <a onclick="requestAccountStatusRefresh('#')" title="Changer de statut"
                                            class="menu-link px-5">{{ $client->status == 'Actif' ? 'Désactiver' : 'Activer' }}</a>
                                    </div>
                                    <div class="menu-item px-5">
                                        <a href="#" class="menu-link text-danger px-5">Suprimer le client</a>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="kt_customer_view_overview_tab" role="tabpanel">

                                <div class="card pt-6 mb-3 mb-xl-9">
                                    <div class="card-body pt-0 row">
                                        <div class="col-xl-4">
                                            <div class="d-flex h-70 align-items-center">
                                                <div
                                                    class="w-100 d-flex flex-column flex-center border-dashed bg-light bg-opacity-75 py-6 px-10">
                                                    <div class=" text-center">
                                                        <h1 class="text-dark fw-boldest">Crédit</h1>
                                                        <div class="text-gray-400 fw-bold ">Somme à payer</div>
                                                        <div class="text-center">
                                                            <span
                                                                class="fs-2x fw-bolder text-danger">{{ number_format($client->montant_demande, 0, '.', ' ') }}</span>
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
                                                        <h1 class="text-dark fw-boldest">Consignations</h1>
                                                        <div class="text-gray-400 fw-bold">Caisses à remettre</div>
                                                        <div class="text-center">
                                                            <span class="fs-2x fw-bolder text-warning">000/span>
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
                                                        <h1 class="text-dark fw-boldest">Commandes</h1>
                                                        <div class="text-gray-400 fw-bold">Commandes totales</div>
                                                        <div class="text-center">
                                                            {{-- <span class="fs-2x fw-bolder text-success">{{number_format(count($outstock),0, '.',' ')}}</span> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card pt-4 mb-6 mb-xl-9">
                                    <div class="card-header border-0">
                                        <div class="card-title">
                                            <h2>Liste des commandes effectuées</h2>
                                        </div>
                                        <div class="card-toolbar">
                                            <a href="#" class="btn btn-sm btn-flex btn-light-primary">
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2"
                                                            width="20" height="20" rx="5" fill="black">
                                                        </rect>
                                                        <rect x="10.8891" y="17.8033" width="12"
                                                            height="2" rx="1"
                                                            transform="rotate(-90 10.8891 17.8033)" fill="black"></rect>
                                                        <rect x="6.01041" y="10.9247" width="12"
                                                            height="2" rx="1" fill="black"></rect>
                                                    </svg>
                                                </span>
                                                Effectuer une commande
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0 pb-5">
                                        <!--begin::Table-->
                                        <div id="kt_table_customers_payment_wrapper"
                                            class="dataTables_wrapper dt-bootstrap4 no-footer">
                                            <div class="table-responsive">
                                                <table class="table align-middle table-row-dashed gy-5 dataTable no-footer"
                                                    id="evote-datatable">
                                                    <thead class="border-bottom border-gray-200 fs-7 fw-bolder">
                                                        <tr class="text-start text-muted text-uppercase gs-0">
                                                            <th class="min-w-100px sorting">N COMMANDE</th>
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
                            </div>

                            <div class="tab-pane fade" id="kt_customer_view_overview_statements" role="tabpanel">
                                <div class="d-flex flex-wrap flex-center">
                                    <div class="border border-gray-300 border-dashed-6 rounded py-3 px-3 mb-3">
                                        <div class="fs-4 fw-bolder text-danger">
                                            <span class="w-50px">Comming soon...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

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
