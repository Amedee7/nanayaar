@extends('layouts.app')
@section('title', 'Administration - Liste des clients en retards')
@section('content')

<div class="d-flex flex-column-fluid">
    <div class="container col-md-12">
        <div class="card card-custom">
            <!--begin::Card header-->
            <div class="card card-custom card-stretch gutter-b">
                <div class="d-flex align-items-center mb-9 bg-light-primary rounded p-5">
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
                        <h2 class="mb-1">Gestion des clients en retards</h2>
                        <div class="text-muted fw-bolder">
                            Effectuée par: <a href="#">{{ Auth::user()->lastname }}
                                {{ Auth::user()->firstname }}</a>
                        </div>
                    </div>
                    <!--end::Title-->
                </div>
            </div>
            <!--end::Card header-->
            {{-- <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">
                        <span class="flaticon-list icon-lg primary-color"></span>
                        Liste des clients
                    </h3>
                </div>
                <div class="card-toolbar">
                    <h5 class="text-dark font-weight-bolder my-1 mr-5">
                        <a href="{{ route('clients.create') }}" class="btn btn-primary">
                            <span class=" fas fa-user-plus">
                            </span> Ajouter un client</a>
                    </h5>
                    <!--begin::Lable-->
                    <span class="font-weight-bolder text-warning py-1 font-size-lg">
                        @if (request()->has('trashed'))
                            <a href="{{ route('clients.restoreAll') }}" class="btn btn-success"> <i
                                    class="fas fa-undo"></i>Rejenerer les clients supprimés</a>
                        @else
                            <a href="{{ route('clients.index', ['trashed' => 'client']) }}" class="btn btn-warning">Voir
                                les clients supprimés</a>
                        @endif
                    </span>
                    <!--end::Lable-->
                </div>
            </div> --}}

            <div class="card-body">
                <input style="border: solid black;" data-table="table-clients" placeholder="Rechercher un client"
                    type="text" class="light-table-filter form-control form-control-lg mb-3">
                <div id="client-datatable" class="table-responsive">
                    <table class="table table-clients font-weight-bolder table-bordered table-head-custom table-head-bg table-vertical-center" id="o2d-datatable">
                        <thead>
                        <tr>
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
                        @foreach ($versements as $key => $item)
                            @if ($item->fin <= now() and $item->status != 'Remboursé')
                                <tr>
                                    <td>
                                        {{ $key + 1 }}
                                    </td>
                                    <td>
                                        <div style="background-color:rgb(255, 0, 0);" class="p-2">

                                        <span style="width: 250px;">
                                            <div class="d-flex align-items-center">
                                                {{-- <div class="symbol symbol-40 symbol-sm flex-shrink-0">
                                            <img src="{{ asset('custom/clients/' . $item->photo . '') }}" alt="">
                                        </div> --}}

                                                <div class="symbol symbol-40 symbol-light-success flex-shrink-0">
                                                    <span
                                                        class="symbol-label font-size-h2 font-weight-bold">{{ Str::limit($item->client->name, 1, '') }}</span>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="ml-4">
                                                        <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">
                                                            {{ $item->client->name }}
                                                            {{ $item->client->lastname }}
                                                        </div>
                                                        <a class="text-muted font-weight-bolder primary-color">N Client:
                                                            <span
                                                                class="font-weight-boldest text-success">{{ $item->client->numb_cli }}</span>
                                                        </a> <br>
                                                        <a class="text-muted font-weight-bolder primary-color">Tel: <span
                                                                class="font-weight-boldest text-success">{{ $item->client->first_phone }}</span>
                                                        </a>
                                                    </div>
                                                </div>
                                        </span></div>
                                    </td>

                                    <td>
                                        <span style="width: 250px;">
                                            <div class="d-flex align-items-center">
                                                <div class="ml-4">
                                                    <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">
                                                        @if ($item->status == 'Remboursé')
                                                            <span
                                                                class="label label-light-success label-inline">{{ $item->status }}</span>
                                                        @elseif($item->status == 'Remboursement partiel')
                                                            <span
                                                                class="label label-light-warning label-inline">{{ $item->status }}</span>
                                                        @elseif($item->status == 'Non remboursé')
                                                            <span
                                                                class="label label-light-danger label-inline">{{ $item->status }}</span>
                                                        @endif
                                                </div>
                                                    <span
                                                        class="text-muted font-weight-bolder label-inline text-muted d-block fs-9">Dt
                                                        déblocage:
                                                        {{ date_format(new \DateTime($item->debut), 'd-m-Y à H:i') }}</span>
                                                </div>
                                            </div>
                                        </span>
                                    </td>

                                    <td>
                                        <span style="width: 250px;">
                                            <div class="d-flex align-items-center">
                                                <div class="ml-0">
                                                    <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">
                                                        <span
                                                            class="font-weight-boldest text-success">{{ number_format($item->montant_octroye) }}
                                                        </span>
                                                        <a class="text-muted font-weight-bolder primary-color"><em
                                                                class="font-size-h6 opacity-50">Fcfa</em></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </span>
                                    </td>
                                    <td>
                                        <span style="width: 250px;">
                                            <div class="d-flex align-items-center">
                                                <div class="ml-0">
                                                    <div class="text-dark-75 font-weight-bolder fs-7 mb-0">
                                                        {{ Str::limit($item->penalite) }}
                                                    </div>
                                                    <span
                                                        class="text-muted font-weight-bolder label-inline text-muted d-block fs-9">Date
                                                        Rbsmt:
                                                        {{ date_format(new \DateTime($item->fin), 'd-m-Y') }}</span>
                                                </div>

                                            </div>
                                        </span>
                                    </td>
                                    <td>
                                        <span style="width: 250px;">
                                            <div class="d-flex align-items-center">
                                                <div class="ml-0">
                                                    <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">
                                                        <span
                                                            class="font-weight-boldest text-success">{{ number_format($item->somme_verse) }}
                                                        </span>
                                                        <a class="text-muted font-weight-bolder primary-color"><em
                                                                class="font-size-h6 opacity-50">Fcfa</em></a>
                                                    </div>
                                                    <span
                                                        class="text-muted font-weight-bolder label-inline text-muted d-block fs-9">Date
                                                        Op:
                                                        {{ date_format(new \DateTime($item->updated_at), 'd-m-Y') }}</span>
                                                </div>
                                            </div>
                                        </span>
                                    </td>
                                    
                                    <td>
                                        <span style="width: 250px;">
                                            <div class="d-flex align-items-center">
                                                <div class="ml-0">
                                                    <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">
                                                        <span
                                                            class="font-weight-boldest text-success">{{ number_format($item->reste_apaye) }}
                                                        </span>
                                                        <a class="text-muted font-weight-bolder primary-color"><em
                                                                class="font-size-h6 opacity-50">Fcfa</em></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </span>
                                    </td>

                                    <td>
                                        @if (request()->has('trashed'))
                                            @permission('versement-creer')
                                                <a href="{{ route('clients.restore', $item->id) }}"
                                                    class="btn btn-success">Restore</a>
                                            @endpermission
                                        @else
                                            @permission('versement-lire')
                                                <a onclick="editRecord('{{ route('versements.show', $item->id) }}')"
                                                    title="Détails" class="btn btn-primary btn-sm restore"><span
                                                        class="flaticon-eye"></span></a>
                                            @endpermission
                                            @permission('versement-supprimer')
                                                <button
                                                    onclick="deleteRecordConfirm('{{ route('versements.delete', $item->id) }}')"
                                                    class="btn btn-outline-danger btn-sm"><span
                                                        class="flaticon2-trash"></span></button>
                                            @endpermission
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div class="d-flex flex-wrap py-2 mr-3">
                    {{ $versements->links() }}
                </div>
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
    <script src="{{ asset('js/script.js') }}"></script>
    <script></script>
@endsection
