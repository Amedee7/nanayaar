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
                                    <span class="font-weight-bolder mb-2">N E </span>
                                    <span class="opacity-70">Jan 07, 2020</span>
                                </div>
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">ORDER NO.</span>
                                    <span class="opacity-70">64616-103</span>
                                </div>
                                <div class="d-flex flex-column flex-root">
                                    <span class="font-weight-bolder mb-2">DATE D'OCTROI</span>
                                    <span class="opacity-70"><br />{{\Illuminate\Support\Carbon::make($versement->created_at)->format('d/m/Y à H:i:s') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end: Invoice header-->
    
                    <!-- begin: Invoice body-->
                    <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                        <div class="col-md-10">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="pl-0 font-weight-bold text-muted  text-uppercase">Ordered Items</th>
                                            <th class="text-right font-weight-bold text-muted text-uppercase">Qty</th>
                                            <th class="text-right font-weight-bold text-muted text-uppercase">Unit Price</th>
                                            <th class="text-right pr-0 font-weight-bold text-muted text-uppercase">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="font-weight-boldest">
                                            <td class="border-0 pl-0 pt-7 d-flex align-items-center">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-40 flex-shrink-0 mr-4 bg-light">
                                                    <div class="symbol-label" style="background-image: url('assets/media/products/11.png')"></div>
                                                </div>
                                                <!--end::Symbol-->
                                                Street Sneakers
                                            </td>
                                            <td class="text-right pt-7 align-middle">2</td>
                                            <td class="text-right pt-7 align-middle">$90.00</td>
                                            <td class="text-primary pr-0 pt-7 text-right align-middle">$180.00</td>
                                        </tr>
                                        <tr class="font-weight-boldest border-bottom-0">
                                            <td class="border-top-0 pl-0 py-4 d-flex align-items-center">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-40 flex-shrink-0 mr-4 bg-light">
                                                    <div class="symbol-label" style="background-image: url('assets/media/products/2.png')"></div>
                                                </div>
                                                <!--end::Symbol-->
                                                Headphones
                                            </td>
                                            <td class="border-top-0 text-right py-4 align-middle">1</td>
                                            <td class="border-top-0 text-right py-4 align-middle">$449.00</td>
                                            <td class="text-primary border-top-0 pr-0 py-4 text-right align-middle">$449.00</td>
                                        </tr>
                                        <tr class="font-weight-boldest border-bottom-0">
                                            <td class="border-top-0 pl-0 py-4 d-flex align-items-center">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-40 flex-shrink-0 mr-4 bg-light">
                                                    <div class="symbol-label" style="background-image: url('assets/media/products/1.png')"></div>
                                                </div>
                                                <!--end::Symbol-->
                                                Smartwatch
                                            </td>
                                            <td class="border-top-0 text-right py-4 align-middle">1</td>
                                            <td class="border-top-0 text-right py-4 align-middle">$160.00</td>
                                            <td class="text-primary border-top-0 pr-0 py-4 text-right align-middle">$160.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end: Invoice body-->
    
                    <!-- begin: Invoice footer-->
                    <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0 mx-0">
                        <div class="col-md-10">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="font-weight-bold text-muted  text-uppercase">PAYMENT TYPE</th>
                                            <th class="font-weight-bold text-muted  text-uppercase">PAYMENT STATUS</th>
                                            <th class="font-weight-bold text-muted  text-uppercase">PAYMENT DATE</th>
                                            <th class="font-weight-bold text-muted  text-uppercase text-right">TOTAL PAID</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="font-weight-bolder">
                                            <td>Credit Card</td>
                                            <td>Success</td>
                                            <td>Jan 07, 2020</td>
                                            <td class="text-primary font-size-h3 font-weight-boldest text-right">$789.00</td>
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

