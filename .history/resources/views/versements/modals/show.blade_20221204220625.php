<div class="modal fade" id="modal" data-backdrop="static" data-backdrop-bg="bgc-grey-tp4" data-blur="true"
    style="display: none;" n="truearia-hidde">
    <div class="modal-dialog modal-dialog-centered" style="width: 1000px" role="document">
        <div class="modal-content border-0 shadow radius-1">
            <div class="modal-body modal-scroll">
                <div class="card-body p-0">
                    <!-- begin: Invoice-->
                    <!-- begin: Invoice header-->
                    <div class="row justify-content-center py-5 px-5 py-md-10 px-md-0">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                                <h1 class="display-4 font-weight-boldest mb-10">Détails <br> du versement</h1>
                                <br>
                                <div class="d-flex flex-column align-items-md-end px-0">
                                    <!--begin::numero-->
                                    <span class="label label-light-success label-inline">{{ $versement->identifier }}</span>
                                    <!--end::numero-->
                                    <span class=" d-flex flex-column align-items-md-end opacity-70">
                                        Etat: <span
                                            class="display-4 label label-light-{{ $versement->state == 'En cours' ? 'warning' : 'success' }} label-inline">{{ $versement->state }}</span>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                                <div class="d-flex flex-column align-items-md-end px-0">
                                   Enrollé par l'agent Com : <span class="label label-light-info label-inline">{{$versement->full_name_user}}</span>
                                </div>
                            </div>
                            <div class="border-bottom w-100"></div>
                            <div class="d-flex justify-content-between pt-6">
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">CLIENT</span>
                                    <span class=" label label-light-primary label-inline opacity-70 font-weight-bolder" >{{ $versement->full_name_client }}</span>
                                </div>
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">DATE D'OCTROI</span>
                                    <span
                                        class="opacity-70">{{ \Illuminate\Support\Carbon::make($versement->created_at)->format("d/m/Y".  <br> à "H:i:s") }}</span>
                                </div>

                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">STATU</span>
                                    <div class="fw-bolder fs-6 text-gray-800">
                                        @if ($versement->status == 'Payé')
                                            <span class="label label-light-success label-inline">{{ $versement->status }}</span>
                                        @elseif($versement->status == 'Paiement partiel')
                                            <span class="label label-light-warning label-inline">{{ $versement->status }}</span>
                                        @elseif($versement->status == 'Non payé')
                                            <span class="label label-light-danger label-inline">{{ $versement->status }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end: Invoice header-->

                    <!-- begin: Invoice footer-->
                    <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0 mx-0">
                        <div class="col-md-10">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="font-weight-bold text-muted  text-uppercase ">RESTE A PAYER</th>
                                            <th class="font-weight-bold text-muted  text-uppercase">SOMME PAYEE</th>
                                            <th class="font-weight-bold text-muted  text-uppercase text-right">MONTANT A
                                                REMBOUSE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="font-weight-bolder">
                                            <td><span
                                                    class="label label-light-success label-inline">{{ number_format($versement->reste_apaye, 0, '.', ' ') }}
                                            </td>
                                            <td><span
                                                    class="label label-light-warning label-inline">{{ number_format($versement->somme_verse, 0, '.', ' ') }}
                                            </td>
                                            <td class="text-primary font-size-h3 font-weight-boldest text-right">
                                                {{ number_format($versement->montant_octroye, 0, '.', ' ') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end: Invoice footer-->

                    <!-- end: Invoice-->
                </div>
            </div>
            <div class="modal-footer bgc-default-l5">
                <button type="button" class="btn btn-secondary px-4" data-dismiss="modal">
                    Fermer
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Select2 Multiple
        $('.select2-multiple').select2({
            dropdownParent: $("#modal"),
            placeholder: "Select",
            allowClear: true
        });

    });
</script>
