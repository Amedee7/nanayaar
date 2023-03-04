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
            <table id="o2d-datatable" class="table table-bordered table-striped bgc-grey-l4 text-100 border-b-1">
                <thead style="border-color:#2a80c8">
                    <tr>
                        <th>Record ID</th>
                        <th>Numero Client</th>
                        <th>Nom & Prenom</th>
                        <th>Telephones</th>
                        <th>Montant</th>
                        <th>L'agent comm</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $key => $client)
                    @if ((DATEDIFF($client->user-fin, debut) <= 2) AND ($client->status != 'Remboursé'))
                        
                   
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ Str::limit($client->numb_cli) }}</td>
                            <td>{{ Str::limit($client->name) }} {{ Str::limit($client->lastname) }}</td>

                            <td>{{ Str::limit($client->first_phone) }}</td>
                            <td>{{ Str::limit($client->montant_demande) }}</td>
                            <td>{{ Str::limit($client->user->lastname) }}</td>
                            <td>
                                {{ $client->created_at->toDateString() }}
                            </td>
                            <td>

                            </td>
                        </tr> 
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection