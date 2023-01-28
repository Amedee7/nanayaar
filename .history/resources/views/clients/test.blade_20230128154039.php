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


//////////////////////////////////////
@extends('layouts.app')
@section('title', 'Administration - Liste des clients')
@section('content')

    <div class="d-flex flex-column-fluid">
        <div class="container col-md-12">
            <div class="card card-custom">

                <!--begin::Card header-->
                <div class="card card-custom card-stretch gutter-b">
                    <div class="d-flex align-items-center mb-9 bg-light-warning rounded p-5">
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
                            <h2 class="mb-1">Gestion des clients</h2>
                            <div class="text-muted fw-bolder">
                                Effectuée par: <a href="#">{{ Auth::user()->lastname }}
                                    {{ Auth::user()->firstname }}</a>
                            </div>
                        </div>
                        <!--end::Title-->
                    </div>
                </div>
                <!--end::Card header-->

                <!--begin::les 3 card statistique-->
                <div class="row mt-5">
                    <div class="col-xl-6">
                        <!--begin::Stats Widget 13-->
                        <a href="#" class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b">
                            <!--begin::Body-->
                            <div class="card-body">
                                <span class="svg-icon svg-icon-white svg-icon-3x">
                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Group.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
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
                                    <!--end::Svg Icon-->
                                </span>
                                <div class="text-inverse-primary font-weight-bolder font-size-h5 mb-2 mt-5">
                                    Clients <span class="badge badge-light fw-bolder my-2">En attente de validation</span>
                                </div>
                                <div class="font-weight-bold text-inverse-primary font-size-sm">
                                    <div class="symbol symbol-circle me-5">
                                        <div class="symbol-label bg-transparent border border-secondary border-dashed">
                                            <span
                                                class="font-weight-bold text-inverse-primary font-size-h2">{{ $clientAttente }}</span>
                                            <span class="pulse-ring"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                        </a>
                        <!--end::Stats Widget 13-->
                    </div>

                    <div class="col-xl-6">
                        <!--begin::Stats Widget 14-->
                        <a href="#" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b">
                            <!--begin::Body-->
                            <div class="card-body">
                                <span class="svg-icon svg-icon-white svg-icon-3x">
                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Group.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
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
                                    <!--end::Svg Icon-->
                                </span>
                                <div class="text-inverse-success font-weight-bolder font-size-h5 mb-2 mt-5">
                                    Clients <span class="badge badge-light fw-bolder my-2">Acceptés</span></div>
                                <div class="font-weight-bold text-inverse-success font-size-sm">
                                    <div class="symbol symbol-circle me-5">
                                        <div class="symbol-label bg-transparent border border-secondary border-dashed">
                                            <span
                                                class="font-weight-bold text-inverse-success font-size-h2">{{ $clientAccepté }}</span>
                                            <span class="pulse-ring"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                        </a>
                        <!--end::Stats Widget 14-->
                    </div>
                    {{-- <div class="col-xl-4">
                        <!--begin::Stats Widget 15-->
                        <a href="#" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b">
                            <!--begin::Body-->
                            <div class="card-body">
                                <span class="svg-icon svg-icon-white svg-icon-3x">
                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Group.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
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
                                    <!--end::Svg Icon-->
                                </span>
                                <div class="text-inverse-danger font-weight-bolder font-size-h5 mb-2 mt-5">
                                    Clients <span class="badge badge-light fw-bolder my-2">Rejetés</span></div>
                                <div class="font-weight-bold text-inverse-danger font-size-sm">
                                    <div class="symbol symbol-circle me-5">
                                        <div class="symbol-label bg-transparent border border-secondary border-dashed">
                                            <span
                                                class="font-weight-bold text-inverse-danger font-size-h2">{{ $clientRejeté }}</span>
                                            <span class="pulse-ring"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                        </a>
                        <!--end::Stats Widget 15-->
                    </div> --}}
                </div>
                <!--end::les 3 card statistique-->


                <div class="card-header">
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
                                <a href="{{ route('clients.index', ['trashed' => 'client']) }}"
                                    class="btn btn-warning">Voir les clients supprimés</a>
                            @endif
                        </span>
                        <!--end::Lable-->
                    </div>
                </div>

                <div class="card-body">
                    <input style="border: solid black;" data-table="table-clients" placeholder="Rechercher un client"
                        type="text" class="light-table-filter form-control form-control-lg mb-3">
                    <div id="client-datatable" class="table-responsive">
                        @include('clients.partials.paginate')
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
    <script src="{{ asset('assets/script.js') }}"></script>
    <script>
        $('#o2d-datatable').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false,
            'responsive': true,
            'serverSide': false,

            language: {
                processing: "Traitement en cours...",
                search: "Recherche &nbsp; :",
                lengthMenu:     "Afficher _MENU_ &eacute;l&eacute;ments",
                info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                loadingRecords: "Chargement en cours...",
                zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                emptyTable:     "Aucune donnée disponible dans le tableau",
                paginate: {
                    first: "<<",
                    previous: "Précédent",
                    next: "Suivant",
                    last: ">>"
                },
                aria: {
                    sortAscending:  ": activer pour trier la colonne par ordre croissant",
                    sortDescending: ": activer pour trier la colonne par ordre décroissant"
                }
            },
            // ajax: '{!! route('clients.datatables') !!}'
        });
    </script>
