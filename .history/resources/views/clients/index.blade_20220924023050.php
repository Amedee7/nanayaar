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

    <div class="card-body">
        <!--begin: Search Form-->
        <form class="kt-form kt-form--fit mb-15">
            <div class="row mb-6">
                <div class="col-lg-3 mb-lg-0 mb-6">
                    <label>RecordID:</label>
                    <input type="text" class="form-control datatable-input" placeholder="E.g: 4590" data-col-index="0" />
                </div>
                <div class="col-lg-3  mb-lg-0 mb-6">
                    <label>OrderID:</label>
                    <input type="text" class="form-control datatable-input" placeholder="E.g: 37000-300"
                        data-col-index="1" />
                </div>
                <div class="col-lg-3  mb-lg-0 mb-6">
                    <label>Country:</label>
                    <select class="form-control datatable-input" data-col-index="2">
                        <option value="">Select</option>
                    </select>
                </div>
                <div class="col-lg-3  mb-lg-0 mb-6">
                    <label>Agent:</label>
                    <input type="text" class="form-control datatable-input" placeholder="Agent ID or name"
                        data-col-index="4" />
                </div>
            </div>

            <div class="row mb-8">
                <div class="col-lg-3  mb-lg-0 mb-6">
                    <label>Ship Date:</label>
                    <div class="input-daterange input-group" id="kt_datepicker">
                        <input type="text" class="form-control datatable-input" name="start" placeholder="From"
                            data-col-index="5" />
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
                        </div>
                        <input type="text" class="form-control datatable-input" name="end" placeholder="To"
                            data-col-index="5" />
                    </div>
                </div>
                <div class="col-lg-3  mb-lg-0 mb-6">
                    <label>Status:</label>
                    <select class="form-control datatable-input" data-col-index="6">
                        <option value="">Select</option>
                    </select>
                </div>
                <div class="col-lg-3  mb-lg-0 mb-6">
                    <label>Type:</label>
                    <select class="form-control datatable-input" data-col-index="7">
                        <option value="">Select</option>
                    </select>
                </div>
            </div>

            <div class="row mt-8">
                <div class="col-lg-12">
                    <button class="btn btn-primary btn-primary--icon" id="kt_search">
                        <span>
                            <i class="la la-search"></i>
                            <span>Search</span>
                        </span>
                    </button>
                    &nbsp;&nbsp;
                    <button class="btn btn-secondary btn-secondary--icon" id="kt_reset">
                        <span>
                            <i class="la la-close"></i>
                            <span>Reset</span>
                        </span>
                    </button>
                </div>
            </div>
        </form>
        <!--begin: Datatable-->

        <!--begin: Datatable-->
        <table class="table table-bordered table-hover table-checkable" id="kt_datatable">
            <thead>
                <tr>
                    <th>Record ID</th>
                    <th>Order ID</th>
                    <th>Country</th>
                    <th>Ship City</th>
                    <th>Company Agent</th>
                    <th>Ship Date</th>
                    <th>Status</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>


            <tfoot>
                <tr>
                    <th>Record ID</th>
                    <th>Order ID</th>
                    <th>Country</th>
                    <th>Ship City</th>
                    <th>Company Agent</th>
                    <th>Ship Date</th>
                    <th>Status</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
        <!--end: Datatable-->
    </div>

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
            ajax: '{!! route('anneescolaires.datatables') !!}',
            columns: [
                {data: 'year', name: 'year'},
                {data: 'title', name: 'title'},
                {data: 'starting_date', name: 'starting_date'},
                {data: 'ending_date', name: 'ending_date'},
                {data: 'action', name: 'action',width:100},
            ],
        });
    </script>
@endsection
