<<!-- Modal -->
<div class="modal fade" id="modal" data-bs-backdrop='static' tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Initier une sortie de stock</h5>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
            </div>
            <div class="modal-body">
                <form action="{{route('clients.out.store')}}" method="post" id="evote-record-form-datatable">
                    @csrf
                    <div class="row mb-5">
                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                <span class="required">Clients</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Champs obligatoire"></i>
                            </label>
                            <select name="client" id="roles" data-placeholder="--Veuillez choisir--" class="form-select form-select select2-multiple">
                                <option value="">--Veuillez choisir--</option>
                                @foreach($clients as $item)
                                    <option value="{{$item->id}}">{{$item->name}} - {{$item->numb_cli}}</option>
                                @endforeach
                            </select>
                            <span class="client_err error text-danger"></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button onclick="storeRecord()" id="sender" class="btn btn-primary font-weight-bold">
                    <strong>
                        <b id="text-load" class="visually-hidden">Veuillez patienter... <div class="spinner-border" role="status"></div></b>
                        <b id="text-fix">Continuer</b>
                    </strong>
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

