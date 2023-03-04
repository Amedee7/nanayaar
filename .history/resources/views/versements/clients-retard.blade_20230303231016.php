@extends('layouts.app')
@section('title', 'Administration - Liste des clients')
@section('content')

    <div class="d-flex flex-column-fluid">
        <div class="container col-md-12">
            <div class="card card-custom">
                <!--begin::Card header-->
                <div class="card card-custom card-stretch gutter-b">
                    <div class="d-flex align-items-center mb-9 bg-light-danger rounded p-5">
                        <!--begin::Icon-->
                        <span class="svg-icon svg-icon-danger mr-5">
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
                            <h2 class="mb-1">Gestion des Retards</h2>
                            <div class="text-muted fw-bolder">
                                Effectuée par: <a href="#">{{ Auth::user()->lastname }}
                                    {{ Auth::user()->firstname }}</a>
                            </div>
                        </div>
                        <!--end::Title-->
                    </div>
                </div>

                <div class="card-body py-3">
                    <div class="table-responsive">
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="o2d-datatable">
                            <thead>
                                <tr class="fw-bolder text-muted">
                                    <th class="min-w-140px">ID</th>
                                    <th class="min-w-140px">CLIENT</th>
                                    <th class="min-w-140px">STATUT</th>
                                    <th class="min-w-120px">Mt. DEBLOQUE</th>
                                    <th class="min-w-120px">PENALITE</th>
                                    <th class="min-w-120px">Cs. VERSE</th>
                                    <th class="min-w-120px">Mt. VERSE</th>
                                    <th class="min-w-120px">Sm. RESTANT</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($versements as $key => $versement)
                                    @if ($versement->fin <= now() and $versement->status != 'Remboursé')
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                
                                                '<div>' +
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
                                                    '<div class="d-flex justify-content-start flex-column">
                                                    '<a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 fs-6">
                                                    full.full_name_client
                                                    '</a>' +
                                                    '<span class="text-muted font-weight-bolder text-muted d-block fs-7">
                                                    '<div class="min-w-125px pe-2">N Client:
                                                    '<span class="fs-8 m-1">' + $versement->numb_cli
                                                    '</span>' +
                                                    '<div class="min-w-125px pe-2">Tel
                                                    '<span class="label label-light-primary label-inline fs-8 m-1">{{$versement->first_phone}} +
                                                    '</span>
                                                    '</div>
                                                    '</span>
                                                    '</div>
                                                    '</div>
                                                    '</div>
                                                
                                                
                                                
                                                {{ Str::limit($versement->client->numb_cli) }}</td>
                                            <td>{{ Str::limit($versement->status) }}</td>
                                            <td>{{ Str::limit($versement->montant_octroye) }}</td>
                                            <td>{{ Str::limit($versement->penalite) }}</td>
                                            <td>{{ Str::limit($versement->commission_verse) }}</td>
                                            <td>{{ Str::limit($versement->somme_verse) }}</td>
                                            <td>{{ Str::limit($versement->reste_apaye) }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
