@extends('layouts.app')
@section('title', 'Administration - Liste des Clients')
@section('content')
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Liste des Clients</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-3 container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-1">
            <div class="d-flex align-items-baseline flex-wrap mr-5">
                <h5 class="text-dark font-weight-bolder my-1 mr-5">
                    <span class="flaticon-user-add primary-color icon-lg"></span>
                    Gestion de clients.
                </h5>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="card-body ">
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
                                <td>{{ Str::limit($versement->client->numb_cli) }}</td>
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

@endsection
