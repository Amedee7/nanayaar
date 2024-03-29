<!-- Modal -->
<div class="modal fade" id="modal" data-bs-backdrop='static' tabindex="-1" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" style="width: 1000px!important;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Effectuer un versement</h5>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                </div>
            </div>
            
            <div class="modal-footer bgc-default-l5">
                <button type="button" id="sender" class="btn btn-primary" onclick="storeRecordRefresh();">
                    <span id="btn-load" class="spinner-border d-none spinner-border-sm" role="status" aria-hidden="true"> </span>
                    <b id="text-load" class="text-hide">Veuillez patienter</b>
                    <b id="text-fix">Enregistrer</b>
                </button>
                <button type="button" class="btn btn-secondary px-4" data-dismiss="modal">
                    Fermer
                </button>
            </div>
        </div>
    </div>
</div>

<script>
</script>

