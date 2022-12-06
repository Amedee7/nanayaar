<div class="modal fade" id="modal" data-bs-backdrop='static' tabindex="-1" >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Modifier le montant demandé<i class="mdi mdi-contactless-payment-circle-outline:"></i></h5>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="modal-body">
                <form action="{{route('clients.montant.update')}}" method="post" id="o2d-edit-record-form">
                    @csrf
                    <div class="row mb-5 border-right-1 border-danger">
                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                <span class="required">Montant disponible</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Champs obligatoire"></i>
                            </label>
                            <input type="number"  name="montant_demande" class="form-control">
                            <span class="montant_demande_err error text-danger"></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer bgc-default-l5">
                <button type="button" id="sender" class="btn btn-primary" onclick="updateRecord();">
                    <span id="btn-load" class="spinner-border d-none spinner-border-sm" role="status" aria-hidden="true"> </span>
                    <b id="text-load" class="text-hide">Veuillez patienter</b>
                    <b id="text-fix">Enregistrer</b>
                </button>
                <button type="button" class="btn btn-lighter-grey px-4" data-dismiss="modal">
                    Fermer
                </button>
            </div>
        </div>
    </div>
</div>

