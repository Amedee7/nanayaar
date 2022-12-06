<div class="modal fade" id="modal" data-backdrop="static" data-backdrop-bg="bgc-grey-tp4" data-blur="true" style="display: none;" n="truearia-hidde">
    <div class="modal-dialog modal-dialog-centered" style="width: 1000px" role="document">
        <div class="modal-content border-0 shadow radius-1">
            <div class="modal-header">
                <h5 class="modal-title text-primary-d2" id="exampleModal2Label">
                    Détails de l'utilisateur
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>


            <div class="modal-footer bgc-default-l5">
                <button type="button" class="btn btn-lighter-grey px-4" data-dismiss="modal">
                    Fermer
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    jQuery(function($) {
        $("#mySelect2").select2({
            dropdownParent: $("#modal"),
            width: '100%',
        });
    });
</script>
