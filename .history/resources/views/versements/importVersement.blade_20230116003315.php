@extends('layouts.app')
@section('title', 'Administration - Export des versements')
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
                            <h2 class="mb-1">Gererateur de rapport des prets</h2>
                            <div class="text-muted fw-bolder">
                                Effectuée par: <a href="#">{{ Auth::user()->lastname }}
                                    {{ Auth::user()->firstname }}</a>
                            </div>
                        </div>
                        <!--end::Title-->
                    </div>
                </div>
                <!--end::Card header-->

                {{-- <!--begin::Container-->
                <div class=" container ">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b">
                        <!--begin::Body-->
                        <div class="card-body p-0">
                            <!--begin::Wizard-->
                            <div class="wizard wizard-1" id="kt_contact_add" data-wizard-state="step-first"
                                data-wizard-clickable="true">
                                <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                                    <div class="col-xl-12 col-xxl-7">
                                        <!--begin::Form Wizard Form-->
                                        <form action="{{ route('versements.ViewVersementReport') }}" class="form"
                                            id="kt_contact_add_form" method="POST">
                                            @csrf
                                            <!--begin::Form Wizard Step 1-->
                                            <div class="pb-5" data-wizard-type="step-content"
                                                data-wizard-state="current">
                                                <h3 class="mb-10 font-weight-bold text-dark">SELECTIONNER UNE DATE POUR EXPORTATER </h3>
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="form-group row">
                                                            <div class="col-lg-9 col-xl-9">
                                                                <div
                                                                    class="input-group input-group-lg input-group-solid">
                                                                    <input type="date"
                                                                        class="form-control form-control-lg form-control-solid"
                                                                        name="startDate" id="startDate" />
                                                                    <div class="input-group-append"><span
                                                                            class="input-group-text">.DE</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-lg-9 col-xl-9">
                                                                <div
                                                                    class="input-group input-group-lg input-group-solid">
                                                                    <input type="date"
                                                                        class="form-control form-control-lg form-control-solid"
                                                                        name="endDate" id="endDate" />
                                                                    <div class="input-group-append"><span
                                                                            class="input-group-text">.A</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Form Wizard Step 1-->
                                            <!--begin::Wizard Actions-->
                                            <div class="d-flex justify-content-between border-top pt-10">
                                                <div class="mr-2">
                                                    <!--begin::Dropdown-->
                                                    <div class="dropdown dropdown-inline mr-2">
                                                        <button type="button"
                                                            class="btn btn-light-primary font-weight-bolder dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <span class="svg-icon svg-icon-md">
                                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg--><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    width="24px" height="24px" viewBox="0 0 24 24"
                                                                    version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <rect x="0" y="0"
                                                                            width="24" height="24" />
                                                                        <path
                                                                            d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                                                                            fill="#000000" opacity="0.3" />
                                                                        <path
                                                                            d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                                                                            fill="#000000" />
                                                                    </g>
                                                                </svg>
                                                                <!--end::Svg Icon-->
                                                            </span> Gererateur de rapport
                                                        </button>
                                                        <!--begin::Dropdown Menu-->
                                                        <div
                                                            class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                            <!--begin::Navigation-->
                                                            <ul class="navi flex-column navi-hover py-2">
                                                                <li
                                                                    class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
                                                                    Choisissez une option:
                                                                </li>
                                                                <li class="navi-item">
                                                                    <a href="#" class="navi-link">
                                                                        <button type="submit"
                                                                            class="btn btn-secondary btn-sm"
                                                                            name="exportDebPDF"><i
                                                                                class="far fa-file-pdf"></i>Deblocage d'un moment</button>
                                                                    </a>
                                                                </li>
                                                                <li class="navi-item">
                                                                    <a href="#" class="navi-link">
                                                                        <button type="submit"
                                                                            class="btn btn-secondary btn-sm"
                                                                            name="exportClientRePDF"><i
                                                                                class="far fa-file-pdf"></i>Clients en retart</button>
                                                                    </a>
                                                                </li>
                                                                <li class="navi-item">
                                                                    <a href="#" class="navi-link">
                                                                        <button type="submit"
                                                                            class="btn btn-secondary btn-sm"
                                                                            name="exportClientRej"><i
                                                                                class="far fa-file-pdf"></i>Clients Rejetés</button>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <!--end::Navigation-->
                                                        </div>
                                                        <!--end::Dropdown Menu-->
                                                    </div>
                                                    <!--end::Dropdown-->
                                                </div>
                                            </div>
                                            <!--end::Wizard Actions-->
                                        </form>
                                        <!--end::Form Wizard Form-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Wizard-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Container--> --}}

                <div class="container my-10">
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <h3 class="mb-10 font-weight-bold text-dark">FILTRER ET EXPORTATER PAR LE STATUS OU LE </h3>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Status</label>
                                        </div>
                                        <select class="custom-select" id="select_sts">
                                            <option value="">Choisir...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Status vsrmt</label>
                                        </div>
                                        <select class="custom-select" id="select_vers">
                                            <option value="">Choisir...</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button id="filter_status" class="btn btn-sm btn-outline-info">Filtré</button>
                                <button id="reset_status" class="btn btn-sm btn-outline-warning">Annulé</button>
                            </div><br>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <!-- Table -->
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-checkable"
                                            style="margin-top: 13px !important" id="record_table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>N Client</th>
                                                    <th>Nom & Prénom</th>
                                                    <th>Téléphones</th>
                                                    <th>Recruté / Agent comm</th>
                                                    <th>Status</th>
                                                    <th>Status Vrsmt</th>
                                                    <th>Date de deblocage</th>
                                                    <th>Mt. debloqué</th>
                                                </tr>
                                            </thead>

                                            <tfoot>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>N Client</th>
                                                    <th>Nom & Prénom</th>
                                                    <th>Téléphones</th>
                                                    <th>Recruté / Agent comm</th>
                                                    <th>Status</th>
                                                    <th>Status Vrsmt</th>
                                                    <th>Date de deblocage</th>
                                                    <th>Mt. debloqué</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <h3 class="mb-10 font-weight-bold text-dark">SELECTIONNER DEUX DATES POUR FILTRER ET EXPORTATER
                            </h3>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text text-white" id="basic-addon1"><i
                                                    class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="start_date"
                                            placeholder="Date de début" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text text-white" id="basic-addon1"><i
                                                    class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="end_date" placeholder="Date de fin"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button id="filter" class="btn btn-outline-info btn-sm">Filtré</button>
                                <button id="reset" class="btn btn-outline-warning btn-sm">Annulé</button>
                            </div>
                            <br>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <!-- Table -->
                                    <div class="card-body">
                                        <table class="table table-separate table-head-custom table-checkable"
                                            id="records">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>N Client</th>
                                                    <th>Nom & Prénom</th>
                                                    <th>Téléphones</th>
                                                    <th>Recruté / Agent comm</th>
                                                    <th>Status</th>
                                                    <th>Status Vrsmt</th>
                                                    <th>Mt. debloqué</th>
                                                    <th>Cs. Versé</th>
                                                    <th>Mt. Remboursé</th>
                                                    <th>Rst. A Payé</th>
                                                    <th>Dt deblocage</th>
                                                    <th>Dt Remboursement</th>
                                                </tr>
                                            </thead>

                                            <tfoot>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>N Client</th>
                                                    <th>Nom & Prénom</th>
                                                    <th>Téléphones</th>
                                                    <th>Recruté / Agent comm</th>
                                                    <th>Status</th>
                                                    <th>Status Vrsmt</th>
                                                    <th>Mt. debloqué</th>
                                                    <th>Cs. Versé</th>
                                                    <th>Mt. Remboursé</th>
                                                    <th>Rst. A Payé</th>
                                                    <th>Dt deblocage</th>
                                                    <th>Dt Remboursement</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/script.js') }}"></script>
    <script>
        //datepicker
        $(function() {
            $("#start_date").datepicker({
                "dateFormat": "dd-mm-YYYY"
            });
            $("#end_date").datepicker({
                "dateFormat": "dd-mm-YYYY"
            });
        });

        // Fetch records
        function fetch_tab(start_date, end_date) {
            $.ajax({
                url: "{{ route('versements.recordVersement') }}",
                type: "GET",
                data: {
                    start_date: start_date,
                    end_date: end_date
                },
                dataType: "json",
                success: function(data) {
                    // Datatables
                    var i = 1;
                    $('#records').DataTable({
                        "data": data.versements,
                        // buttons
                        "dom": "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                            "<'row'<'col-sm-12'tr>>" +
                            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                        "buttons": [

                            {
                                extend: 'copyHtml5',
                                footer: true,
                                exportOptions: {
                                    columns: [0, ':visible']
                                }
                            },
                            {
                                extend: 'excelHtml5',
                                footer: true,
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'csvHtml5',
                                footer: true,
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                footer: true,
                                exportOptions: {
                                    columns: [0, 1, 2, 3,4,5]
                                }
                            },
                            'colvis'
                        ],



                        // responsive
                        responsive: true,
                        pageLength: 5,
                        lengthMenu: [
                            [2, 5, 10, 15, -1],
                            [2, 5, 10, 15, 'All']
                        ],

                        "footerCallback": function(row, data, start, end, display) {
                            var columnCs = 8;
                            var columnDb = 7;
                            var columnRp = 9;
                            var columnMr = 10;
                            var api = this.api(),
                                data;

                            // Remove the formatting to get integer data for summation
                            var intVal = function(i) {
                                return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 :
                                    typeof i === 'number' ? i : 0;
                            };

                            // Total over all pages commission recu
                            var totalCs = api.column(columnCs).data().reduce(function(a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);

                            // Total over all pages montant debloquer
                            var totalDb = api.column(columnDb).data().reduce(function(a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);

                            // Total over all pages montant remboursé
                            var totalMr = api.column(columnMr).data().reduce(function(a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);

                            // Total over all pages reste a paye
                            var totalRp = api.column(columnRp).data().reduce(function(a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);

                            ////////////////////////////////////////////////////////////////

                            // Total over this page commission recu
                            var pageTotalCs = api.column(columnCs, {
                                page: 'current'
                            }).data().reduce(function(a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);

                            // Total over this page montant debloquer
                            var pageTotalDb = api.column(columnDb, {
                                page: 'current'
                            }).data().reduce(function(a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);

                            // Total over this page reste a paye
                            var pageTotalRp = api.column(columnRp, {
                                page: 'current'
                            }).data().reduce(function(a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);

                            // Total over this page montant remboursé
                            var pageTotalMr = api.column(columnMr, {
                                page: 'current'
                            }).data().reduce(function(a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);

                            ////////////////////////////////////////////////

                            // Update footer commission recu
                            $(api.column(columnCs).footer()).html(
                                KTUtil.numberString(pageTotalCs) + ' fcfa <br/> (Total Cs: ' +
                                KTUtil
                                .numberString(totalCs) + ' fcfa)',
                            );

                            // Update footer montant debloquer
                            $(api.column(columnDb).footer()).html(
                                KTUtil.numberString(pageTotalDb) + ' fcfa <br/> (Total Db: ' +
                                KTUtil
                                .numberString(totalDb) + ' fcfa)',
                            );

                            // Update footer reste a paye
                            $(api.column(columnRp).footer()).html(
                                KTUtil.numberString(pageTotalRp) + ' fcfa <br/> (Total Rp: ' +
                                KTUtil
                                .numberString(totalRp) + ' fcfa)',
                            );

                            // Update footer montant remboursé
                            $(api.column(columnMr).footer()).html(
                                KTUtil.numberString(pageTotalMr) + ' fcfa <br/> (Total Mr: ' +
                                KTUtil
                                .numberString(totalMr) + ' fcfa)',
                            );
                        },

                        "columns": [{
                                "data": "id",
                                "render": function(data, type, row, meta) {
                                    return i++;
                                }
                            },
                            {
                                "data": "client.numb_cli",
                                "render": function(data, type, row, meta) {
                                    return `${row.client.numb_cli}`;
                                }
                            },
                            {
                                "data": "client.name",
                                render: function render(data, type, row, meta) {
                                    var output;
                                    output = '<div class="d-flex align-items-center">' +
                                        '<div class="d-flex justify-content-start flex-column">' +
                                        '<a href="#" class="font-weight-bolder text-primary mb-1 fs-6">' +
                                        row.client.name +
                                        '</a>' +
                                        '<a href="#" class="font-weight-bolder text-primary mb-1 fs-6"> ' +
                                        row.client.lastname +
                                        '</a>' + '</div>' +
                                        '</div>';
                                    return output;
                                }
                            },
                            {
                                data: 'client.first_phone',
                                render: function render(data, type, row, meta) {
                                    return '<span style="width: 250px;">' +
                                        '<div class="d-flex align-items-center">' +
                                        '<div class="ml-0">' +
                                        '<div class="text-dark-75 font-weight-bolder font-size-lg mb-0">Tel 1: ' +
                                        row.client.first_phone +
                                        '</div>' +
                                        ' <a class="text-muted font-weight-bold text-hover-primary"> Tel 2: ' +
                                        row
                                        .client.second_phone + '</a>' +
                                        '</div>' +
                                        '</div>' +
                                        '</span>';
                                }
                            },
                            {
                                "data": "client.user.firstname",
                                render: function render(data, type, row, meta) {
                                    var output;
                                    output = '<div class="d-flex align-items-center">' +
                                        '<div class="d-flex justify-content-start flex-column">' +
                                        '<a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 fs-6">' +
                                        row.client.user.firstname +
                                        '</a>' +
                                        '<a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 fs-6"> ' +
                                        row.client.user.lastname +
                                        '</a>' + '</div>' +
                                        '</div>';
                                    return output;
                                }
                            },
                            {
                                data: 'status',
                                render: function render(data, type, row, meta) {
                                    var status = ' ';
                                    var label;
                                    var value = data;
                                    switch (value) {
                                        case "Non remboursé":
                                            label = "label-light-danger";
                                            break;
                                        case "Remboursement partiel":
                                            label = "label-light-warning";
                                            break;
                                        default:
                                            label = "label-light-success";
                                    }

                                    if (typeof value === 'undefined') {
                                        return value;
                                    }
                                    status = status + ' ' + '<span class="label fs-7 m-1 ' +
                                        label + ' label-inline">' +
                                        value +
                                        '</span>';

                                    return status;

                                }
                            },
                            {
                                "data": 'status_news_versement',
                            },

                            {
                                "data": "montant_octroye",
                                "render": function(data, type, row, meta, display) {
                                    return `${row.montant_octroye}`;
                                }
                            },
                            {
                                "data": "commission_verse",
                                "render": function(data, type, row, meta, display) {
                                    return `${row.commission_verse}`;
                                }
                            },
                            {
                                "data": "somme_verse",
                                "render": function(data, type, row, meta, display) {
                                    return `${row.somme_verse}`;
                                }
                            },
                            {
                                "data": "reste_apaye",
                                "render": function(data, type, row, meta, display) {
                                    return `${row.reste_apaye}`;
                                }
                            },
                            {
                                "data": "debut",
                                "render": function(data, type, row, meta) {
                                    return moment(row.debut).format('DD/MM/YYYY');
                                }
                            },
                            {
                                "data": "fin",
                                "render": function(data, type, row, meta) {
                                    return moment(row.fin).format('DD/MM/YYYY');
                                }
                            }
                        ]
                    });
                }
            });
        }

        fetch_tab();


        // Filter
        $(document).on("click", "#filter", function(e) {
            e.preventDefault();
            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();
            if (start_date == "" || end_date == "") {
                alert("Veillez entré une date");
            } else {
                $('#records').DataTable().destroy();
                fetch_tab(start_date, end_date);
            }
        });

        // Reset seconds
        $(document).on("click", "#reset", function(e) {
            e.preventDefault();
            $("#start_date").val(''); // empty value
            $("#end_date").val('');
            $('#records').DataTable().destroy();
            fetch_tab();
        });


        // Fetch Standard
        function fetch_sts() {
            $.ajax({
                url: "{{ route('status') }}",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var stsBody = "";
                    for (var key in data) {
                        stsBody +=
                            `<option value="${data[key]['status']}">${data[key]['status']}</option>`;
                    }
                    $("#select_sts").append(stsBody);
                }
            });
        }

        fetch_sts();

        // Fetch Result
        function fetch_vers() {
            $.ajax({
                url: "{{ route('statusVersement') }}",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var versBody = "";
                    for (var key in data) {
                        versBody +=
                            `<option value="${data[key]['status_versement']}">${data[key]['status_versement']}</option>`;
                    }
                    $("#select_vers").append(versBody);
                }
            });
        }
    </script>
@endsection
