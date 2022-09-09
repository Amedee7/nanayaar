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


    <div class="d-flex flex-column-fluid">
        <div class="container col-md-12">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            Liste des écoles
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <button onclick="createRecord('{{route('clients.create')}}')" class="btn px-4 btn-dark mb-1">
                            <i class="fa fa-plus-circle"></i>
                            Ajouter une Client
                        </button>
                    </div>
                </div>

                <div class="card-body ">
                    <table id="o2d-datatable" class="table table-bordered table-striped bgc-grey-l4 text-100 border-b-1" >
                        <thead style="border-color:#2a80c8">
                        <tr>
                            <th><strong>NUMERO UNIQUE</strong></th>
                            <th><strong>NOM*</strong></th>
                            <th><strong>PRENOM*</strong></th>
                            <th><strong>TELEPHONE</strong></th>
                            <th><strong>TELEPHONE</strong></th>
                            <th><strong>ANNEE DE NAISSANCE</strong></th>
                            <th><strong>AGENT COMM</strong></th>
                            <th><strong>ACTIONS</strong></th>
                        </tr>
                        </thead>
                    </table>
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
    <script src="{{asset('custom/script.js')}}"></script>
    <script>
        $('#o2d-datatable').DataTable({
            "buttons": ["csv", "excel", "pdf", "print"],
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
            ajax: '{!! route('clients.datatables') !!}',
            columns: [
                {data: 'numb_cli', name: 'numb_cli'},
                {data: 'nom', name: 'nom'},
                {data: 'prenom', name: 'prenom'},
                {data: 'first_phone', name: 'first_phone'},
                {data: 'second_phone', name: 'second_phone'},
                {data: 'date_naiss', name: 'date_naiss'},
                {data: 'user.id', name: 'user.id',
                    render: function render(data, type, full, meta) {
                        return  '<span style="width: 250px;">' +
                            '<div class="ml-4">'+
                            '<div class="text-dark-75 font-weight-bolder font-size-lg mb-0">'+full.firstname+'</div>'+
                            '<a class="text-muted font-weight-bold text-hover-primary">'+full.lastname+'</a>'+
                            '</div>'+
                            '</div>'+
                            '</span>';
                    }
                },
                
            ],
        });
    </script>
@endsection
