@extends('layouts.app')
@section('title', 'Administration - Liste des clients')
@section('content')
<div class="container">
    <br>
        <form action="{{route('clients.ViewPages')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container">
            <div class="row">
            <label for="from" class="col-form-label">De</label>
                <div class="col-md-2">
                <input type="date" class="form-control input-sm" id="from" name="from">
                </div>
                <label for="from" class="col-form-label">A</label>
                <div class="col-md-2">
                    <input type="date" class="form-control input-sm" id="to" name="to">
                </div>
                
                <div class="col-md-4">
                   <button type="submit" class="btn btn-primary btn-sm" name="search" >Rechercher</button>
                    <button type="submit" class="btn btn-secondary btn-sm" name="exportPDF">Export PDF</button>
                    {{-- <button type="submit" class="btn btn-success btn-sm" name="exportExcel">export Excel</button> --}}

                </div>
            </div>
        </div>
        </form>
        <br>
        <table class="table table-dark">
            <tr>
            <th>id</th>
            <th>name</th>
            <th>N client</th>
            <th>Agent Comm</th>
            <th>created_at</th>
            <th>created_at</th>
            </tr>
            @foreach ($ViewsPage as $ViewsPages)
                <tr>
                    <td>{{ $ViewsPages->id }}</td>
                    <td>{{ $ViewsPages->name }}</td>
                    <td>{{ $ViewsPages->numb_cli }}</td>
                    <td>{{ $ViewsPages->user->firstname }} {{ $ViewsPages->user->lastname }}</td>
                    <td>{{ $ViewsPages->created_at }}</td>
                    <td>{{ $ViewsPages->created_at }}</td>
                </tr>
            @endforeach
        </table>
</div>

<div class="container mt-5">
    <div classs="form-group">
        <input type="text" id="search" name="search" placeholder="Search" class="form-control" />
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
</script>
<script type="text/javascript">
    var route = "{{ url('autocomplete-search') }}";
    $('#search').typeahead({
        source: function (query, process) {
            return $.get(route, {
                query: query
            }, function (data) {
                return process(data);
            });
        }
    });
</script>
@endsection
@section('js')
    <script src="{{ asset('assets/script.js') }}"></script>
    <script>
        $('#o2d-datatable').DataTable({
            "pageLength": 50,
            // dom: 'Bfrtip',
            // buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
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
                    data: 'name',
                    name: 'name',
                    render: function render(data, type, full, meta) {
                        var output;
                        output = '<div class="d-flex align-items-center">' +
                            '<div class="symbol symbol-50px me-5">' +
                            '<span class="symbol-label bg-light-primary">' +
                            '<span class="svg-icon svg-icon-2x svg-icon-primary">' +
                            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">' +
                            '<path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black"></path>' +
                            '<path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black"></path>' +
                            '</svg>' +
                            '</span>' +
                            '</span>' +
                            '</div>' +
                            '<div class="d-flex justify-content-start flex-column">' +
                            '<a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 fs-6">' +
                            full.name +
                            '</a>' +
                            '<a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 fs-6">' +
                            full.lastname +
                            '</a>' +
                            '<span class="text-muted font-weight-bolder text-muted d-block fs-7">' +
                            '<div class="min-w-125px pe-2">N Client: ' +
                            '<span class="fs-8 m-1">' + full.numb_cli +
                            '</span>' +
                            '</span>' +
                            '</div>' +
                            '</div>';
                        return output;
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
                    name: 'montant_demande',
                    render: function render(data, type, full, meta) {
                        return '<span class=" label label-light-success label-inline fw-bolder fs-6">' +
                            data
                            .toLocaleString('fr') + '</span>'
                    }
                },
                {
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
                }

                ,
                {
                    data: 'status',
                    name: 'status',
                    render: function render(data, type, full, meta) {
                        var status = ' ';
                        var label;
                        var value = data;
                        switch (value) {
                            case 'Accepté':
                                label = "label-light-success";
                                break;
                            case 'Rejeté':
                                label = "label-light-danger";
                                break;
                            default:
                                label = "label-light-primary";
                        }

                        if (typeof value === 'undefined') {
                            return value;
                        }
                        status = status + ' ' + '<span class="label font-size-3 m-1 ' + label +
                            ' label-inline">' + value +
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
