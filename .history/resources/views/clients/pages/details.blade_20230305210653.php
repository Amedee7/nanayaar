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
                                    <span class="text-muted">{{ date_format(new \DateTime($client->date_naiss), 'd-m-Y') }}</span>
                                </div>

                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">N CNIB:</span>
                                    <span class="text-muted">{{ $client->numb_cnib }}</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">Date de delivrance:</span>
                                    <span class="text-muted">{{ date_format(new \DateTime($client->date_delivered), 'd-m-Y') }}</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">Date d'expiration:</span>
                                    <span class="text-muted">{{ date_format(new \DateTime($client->date_expired), 'd-m-Y') }}</span>
                                </div>
                            </div>
                            <!--end::Contact-->

                            <!--begin::Separator-->
                            <div class="separator separator-solid my-7"></div>
                            <!--end::Separator-->
                            <div>
                                <div class="font-weight-bold mr-2">Raison de l'emprunt</div>
                                <!--begin::Description-->
                                <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">
                                    {{ $client->raison_pret }}.
                                </div>
                                <!--end::Description-->
                                
                                <!--begin::Separator-->
                                <div class="separator separator-solid my-7"></div>
                                <!--end::Separator-->

                                <div class="font-weight-bold mr-2">Activité du client</div>
                                <!--begin::Description-->
                                <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">
                                    {{ $client->activity_client }}.
                                </div>
                                <!--end::Description-->

                            </div>
                            <div class="mt-10">
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
                                <h1 class="mr">Etat </h1>
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
                                                        <th class="sorting">Dt. REMBOURSEMENT</th>
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
                                                                        class="label label-lg label-light-danger label-inline">Non
                                                                        remboursé</span>
                                                                @elseif ($versement->status === 'Remboursé')
                                                                    <span
                                                                        class="label label-lg label-light-success label-inline">Remboursé</span>
                                                                @else
                                                                    <span
                                                                        class="label label-lg label-light-primary label-inline">Remboursement
                                                                        partiel</span>
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
                                                                    {{ number_format($versement['montant_octroye'], 0, '.', ' ') }}

                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                                    {{ number_format($versement['commission_verse'], 0, '.', ' ') }}

                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                                    {{ number_format($versement['somme_verse'], 0, '.', ' ') }}

                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                                    {{ number_format($versement['reste_apaye'], 0, '.', ' ') }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span class="text-muted font-weight-bold">
                                                                    {{ date_format(new \DateTime($versement->debut), 'd-m-Y à H:i') }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span class="text-muted font-weight-bold">
                                                                    {{ date_format(new \DateTime($versement->fin), 'd-m-Y à H:i') }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span class="text-muted font-weight-bold">
                                                                    {{ date_format(new \DateTime($versement->created_at), 'd-m-Y à H:i') }}
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
    <script></script>
@endsection
