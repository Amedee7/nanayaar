<div class="modal fade" id="modal" data-backdrop="static" data-backdrop-bg="bgc-grey-tp4" data-blur="true" style="display: none;" n="truearia-hidde">
    <div class="modal-dialog modal-dialog-centered" style="width: 1100px" role="document">
        <div class="modal-content border-0 shadow radius-1">
            <div class="modal-header">
                <h5 class="modal-title text-primary-d2" id="exampleModal2Label">Modifier une ecole</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body modal-scroll">
                <form action="{{route('ecoles.update', $ecole->id)}}" method="POST" id="o2d-edit-record-form">
                    @method('PATCH')
                    @csrf
                    
                    <div class="form-group">
                        <label for="">NOM*</label>
                        <input type="text" name="school_name" class="form-control" value="{{$ecole->school_name}}" id="id-form-field-1">
                        <span class="year_err error text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label for="">EMAIL*</label>
                        <input  type="email" name="email" id="email" placeholder="" class="form-control " value="{{$ecole->email}}" id="id-form-field-2">
                        <span class="title_err error text-danger"></span>
                    </div>
                        <div class="form-group">
                        <label for="">ADRESSE*</label>
                        <input type="text" name="address" class="form-control" value="{{$ecole->address}}" id="id-form-field-3">
                        <span class="starting_date_err error text-danger"></span>
                    </div>
                        <div class="form-group">
                        <label for="">TELEPHONE*</label>
                        <input type="phone" name="phone" class="form-control" value="{{$ecole->phone}}" id="id-form-field-4">
                        <span class="ending_date_err error text-danger"></span>
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

