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
        <div class="d-flex align-items-center">
            <div class="btn-group dropup">
                <div class="btn-group dropup">
                    <a class="btn btn-primary" href="{{ route('clients.create') }}"><span
                            class="flaticon-up-arrow-1"></span> Insrire un client</a>
                </div>
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
                        <th>L'agent commercial</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

@endsection
@section('js')
    <script src="{{ asset('assets/script.js') }}"></script>
    <script>
        $('#o2d-datatable').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': false,

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
            ajax: '{!! route('clients.datatables') !!}',
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'numb_cli',
                    name: 'numb_cli',
                    render: function render(data, type, full, meta) {
                        return '<span style="width: 250px;">' +
                            '<div class="ml-4">' +
                            '<div class="text-dark-75 font-weight-bolder font-size-lg mb-0">' + full
                            .numb_cli + '</div>' +
                            '</div>' +
                            '</span>';
                    }
                },
                {
                    data: 'nom',
                    name: 'nom',
                    render: function render(data, type, full, meta) {
                        return '<span style="width: 250px;">' +
                            '<div class="ml-4">' +
                            '<div class="text-dark-75 font-weight-bolder font-size-lg mb-0">' + full
                            .name + '</div>' +
                            '<a class="text-muted font-weight-bold text-hover-primary">' + full.lastname +
                            '</a>' +
                            '</div>' +
                            '</div>' +
                            '</span>';
                    }
                },
                {
                    data: 'first_phone',
                    name: 'first_phone',
                    render: function render(data, type, full, meta) {
                        return '<span style="width: 250px;">' +
                            '<div class="d-flex align-items-center">' +
                            '<div class="ml-0">' +
                            '<div class="text-dark-75 font-weight-bolder font-size-lg mb-0">Tel 1: ' +
                            data +
                            '</div>' +
                            '<a class="text-muted font-weight-bold text-hover-primary">Tel 2: ' + full
                            .second_phone + '</a>' +
                            '</div>' +
                            '</div>' +
                            '</span>';
                    }
                },
                {
                    data: 'montant_demande',
                    name: 'montant_demande'
                }, {
                    data: 'user.firstname',
                    name: 'user.firstname',
                    render: function render(data, type, full, meta) {
                        return '<span style="width: 250px;">' +
                            '<div class="ml-4">' +
                            '<div class="text-dark-75 font-weight-bolder font-size-lg mb-0">' + full.user
                            .firstname + '</div>' +
                            '<a class="text-muted font-weight-bold text-hover-primary">' + full.user
                            .lastname + '</a>' +
                            '</div>' +
                            '</div>' +
                            '</span>';

                            
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
                            case 1:
                                label = "bg-success";
                                break;
                            case 0:
                                label = "bg-danger";
                                break;
                            default:
                                label = "bg-primary";
                        }

                        if (typeof value === 'undefined') {
                            return value;
                        }
                        status = status + ' ' + '<span class="badge text-white ' + label + ' ">' + value +
                            '</span>';

                        return status;

                    }
                },

                {
                    data: 'action',
                    name: 'action',
                    width: 100
                },
            ],

        });
    </script>
@endsection



Model+++++++
<?php namespace App\Models;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    public $guarded = [];
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'event_id', 'id');
    }
}


-**************************

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
        <div class="d-flex align-items-center">
            <div class="btn-group dropup">
                <div class="btn-group dropup">
                    <a class="btn btn-primary" href="{{ route('clients.create') }}"><span
                            class="flaticon-up-arrow-1"></span> Insrire un client</a>
                </div>
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
                        <th>L'agent commercial</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $key => $client)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ Str::limit($client->numb_cli) }}</td>
                            <td>{{ Str::limit($client->name) }} {{ Str::limit($client->lastname) }}</td>

                            <td>{{ Str::limit($client->first_phone) }}</td>
                            <td>{{ Str::limit($client->montant_demande) }}</td>
                            <td>{{ Str::limit($client->user->lastname) }}</td>

                            <td>
                                @if ($client->status == 1)
                                    <a href="{{ route('clients.change-status', $client->id) }}"
                                        onclick="return confirm('Are you Sure?')" class="btn btn-sm btn-success">Active</a>
                                @else
                                    <a href="{{ route('clients.change-status', $client->id) }}"
                                        onclick="return confirm('Voulez vous changer le status?')" class="btn btn-sm btn-danger">Inactive</a>
                                @endif
                            </td>
                            <td>
                                {{ $client->created_at->toDateString() }}
                            </td>
                            <td>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection


