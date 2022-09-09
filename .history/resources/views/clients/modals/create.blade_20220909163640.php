<div class="modal fade" id="modal" data-backdrop="static" >
    <div class="modal-dialog modal-xl" client="document">
        <div class="modal-content border-0 shadow radius-1">
            <div class="modal-header">
                <h5 class="modal-title text-primary-d2" id="exampleModal2Label">
                    Ajouter un client
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
            </div>

            <div class="modal-body modal-scroll">
                <form action="{{route('clients.store')}}" method="POST" id="o2d-record-form-datatable">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-custom" style="border: solid; border-color: black">
                                <div class="card-header">
                                    <h5 class="card-title text-primary"><i class="fas fa-shield-alt"></i> Client</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for=""><strong>NUMERO UNIQUE</strong></label>
                                        <input name="numb_cli" type="text" class="form-control " id="id-form-field-1">
                                        <span class="name_err error text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for=""><strong>NOM</strong></label>
                                        <input name="nom" type="text" class="form-control " id="id-form-field-1">
                                        <span class="name_err error text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for=""><strong>PRENOM</strong></label>
                                        <input name="prenom" type="text" class="form-control " id="id-form-field-1">
                                        <span class="name_err error text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for=""><strong>TELEPHONE 1</strong></label>
                                        <input name="first_phone" type="text" class="form-control " id="id-form-field-1">
                                        <span class="name_err error text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for=""><strong>TELEPHONE 2</strong></label>
                                        <input name="second_phone" type="text" class="form-control " id="id-form-field-1">
                                        <span class="name_err error text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">DATE DE NAISSANCE</label>
                                        <input name="date_naiss" type="date" class="form-control " id="id-form-field-1">
                                        <span class="display_name_err error text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">NUMERO CNIB</label>
                                        <input name="numb_cnib" type="text" class="form-control " id="id-form-field-1">
                                        <span class="display_name_err error text-danger"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="genre" class="">GENRE</label>

                                        <select class="form-control" name="genre">
                                            <option value="masculin" @if (old('genre') == 'masculin') selected="selected" @endif>masculin</option>
                                            <option value="feminin" @if (old('genre') == 'feminin') selected="selected" @endif>feminin</option>
                                        </select>
                                        <span class="role_err error text-danger"></span>
                                    </div>

                                        <div class="form-group">
                                            {{-- <label for="status" class= "col-md-4 col-form-label text-md-right">STATUS</label> --}}
                                            <input name="status" type="hidden" value="pending" class="form-control " id="id-form-field-1">
                                            {{-- <select class="form-control" name="status">
                                                <option value="pending" @if (old('status') == 'pending') selected="selected" @endif>En attente</option>
                                                <option value="accept" @if (old('status') == 'accept') selected="selected" @endif>Validé</option>
                                                <option value="reject" @if (old('status') == 'reject') selected="selected" @endif>Refusé</option>
                                            </select> --}}
                                            <span class="role_err error text-danger"></span>
                                        </div>
                                            <div class="form-group">
                                                <label for="mySelect2">AGENT COMMERCIAL</label>
        
                                                <select class="form-control" name="user">
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}" @if($loop->first) selected @endif>{{$user->firstname}} {{ $user->lastname}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="role_err error text-danger"></span>
                                            </div>
                                </div>
                            </div>

                    </div>
                </form>
            </div>

            <div class="modal-footer bgc-default-l5">
                <button type="button" id="sender" class="btn btn-primary" onclick="storeRecord();">
                    <span id="btn-load" class="spinner-border d-none spinner-border-sm" client="status" aria-hidden="true"> </span>
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
