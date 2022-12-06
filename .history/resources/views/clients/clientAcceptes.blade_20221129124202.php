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
                , {
					field: 'status',
					title: 'status',
					// callback function support for column rendering
					template: function(row) {
						var status = {
							1: {'title': 'Pending', 'class': ' label-light-primary'},
							2: {'title': 'Delivered', 'class': ' label-light-danger'},
							3: {'title': 'Canceled', 'class': ' label-light-primary'},
							4: {'title': 'Success', 'class': ' label-light-success'},
							5: {'title': 'Info', 'class': ' label-light-info'},
							6: {'title': 'Danger', 'class': ' label-light-danger'},
							7: {'title': 'Warning', 'class': ' label-light-warning'},
						};
						return '<span class="label label-lg font-weight-bold ' + status[row.Status].class + ' label-inline">' + status[row.Status].title + '</span>';
					},
				}

                {
                    data: 'action',
                    name: 'action',
                    width: 100
                },
            ],

        });
    </script>
@endsection