@endsection

//////////////////////////////
-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour nanayaar
CREATE DATABASE IF NOT EXISTS `nanayaar` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `nanayaar`;

-- Listage de la structure de la table nanayaar. activity_log
CREATE TABLE IF NOT EXISTS `activity_log` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `log_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint(20) unsigned DEFAULT NULL,
  `event` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) unsigned DEFAULT NULL,
  `properties` json DEFAULT NULL,
  `batch_uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subject` (`subject_type`,`subject_id`),
  KEY `causer` (`causer_type`,`causer_id`),
  KEY `activity_log_log_name_index` (`log_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table nanayaar.activity_log : ~0 rows (environ)
/*!40000 ALTER TABLE `activity_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `activity_log` ENABLE KEYS */;

-- Listage de la structure de la table nanayaar. clients
CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numb_cli` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naiss` date NOT NULL,
  `numb_cnib` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `montant_demande` double(8,2) NOT NULL DEFAULT '0.00',
  `amount_credit` bigint(20) NOT NULL DEFAULT '0',
  `commission_averse` double(8,2) DEFAULT NULL,
  `status` enum('Accepté','Attente','Rejeté') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Attente',
  `status_versement` enum('Non remboursé','Remboursement partiel','Remboursé') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Non remboursé',
  `genre` enum('Masculin','Feminin') COLLATE utf8mb4_unicode_ci DEFAULT 'Masculin',
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `status_updated_or_not` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL,
  `created_by` bigint(20) unsigned NOT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `deleted_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clients_numb_cli_unique` (`numb_cli`),
  KEY `clients_user_id_foreign` (`user_id`),
  KEY `clients_created_by_foreign` (`created_by`),
  KEY `clients_updated_by_foreign` (`updated_by`),
  KEY `clients_deleted_by_foreign` (`deleted_by`),
  CONSTRAINT `clients_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `clients_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `clients_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `clients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table nanayaar.clients : ~0 rows (environ)
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;

