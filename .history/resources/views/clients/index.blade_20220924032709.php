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
                    <label>Numero client:</label>
                    <input type="text" class="form-control datatable-input" placeholder="Ex: 37000-300"
                        data-col-index="1" />
                </div>
                <div class="col-lg-3  mb-lg-0 mb-6">
                    <label>Agent ommercial:</label>
                    <select class="form-control datatable-input" data-col-index="2">
                        <option value="">Select</option>
                    </select>
                </div>
                <div class="col-lg-3  mb-lg-0 mb-6">
                    <label>Nom du Client:</label>
                    <input type="text" class="form-control datatable-input" placeholder="Agent ID or name"
                        data-col-index="4" />
                </div>
            </div>

            <div class="row mb-8">
                <div class="col-lg-3  mb-lg-0 mb-6">
                    <label>Date d'inscription:</label>
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
                    <label>Montant:</label>
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
                            <span>Recherche</span>
                        </span>
                    </button>
                    &nbsp;&nbsp;
                    <button class="btn btn-secondary btn-secondary--icon" id="kt_reset">
                        <span>
                            <i class="la la-close"></i>
                            <span>Annuler</span>
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
                    <th>Numero Client</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Telephone</th>
                    <th>Agent Commercial</th>
                    <th>Status</th>
                    <th>Montant</th>
                    <th>Actions</th>
                </tr>
            </thead>


            <tfoot>
                <tr>
                    <th>Record ID</th>
                    <th>Numero Client</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Telephone</th>
                    <th>Agent Commercial</th>
                    <th>Status</th>
                    <th>Montant</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
        <!--end: Datatable-->
    </div>

@endsection
@section('js')
    <script src="{{ asset('assets/script.js') }}"></script>
    <script>
        // begin first table
        var table = $('#kt_datatable').DataTable({
            responsive: true,
            // Pagination settings
            dom: `<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
            // read more: https://datatables.net/examples/basic_init/dom.html

            lengthMenu: [5, 10, 25, 50],

            pageLength: 10,

            language: {
                'lengthMenu': 'Display _MENU_',
            },

            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: {
                url: '{!! route('clients.index') !!}',
                type: 'POST',
                data: {
                    // parameters for custom backend script demo
                    columnsDef: [
                        'RecordID', 'Numero client', 'Nom', 'Prenom', 'Telephone',
                        'Agent Commercial', 'Status', 'Montant', 'Actions',
                    ],
                },
            },
            columns: [{
                    data: 'RecordID', name: ''
                },
                {
                    data: 'Numero client', name: ''
                },
                {
                    data: 'Nom', name: ''
                },
                {
                    data: 'Prenom', name: ''
                },
                {
                    data: 'Telephone', name: ''
                },
                {
                    data: 'Agent Commercial', name: ''
                },
                {
                    data: 'Status', name: ''
                },
                {
                    data: 'Montant', name: ''
                },
                {
                    data: 'Actions',
                    responsivePriority: -1
                },
            ],

            initComplete: function() {
                this.api().columns().every(function() {
                    var column = this;

                    switch (column.title()) {
                        case 'Country':
                            column.data().unique().sort().each(function(d, j) {
                                $('.datatable-input[data-col-index="2"]')
                                    .append('<option value="' + d + '">' + d +
                                        '</option>');
                            });
                            break;

                        case 'Status':
                            var status = {
                                1: {
                                    'title': 'En attente',
                                    'class': 'label-light-primary'
                                },
                                2: {
                                    'title': 'Accepté',
                                    'class': ' label-light-success'
                                },
                                3: {
                                    'title': 'Rejeté',
                                    'class': ' label-light-danger'
                                },
                            };
                            column.data().unique().sort().each(function(d, j) {
                                $('.datatable-input[data-col-index="6"]')
                                    .append('<option value="' + d + '">' +
                                        status[d].title + '</option>');
                            });
                            break;
                    }
                });
            },

            columnDefs: [{
                    targets: -1,
                    title: 'Actions',
                    orderable: false,
                    render: function(data, type, full, meta) {
                        return '\
                                                        							<div class="dropdown dropdown-inline">\
                                                        								<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">\
                                                        	                                <i class="la la-cog"></i>\
                                                        	                            </a>\
                                                        							  	<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">\
                                                        									<ul class="nav nav-hoverable flex-column">\
                                                        							    		<li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-edit"></i><span class="nav-text">Edit Details</span></a></li>\
                                                        							    		<li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-leaf"></i><span class="nav-text">Update Status</span></a></li>\
                                                        							    		<li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-print"></i><span class="nav-text">Print</span></a></li>\
                                                        									</ul>\
                                                        							  	</div>\
                                                        							</div>\
                                                        							<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Edit details">\
                                                        								<i class="la la-edit"></i>\
                                                        							</a>\
                                                        							<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">\
                                                        								<i class="la la-trash"></i>\
                                                        							</a>\
                                                        						';
                    },
                },
                {
                    targets: 6,
                    render: function(data, type, full, meta) {
                        var status = {
                            1: {
                                'title': 'En attente',
                                'class': 'label-light-primary'
                            },
                            2: {
                                'title': 'Accepté',
                                'class': ' label-light-success'
                            },
                            3: {
                                'title': 'Rejeté',
                                'class': ' label-light-danger'
                            },
                        };
                        if (typeof status[data] === 'undefined') {
                            return data;
                        }
                        return '<span class="label label-lg font-weight-bold' + status[data]
                            .class + ' label-inline">' + status[data].title + '</span>';
                    },
                },
            ],
        });

        var filter = function() {
            var val = $.fn.dataTable.util.escapeRegex($(this).val());
            table.column($(this).data('col-index')).search(val ? val : '', false, false).draw();
        };

        var asdasd = function(value, index) {
            var val = $.fn.dataTable.util.escapeRegex(value);
            table.column(index).search(val ? val : '', false, true);
        };

        $('#kt_search').on('click', function(e) {
            e.preventDefault();
            var params = {};
            $('.datatable-input').each(function() {
                var i = $(this).data('col-index');
                if (params[i]) {
                    params[i] += '|' + $(this).val();
                } else {
                    params[i] = $(this).val();
                }
            });
            $.each(params, function(i, val) {
                // apply search params to datatable
                table.column(i).search(val ? val : '', false, false);
            });
            table.table().draw();
        });

        $('#kt_reset').on('click', function(e) {
            e.preventDefault();
            $('.datatable-input').each(function() {
                $(this).val('');
                table.column($(this).data('col-index')).search('', false, false);
            });
            table.table().draw();
        });

        $('#kt_datepicker').datepicker({
            todayHighlight: true,
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>',
            },
        });
    </script>
@endsection
