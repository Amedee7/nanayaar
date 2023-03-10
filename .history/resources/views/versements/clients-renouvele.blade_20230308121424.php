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
                            <h2 class="mb-1">Gestion des renouvèlements</h2>
                            <div class="text-muted fw-bolder">
                                Effectuée par: <a href="#">{{ Auth::user()->lastname }}
                                    {{ Auth::user()->firstname }}</a>
                            </div>
                        </div>
                        <!--end::Title-->
                    </div>
                </div>
                <!--end::Card header-->

                <div id="o2d-modal-container"></div>
                <form>
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                </form>
                <table
                    class="table table-clients font-weight-bolder table-bordered table-head-custom table-head-bg table-vertical-center"
                    id="o2d-datatable">
                    <thead>
                        <tr>
                            <th class="min-w-140px">ID</th>
                            <th class="min-w-140px">CLIENT</th>
                            <th class="min-w-140px">STATUT</th>
                            <th class="min-w-120px">Mt. DEBLOQUE</th>
                            <th class="min-w-120px">PENALITE</th>
                            <th class="min-w-120px">Mt. VERSE</th>
                            <th class="min-w-120px">Cs. VERSE</th>
                            <th class="min-w-120px">Sm. RESTANT</th>
                            <th class="min-w-100px text-end">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($versements as $key => $item)
                            @if ($item->status_news_versement == 'Renouvelé')
                                <tr>
                                    <td>
                                        {{ $key + 1 }}
                                    </td>
                                    <td>
                                        @if ($item->status != 'Remboursé' && $item->nombreJour <= 2)
                                            <div style="background-color:rgb(238, 45, 45);" class="p-2">
                                                <span style="width: 250px;">
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-40 symbol-light-success flex-shrink-0">
                                                            <span
                                                                class="symbol-label font-size-h2 font-weight-bold">{{ Str::limit($item->full_name_client, 1, '') }}</span>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <div class="ml-4">
                                                                <div
                                                                    class="text-dark-75 font-weight-bolder font-size-lg mb-0">
                                                                    {{ $item->full_name_client }}
                                                                </div>
                                                                <a class="text-muted font-weight-bolder primary-color">N
                                                                    Client:
                                                                    <span
                                                                        class="font-weight-boldest text-success">{{ $item->numb_cli }}</span>
                                                                </a> <br>
                                                                <a class="text-muted font-weight-bolder primary-color">Tel:
                                                                    <span
                                                                        class="font-weight-boldest text-success">{{ $item->first_phone }}</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                </span>
                                            </div>
                                        @else
                                            <span style="width: 250px;">
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-40 symbol-light-success flex-shrink-0">
                                                        <span
                                                            class="symbol-label font-size-h2 font-weight-bold">{{ Str::limit($item->full_name_client, 1, '') }}</span>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="ml-4">
                                                            <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">
                                                                {{ $item->full_name_client }}
                                                            </div>
                                                            <a class="text-muted font-weight-bolder primary-color">N
                                                                Client:
                                                                <span
                                                                    class="font-weight-boldest text-success">{{ $item->numb_cli }}</span>
                                                            </a> <br>
                                                            <a class="text-muted font-weight-bolder primary-color">Tel:
                                                                <span
                                                                    class="font-weight-boldest text-success">{{ $item->first_phone }}</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </span>
                                        @endif

                                    </td>

                                    <td>
                                        <span style="width: 250px;">
                                            <div class="d-flex align-items-center">
                                                <div class="ml-4">
                                                    <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">
                                                        <span class="label fs-7 m-1 label-light-success label-inline">
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
                                                        </span>
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
                                                    <span
                                                        class="font-weight-boldest text-success">{{ $item->status_news_versement }}
                                                    </span>
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
                                                        {{ $item->updated_at }}</span>
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
                                                            class="font-weight-boldest text-success">{{ number_format($item->commission_verse) }}
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
                                            <a href="{{ route('clients.restore', $item->id) }}"
                                                class="btn btn-success">Restore</a>
                                        @else
                                            <a onclick="editRecord('{{ route('versements.show', $item->id) }}')"
                                                title="Détails" class="btn btn-primary btn-sm restore"><span
                                                    class="flaticon-eye"></span></a>
                                            <button
                                                onclick="deleteRecordConfirm('{{ route('versements.delete', $item->id) }}')"
                                                class="btn btn-outline-danger btn-sm"><span
                                                    class="flaticon2-trash"></span></button>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <div class="d-flex flex-wrap py-2 mr-3">
                        {{ $clients->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/script.js') }}"></script>
    <script></script>
@endsection