-- Listage de la structure de la table nanayaar. configurations
CREATE TABLE IF NOT EXISTS `configurations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `entreprise_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'logo.png',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_page_background` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'background.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table nanayaar.configurations : ~1 rows (environ)
/*!40000 ALTER TABLE `configurations` DISABLE KEYS */;
INSERT INTO `configurations` (`id`, `entreprise_name`, `telephone`, `adress`, `logo`, `email`, `login_page_background`, `created_at`, `updated_at`) VALUES
	(1, 'GBM SA.', '99999999', 'Ouagadougou', 'logo.png', 'email@email.com', 'background.png', NULL, NULL);
/*!40000 ALTER TABLE `configurations` ENABLE KEYS */;

-- Listage de la structure de la table nanayaar. failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table nanayaar.failed_jobs : ~0 rows (environ)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Listage de la structure de la table nanayaar. migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table nanayaar.migrations : ~9 rows (environ)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2022_07_19_233704_laratrust_setup_tables', 1),
	(6, '2022_07_19_235631_create_activity_log_table', 1),
	(7, '2022_10_13_130017_create_clients_table', 1),
	(8, '2022_11_25_163808_create_versements_table', 1),
	(9, '2022_12_19_233939_create_configurations_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Listage de la structure de la table nanayaar. password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table nanayaar.password_resets : ~0 rows (environ)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Listage de la structure de la table nanayaar. permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table nanayaar.permissions : ~51 rows (environ)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'utilisateur-creer', 'Creer Utilisateur', 'Creer Utilisateur', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(2, 'utilisateur-lire', 'Lire Utilisateur', 'Lire Utilisateur', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(3, 'utilisateur-modifier', 'Modifier Utilisateur', 'Modifier Utilisateur', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(4, 'utilisateur-supprimer', 'Supprimer Utilisateur', 'Supprimer Utilisateur', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(5, 'utilisateur-changer statut', 'Changer statut Utilisateur', 'Changer statut Utilisateur', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(6, 'statistique-voir sur tableau de bord', 'Voir sur tableau de bord Statistique', 'Voir sur tableau de bord Statistique', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(7, 'paramètres-voir', 'Voir Paramètres', 'Voir Paramètres', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(8, 'configuration-regler', 'Regler Configuration', 'Regler Configuration', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(9, 'configuration-modifier', 'Modifier Configuration', 'Modifier Configuration', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(10, 'ville-creer', 'Creer Ville', 'Creer Ville', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(11, 'ville-lire', 'Lire Ville', 'Lire Ville', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(12, 'ville-modifier', 'Modifier Ville', 'Modifier Ville', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(13, 'ville-supprimer', 'Supprimer Ville', 'Supprimer Ville', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(14, 'role-creer', 'Creer Role', 'Creer Role', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(15, 'role-lire', 'Lire Role', 'Lire Role', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(16, 'role-modifier', 'Modifier Role', 'Modifier Role', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(17, 'role-supprimer', 'Supprimer Role', 'Supprimer Role', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(18, 'log-consulter', 'Consulter Log', 'Consulter Log', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(19, 'archive-lire', 'Lire Archive', 'Lire Archive', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(20, 'tableau de bord-voir', 'Voir Tableau de bord', 'Voir Tableau de bord', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(21, 'sauvegarde-creer', 'Creer Sauvegarde', 'Creer Sauvegarde', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(22, 'sauvegarde-lire', 'Lire Sauvegarde', 'Lire Sauvegarde', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(23, 'sauvegarde-modifier', 'Modifier Sauvegarde', 'Modifier Sauvegarde', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(24, 'sauvegarde-supprimer', 'Supprimer Sauvegarde', 'Supprimer Sauvegarde', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(25, 'permission-creer', 'Creer Permission', 'Creer Permission', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(26, 'permission-lire', 'Lire Permission', 'Lire Permission', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(27, 'permission-modifier', 'Modifier Permission', 'Modifier Permission', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(28, 'permission-supprimer', 'Supprimer Permission', 'Supprimer Permission', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(29, 'profile-creer', 'Creer Profile', 'Creer Profile', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(30, 'profile-lire', 'Lire Profile', 'Lire Profile', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(31, 'profile-modifier', 'Modifier Profile', 'Modifier Profile', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(32, 'profile-avatar', 'Avatar Profile', 'Avatar Profile', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(33, 'profile-supprimer', 'Supprimer Profile', 'Supprimer Profile', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(34, 'versement-creer', 'Creer Versement', 'Creer Versement', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(35, 'versement-lire', 'Lire Versement', 'Lire Versement', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(36, 'versement-modifier', 'Modifier Versement', 'Modifier Versement', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(37, 'versement-supprimer', 'Supprimer Versement', 'Supprimer Versement', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(38, 'versement-règlement', 'Règlement Versement', 'Règlement Versement', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(39, 'versement-status', 'Status Versement', 'Status Versement', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(40, 'status-creer', 'Creer Status', 'Creer Status', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(41, 'status-lire', 'Lire Status', 'Lire Status', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(42, 'status-modifier', 'Modifier Status', 'Modifier Status', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(43, 'status-supprimer', 'Supprimer Status', 'Supprimer Status', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(44, 'status-status', 'Status Status', 'Status Status', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(45, 'client-creer', 'Creer Client', 'Creer Client', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(46, 'client-lire', 'Lire Client', 'Lire Client', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(47, 'client-modifier', 'Modifier Client', 'Modifier Client', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(48, 'client-supprimer', 'Supprimer Client', 'Supprimer Client', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(49, 'client-status', 'Status Client', 'Status Client', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(50, 'client-règlement', 'Règlement Client', 'Règlement Client', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(51, 'agent-lire', 'Lire Agent', 'Lire Agent', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Listage de la structure de la table nanayaar. permission_role
CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table nanayaar.permission_role : ~180 rows (environ)
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1),
	(9, 1),
	(10, 1),
	(11, 1),
	(12, 1),
	(13, 1),
	(14, 1),
	(15, 1),
	(16, 1),
	(17, 1),
	(18, 1),
	(19, 1),
	(20, 1),
	(21, 1),
	(22, 1),
	(23, 1),
	(24, 1),
	(25, 1),
	(26, 1),
	(27, 1),
	(28, 1),
	(29, 1),
	(30, 1),
	(31, 1),
	(32, 1),
	(33, 1),
	(34, 1),
	(35, 1),
	(36, 1),
	(37, 1),
	(38, 1),
	(39, 1),
	(40, 1),
	(41, 1),
	(42, 1),
	(43, 1),
	(44, 1),
	(45, 1),
	(46, 1),
	(47, 1),
	(48, 1),
	(49, 1),
	(50, 1),
	(1, 2),
	(2, 2),
	(3, 2),
	(4, 2),
	(5, 2),
	(6, 2),
	(7, 2),
	(8, 2),
	(10, 2),
	(11, 2),
	(12, 2),
	(13, 2),
	(14, 2),
	(15, 2),
	(16, 2),
	(17, 2),
	(18, 2),
	(19, 2),
	(21, 2),
	(22, 2),
	(23, 2),
	(24, 2),
	(25, 2),
	(26, 2),
	(27, 2),
	(28, 2),
	(29, 2),
	(30, 2),
	(31, 2),
	(32, 2),
	(33, 2),
	(34, 2),
	(35, 2),
	(36, 2),
	(37, 2),
	(38, 2),
	(39, 2),
	(40, 2),
	(41, 2),
	(42, 2),
	(43, 2),
	(44, 2),
	(45, 2),
	(46, 2),
	(47, 2),
	(48, 2),
	(49, 2),
	(50, 2),
	(1, 3),
	(2, 3),
	(3, 3),
	(6, 3),
	(7, 3),
	(10, 3),
	(11, 3),
	(12, 3),
	(13, 3),
	(18, 3),
	(30, 3),
	(31, 3),
	(32, 3),
	(34, 3),
	(35, 3),
	(36, 3),
	(37, 3),
	(38, 3),
	(39, 3),
	(40, 3),
	(41, 3),
	(42, 3),
	(43, 3),
	(44, 3),
	(45, 3),
	(46, 3),
	(47, 3),
	(48, 3),
	(49, 3),
	(50, 3),
	(1, 4),
	(2, 4),
	(3, 4),
	(6, 4),
	(7, 4),
	(10, 4),
	(11, 4),
	(12, 4),
	(13, 4),
	(18, 4),
	(29, 4),
	(30, 4),
	(31, 4),
	(32, 4),
	(34, 4),
	(35, 4),
	(36, 4),
	(37, 4),
	(38, 4),
	(39, 4),
	(40, 4),
	(41, 4),
	(42, 4),
	(43, 4),
	(44, 4),
	(45, 4),
	(46, 4),
	(47, 4),
	(48, 4),
	(49, 4),
	(50, 4),
	(30, 5),
	(31, 5),
	(32, 5),
	(35, 5),
	(41, 5),
	(46, 5),
	(51, 5),
	(30, 6),
	(31, 6),
	(32, 6),
	(35, 6),
	(41, 6),
	(46, 6),
	(51, 6),
	(30, 7),
	(31, 7),
	(32, 7),
	(35, 7),
	(41, 7),
	(46, 7),
	(51, 7);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;

-- Listage de la structure de la table nanayaar. permission_user
CREATE TABLE IF NOT EXISTS `permission_user` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  KEY `permission_user_permission_id_foreign` (`permission_id`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table nanayaar.permission_user : ~0 rows (environ)
/*!40000 ALTER TABLE `permission_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_user` ENABLE KEYS */;

-- Listage de la structure de la table nanayaar. personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table nanayaar.personal_access_tokens : ~0 rows (environ)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Listage de la structure de la table nanayaar. roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table nanayaar.roles : ~7 rows (environ)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'super-administrateur', 'Super-administrateur', 'Super-administrateur', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(2, 'directeur-general', 'Directeur-general', 'Directeur-general', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(3, 'administrateur', 'Administrateur', 'Administrateur', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(4, 'caissiere', 'Caissiere', 'Caissiere', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(5, 'utilisateur', 'Utilisateur', 'Utilisateur', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(6, 'agent-commercial', 'Agent-commercial', 'Agent-commercial', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22'),
	(7, 'directeur-commercial', 'Directeur-commercial', 'Directeur-commercial', NULL, '2023-01-28 12:38:22', '2023-01-28 12:38:22');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Listage de la structure de la table nanayaar. role_user
CREATE TABLE IF NOT EXISTS `role_user` (
  `role_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table nanayaar.role_user : ~3 rows (environ)
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
	(1, 1, 'App\\Models\\User'),
	(1, 2, 'App\\Models\\User'),
	(1, 3, 'App\\Models\\User');
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;