<div class="mt-n1">
                    <div class="m-0">
                        <div class="fw-bolder fs-3 text-gray-800 mb-8">Commande <span class="text-success">{{$versement->identifier}}</span> </div>
                        <div class="row g-5 mb-11">
                            <div class="col-sm-6">
                                <div class="fw-bold fs-7 text-gray-600 mb-1">Date de création :</div>
                                <div class="fw-bolder fs-6 text-gray-800">{{\Illuminate\Support\Carbon::make($versement->created_at)->format('d/m/Y à H:i:s') }}</div>
                            </div>
                            <div class="col-sm-6">
                                <div class="fw-bold fs-7 text-gray-600 mb-1">Client concerné:</div>
                                <div class="fw-bolder fs-6 text-gray-800 d-flex align-items-center flex-wrap">
                                    <span class="fs-7 text-primary d-flex align-items-center">
                                </div>
                            </div>
                        </div>
                        <div class="row g-5 mb-12">
                            <div class="col-sm-6">
                                <div class="fw-b fs-7 text-gray-600 mb-1">Effectué par:</div>
                                <div class="fw-b fs-6 text-gray-800">{{$user->firstname}} {{$user->lastname}}</div>
                                <div class="fw-b fs-7 text-gray-600">Téléphone: {{$user->telephone}}</div>
                            </div>
                            <div class="col-sm-6">
                                <div class="fw-bold fs-7 text-gray-600 mb-1">Statut:</div>
                                <div class="fw-bolder fs-6 text-gray-800">
                                    @if($versement->status=="Payé")
                                    <span class="label label-light-success label-inline">{{$versement->status}}</span>
                                    @elseif($versement->status=="Paiement partiel")
                                    <span class="label label-light-warning label-inline">{{$versement->status}}</span>
                                    @elseif($versement->status=="Non payé")
                                    <span class="label label-light-danger label-inline">{{$versement->status}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            {{-- <div class="table-responsive border-bottom mb-9">
                                <table class="table mb-3">
                                    <thead>
                                    <tr class="border-bottom fs-6 fw-bolder text-muted">
                                        <th class="min-w-175px pb-2">PRODUIT</th>
                                        <th class="min-w-70px text-end pb-2">CAISSE</th>
                                        <th class="min-w-80px text-end pb-2">P.U</th>
                                        <th class="min-w-100px text-end pb-2">P.T</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($listProducts as $item)
                                        <tr class="fw-bolder text-gray-700 fs-5">
                                            <td class="d-flex pt-6">{{$item->name}}-{{$item->bottles}}T-{{$item->volume}}CL</td>
                                            <td class="pt-6 text-end">{{$item->objects}}</td>
                                            <td class="pt-6 text-end">{{$item->price}}</td>
                                            <td class="pt-6 text-end text-dark fw-boldest">{{number_format($item->amount_total_product,0, '.',' ')}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div> --}}
                            <div class="d-flex justify-content-end">
                                <div class="mw-300px">
                                    <div class="d-flex flex-stack mb-3">
                                        <div class="fw-bold pe-10 text-gray-600 fs-7">NOMBRE DE PRODUIT:</div>
                                    </div>
                                    <div class="d-flex flex-stack mb-3">
                                        <div class="fw-bold pe-10 text-gray-600 fs-7">SOMME TOTALE:</div>
                                        <div class="text-end fw-bolder fs-6 text-gray-800"><span class="label label-light-success label-inline">{{number_format($versement->montant_octroye,0, '.',' ')}}</span></div>
                                    </div>
                                    <div class="d-flex flex-stack mb-3">
                                        <div class="fw-bold pe-10 text-gray-600 fs-7">SOMME PAYEE:</div>
                                        <div class="text-end fw-bolder fs-6 text-gray-800"><span class="label label-light-warning label-inline">{{number_format($versement->somme_verse,0, '.',' ')}}</span></div>
                                    </div>
                                    <div class="d-flex flex-stack">
                                        <div class="fw-bold pe-10 text-gray-600 fs-7">RESTE A PAYER:</div>
                                        <div class="text-end fw-bolder fs-6 text-gray-800"><span class="label label-light-danger label-inline">{{number_format($versement->reste_apaye,0, '.',' ')}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>