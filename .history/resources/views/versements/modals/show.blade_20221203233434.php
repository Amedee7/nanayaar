<div class="modal fade" id="modal" data-backdrop="static" data-backdrop-bg="bgc-grey-tp4" data-blur="true" style="display: none;" n="truearia-hidde">
    <div class="modal-dialog modal-dialog-centered" style="width: 1000px" role="document">
        <div class="modal-content border-0 shadow radius-1">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Détails du versement
                    <span class="badge badge-light-success">{{$versement->identifier}}</span> |
                    Etat: <span class="badge badge-light-{{$versement->state=="En cours"?"warning":"success"}}">{{$versement->state}}</span>
                </h5>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="modal-body modal-scroll">
                <div class="card-body p-0">
                    <!-- begin: Invoice-->
                    <!-- begin: Invoice header-->
                    <div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">
                        <div class="col-md-10">
                            <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                                <h1 class="display-4 font-weight-boldest mb-10">Détails du versement</h1>
                                <div class="d-flex flex-column align-items-md-end px-0">
                                    <!--begin::numero-->
                                    <span class="badge badge-light-success">{{$versement->identifier}}</span> |
                                    <!--end::numero-->
                                    <span class=" d-flex flex-column align-items-md-end opacity-70">
                                        Etat: <span class="badge badge-light-{{$versement->state=="En cours"?"warning":"success"}}">{{$versement->state}}</span>
                                    </span>
                                </div>
                            </div>
                            <div class="border-bottom w-100"></div>
                            <div class="d-flex justify-content-between pt-6">
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">N DE VERSEMENT</span>
                                    <span class="opacity-70">{{$versement->identifier}}</span>
                                </div>
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">CLIENT</span>
                                    <span class="opacity-70">64616-103</span>
                                </div>
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">DATE D'OCTROI</span>
                                    <span class="opacity-70"><br />{{\Illuminate\Support\Carbon::make($versement->created_at)->format('d/m/Y à H:i:s') }}</span>
                                </div>

                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">STATU</span>
                                    <div class="fw-bolder fs-6 text-gray-800">
                                        @if($versement->status=="Payé")
                                        <span class="badge badge-light-success">{{$versement->status}}</span>
                                        @elseif($versement->status=="Paiement partiel")
                                        <span class="badge badge-light-warning">{{$versement->status}}</span>
                                        @elseif($versement->status=="Non payé")
                                        <span class="badge badge-light-danger">{{$versement->status}}</span>
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
                                            <th class="font-weight-bold text-muted  text-uppercase">MONTANT A REMBOUSE</th>
                                            <th class="font-weight-bold text-muted  text-uppercase">SOMME PAYEE</th>
                                            <th class="font-weight-bold text-muted  text-uppercase text-right">RESTE A PAYER</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="font-weight-bolder">
                                            <td><span class="badge badge-light-success">{{number_format($versement->montant_octroye,0, '.',' ')}}</td>
                                            <td><span class="badge badge-light-warning">{{number_format($versement->somme_paye,0, '.',' ')}}</td>
                                            <td><span class="text-primary font-size-h3 font-weight-boldest text-right"><span class="badge badge-light-success">{{number_format($versement->montant_octroye,0, '.',' ')}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end: Invoice footer-->
    
                    <!-- begin: Invoice action-->
                    <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                        <div class="col-md-10">
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-light-primary font-weight-bold" onclick="window.print();">Download Order Details</button>
                                <button type="button" class="btn btn-primary font-weight-bold" onclick="window.print();">Print Order Details</button>
                            </div>
                        </div>
                    </div>
                    <!-- end: Invoice action-->
    
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

