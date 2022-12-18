
<<!-- Modal -->
<div class="modal fade" id="modal" data-bs-backdrop='static' tabindex="-1" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" style="width: 1000px!important;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Terminer la commande</h5>
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
                <div class="card card-xl-stretch mb-5 mb-xl-8">
                    <div class="card-body p-0">
                        <div class="px-9 pt-6 card-rounded h-225px w-100 bg-success">
                            <div class="d-flex text-center flex-column text-white pt-5">
                                <span class="fw-bold fs-7">Total à payer</span>
                                <span class="fw-bolder fs-2x pt-1">{{number_format($versement->montant_octroye,0, '.',' ')}} Fcfa</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center bg-light-info rounded p-5">
                    <span class="svg-icon svg-icon-info me-5">
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                    <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                    <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                                </g>
                            </svg>
                        </span>
                    </span>
                    <div class="flex-grow-1 me-2">
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">Client concerné</a>
                        <span class="text-muted fw-bold d-block">{{$client->name}}</span>
                    </div>
                    <span class="fw-bolder text-info py-1">N Client: {{$client->numb_cli}}</span>
                </div>
                <br>
                <form action="{{route('stocks.outer.finish', $outStock->id)}}" method="post" id="evote-record-form-datatable">
                    @csrf
                    @method('PATCH')
                    <input name="products" value="{{$listProducts}}" hidden>
                    <div class="row mb-5">
                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                <span class="required">Somme payé</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Champs obligatoire"></i>
                            </label>
                            <input type="number" class="form-control" name="somme">
                            <span class="somme_err error text-danger"></span>
                        </div>
                        <div class="col-md-12 fv-row fv-plugins-icon-container mt-4">
                            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                <span class="required">Commentaire</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Champs obligatoire"></i>
                            </label>
                            <textarea name="commentaire" class="form-control" placeholder="Commentaire"></textarea>
                            <span class="commentaire_err error text-danger"></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>

                @permission('commande-modifier')
                <button onclick="storeRecordRefresh()" id="sender" class="btn btn-primary font-weight-bold">
                    <strong>
                        <b id="text-load" class="visually-hidden">Veuillez patienter... <div class="spinner-border" role="status"></div></b>
                        <b id="text-fix">Continuer</b>
                    </strong>
                </button>
                @endpermission
            </div>
        </div>
    </div>
</div>

<script>
    $('#kt_docs_jstree_basic').jstree({
        "core" : {
            "themes" : {
                "responsive": true
            }
        },
        "types" : {
            "default" : {
                "icon" : "fa fa-cube"
            },
            "file" : {
                "icon" : "fa fa-file"
            }
        },
        "plugins": ["types"]
    });



</script>
