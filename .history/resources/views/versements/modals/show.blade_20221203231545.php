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