-- Listage de la structure de la table nanayaar. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `status` enum('Actif','Inactif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Actif',
  `last_login_at` datetime DEFAULT NULL,
  `last_login_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table nanayaar.users : ~3 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `firstname`, `lastname`, `telephone`, `email`, `email_verified_at`, `password`, `avatar`, `status`, `last_login_at`, `last_login_ip`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Konate', 'Amadou', 78000000, 'amadou@gmail.com', NULL, '$2y$10$QsLRUQU3gTpX69wSm8qLiOS8CAZhfP8YiwJ5blP7UONi1vE7jvkTa', 'avatar.png', 'Actif', NULL, NULL, NULL, 'xEFhdUb03O', '2023-01-28 12:38:23', '2023-01-28 12:38:23'),
	(2, 'Minoungou/Kietega', 'Aïda', 56000000, 'aida@gmail.com', NULL, '$2y$10$ZQZ0B0qFg4kIUYQX/BzwQuDhhfcLXTrxIRX2HrBT2IFpDBL4qtGVm', 'avatar.png', 'Actif', NULL, NULL, NULL, 'F9xlmX3oZ4', '2023-01-28 12:38:23', '2023-01-28 12:38:23'),
	(3, 'Tiendrebeogo', 'Segolaine', 77000000, 'segolaine@gmail.com', NULL, '$2y$10$w2HTaF9Tlrbh/6FIEqp5kely4gmpf/BmDpj4Y2ky01zb62Uu1XAOS', 'avatar.png', 'Actif', NULL, NULL, NULL, 'BPp6IymUkZ', '2023-01-28 12:38:23', '2023-01-28 12:38:23');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Listage de la structure de la table nanayaar. versements
CREATE TABLE IF NOT EXISTS `versements` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identifier` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commentaire` text COLLATE utf8mb4_unicode_ci,
  `montant_octroye` bigint(20) NOT NULL DEFAULT '0',
  `somme_verse` bigint(20) NOT NULL DEFAULT '0',
  `reste_apaye` bigint(20) NOT NULL DEFAULT '0',
  `state` enum('Terminé','En cours','Annulé') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Non remboursé','Remboursement partiel','Remboursé') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_news_versement` enum('Non renouvelé','Renouvelé') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Non renouvelé',
  `debut` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `commission_verse` double(8,2) NOT NULL,
  `rented` tinyint(1) NOT NULL DEFAULT '0',
  `penalite` bigint(20) NOT NULL DEFAULT '0',
  `client_id` bigint(20) unsigned NOT NULL,
  `created_by` bigint(20) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `versements_client_id_foreign` (`client_id`),
  KEY `versements_created_by_foreign` (`created_by`),
  CONSTRAINT `versements_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `versements_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table nanayaar.versements : ~0 rows (environ)
/*!40000 ALTER TABLE `versements` DISABLE KEYS */;
/*!40000 ALTER TABLE `versements` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
