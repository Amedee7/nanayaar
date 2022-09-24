<div class="modal fade" id="modal" data-backdrop="static">
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

                <form class="form" action="{{ route('clients.store') }}" method="POST">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label for=""><strong>NUMERO UNIQUE</strong></label>
                                <input name="numb_cli" type="text" class="form-control " id="id-form-field-1">
                                <span class="name_err error text-danger"></span>
                            </div>
                            <div class="col-lg-4">
                                <label for=""><strong>NOM</strong></label>
                                <input name="nom" type="text" class="form-control " id="id-form-field-1">
                                <span class="name_err error text-danger"></span>
                            </div>
                            <div class="col-lg-4">
                                <label>PRENOM:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="la la-user"></i></span>
                                    </div>
                                    <input name="prenom" type="text" class="form-control " id="id-form-field-1">
                                </div>
                                <span class="form-text text-muted">Please enter your username</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label>Contact 1:</label>
                                <input name="first_phone" type="text" class="form-control " id="id-form-field-1">
                                <span class="name_err error text-danger"></span>
                            </div>
                            <div class="col-lg-4">
                                <label>Contact 2:</label>
                                <input name="first_phone" type="text" class="form-control " id="id-form-field-1">
                                <span class="name_err error text-danger"></span>
                            </div>
                            <div class="col-lg-4">
                                <label for="">NUMERO CNIB</label>
                                <input name="numb_cnib" type="text" class="form-control " id="id-form-field-1">
                                <span class="display_name_err error text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label for="genre" class="">GENRE</label>

                                <select class="form-control" name="genre">
                                    <option value="masculin"
                                        @if (old('genre') == 'masculin') selected="selected" @endif>masculin
                                    </option>
                                    <option value="feminin"
                                        @if (old('genre') == 'feminin') selected="selected" @endif>feminin
                                    </option>
                                </select>
                                <span class="role_err error text-danger"></span>
                            </div>
                            <div class="col-lg-4">
                                {{-- <label for="status" class= "col-md-4 col-form-label text-md-right">STATUS</label> --}}
                                <input name="status" type="hidden" value="pending" class="form-control "
                                    id="id-form-field-1">
                                {{-- <select class="form-control" name="status">
                    <option value="pending" @if (old('status') == 'pending') selected="selected" @endif>En attente</option>
                    <option value="accept" @if (old('status') == 'accept') selected="selected" @endif>Validé</option>
                    <option value="reject" @if (old('status') == 'reject') selected="selected" @endif>Refusé</option>
                </select> --}}
                                <span class="role_err error text-danger"></span>
                            </div>
                            <div class="col-lg-4">
                                <label for="mySelect2">AGENT COMMERCIAL</label>
                                <select class="form-control" name="user">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            @if ($loop->first) selected @endif>
                                            {{ $user->firstname }} {{ $user->lastname }}</option>
                                    @endforeach
                                </select>
                                <span class="role_err error text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-8">
                                <button type="reset" class="btn btn-primary mr-2">Submit</button>
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
