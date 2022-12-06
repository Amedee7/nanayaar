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
                <form action="{{route('users.profile.password.update')}}" method="post" id="evote-record-form-datatable">
                    @csrf
                    <div class="row mb-5 border-right-1 border-danger">
                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                <span class="required">Ancien mot de passe</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Champs obligatoire"></i>
                            </label>
                            <input type="password"  name="password" class="form-control">
                            <span class="password_err error text-danger"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row mb-5 border-success">
                        <div class="col-md-6 fv-row fv-plugins-icon-container ">
                            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                <span class="required">Nouveau mot de passe</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Champs obligatoire"></i>
                            </label>
                            <input type="text" name="new_password" class="form-control">
                            <span class="new_password_err error text-danger"></span>
                        </div>
                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                <span class="required">Resaisir le nouveau</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Champs obligatoire"></i>
                            </label>
                            <input type="text" name="renew_password" class="form-control">
                            <span class="renew_password_err error text-danger"></span>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>

                <button onclick="storeRecordRefresh()" id="sender" class="btn btn-primary font-weight-bold">
                    <strong>
                        <b id="text-load" class="visually-hidden">Veuillez patienter... <div class="spinner-border" role="status"></div></b>
                        <b id="text-fix">Enregistrer</b>
                    </strong>
                </button>
            </div>
        </div>
    </div>
</div>

