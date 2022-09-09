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
                                        <input name="numb_cnib" type="date" class="form-control " id="id-form-field-1">
                                        <span class="display_name_err error text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">GENRE</label>

                                        <div class="form-check form-check-inline">
                                            <input name="genre" type="radio" class="form-control " value="Masculin" id="id-form-field-1">
                                            <label for="" class="form-check-label">M</label>
                                        <span class="role_err error text-danger"></span>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input name="genre" type="radio" class="form-control " value="Feminin" id="id-form-field-1">
                                            <label for="" class="form-check-label">F</label>
                                        <span class="role_err error text-danger"></span>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="">NUMERO CNIB</label>
                                        <input name="numb_cnib" type="date" class="form-control " id="id-form-field-1">
                                        <span class="display_name_err error text-danger"></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="card card-custom" style="border: solid; border-color: black">
                            <div class="card-header">
                                <h5 class="card-title text-primary"><i class="fas fa-fingerprint"></i> Droits d'accès</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th></th>
                                        <th>Créer</th>
                                        <th>Lire</th>
                                        <th>Modifier</th>
                                        <th>Supprimer</th>
                                    </tr>
                                    @foreach($modules as $module)
                                        <tr>
                                            <th>{{ ucfirst($module)}}</th>
                                            <td>
                                                @if (array_key_exists($module.'-creer',$permissions))
                                                    <div class="checkbox-inline">
                                                        <label class="checkbox checkbox-lg">
                                                            <input type="checkbox" name="permissions[]" value="{{ $module.'-creer' }}" >
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                @if (array_key_exists($module.'-lire',$permissions))
                                                    <div class="checkbox-inline">
                                                        <label class="checkbox checkbox-lg">
                                                            <input type="checkbox" name="permissions[]" value="{{ $module.'-lire' }}" >
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                @if (array_key_exists($module.'-modifier',$permissions))
                                                    <div class="checkbox-inline">
                                                        <label class="checkbox checkbox-lg">
                                                            <input type="checkbox" name="permissions[]" value="{{ $module.'-modifier' }}" >
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                @if (array_key_exists($module.'-supprimer',$permissions))
                                                    <div class="checkbox-inline">
                                                        <label class="checkbox checkbox-lg">
                                                            <input type="checkbox" name="permissions[]" value="{{ $module.'-supprimer' }}" >
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                <span class="permissions_err error text-danger"></span>
                            </div>
                        </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-custom" style="border: solid; border-color: black">
                                <div class="card-header">
                                    <h5 class="card-title text-primary"><i class="fas fa-fingerprint"></i> Droits d'accès particuliers</h5>
                                </div>
                                <div class="card-body row">

                                    <div class="col-md-3">
                                        <div class="checkbox-inline">
                                            <label class="checkbox checkbox-lg">
                                                <input type="checkbox" name="permissions[]" value="utilisateur-changer statut" >
                                                <span></span>
                                                Changer status utilisateur
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="checkbox-inline">
                                            <label class="checkbox checkbox-lg">
                                                <input type="checkbox" name="permissions[]" value="statistique-voir sur tableau de bord" >
                                                <span></span>
                                                Stats sur tableau de bord
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="checkbox-inline">
                                            <label class="checkbox checkbox-lg">
                                                <input type="checkbox" name="permissions[]" value="sous-operation-effectuer" >
                                                <span></span>
                                                Effectuer sous-opération
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="checkbox-inline">
                                            <label class="checkbox checkbox-lg">
                                                <input type="checkbox" name="permissions[]" value="configuration-regler" >
                                                <span></span>
                                                Régler configuration
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-3 mt-4">
                                        <div class="checkbox-inline">
                                            <label class="checkbox checkbox-lg">
                                                <input type="checkbox" name="permissions[]" value="sauvegarde-creer" >
                                                <span></span>
                                                Effectuer une sauvegarde
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mt-4">
                                        <div class="checkbox-inline">
                                            <label class="checkbox checkbox-lg">
                                                <input type="checkbox" name="permissions[]" value="sauvegarde-lire" >
                                                <span></span>
                                                Voir les sauvegardes
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mt-4">
                                        <div class="checkbox-inline">
                                            <label class="checkbox checkbox-lg">
                                                <input type="checkbox" name="permissions[]" value="archive-lire" >
                                                <span></span>
                                                Voir les archives
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mt-4">
                                        <div class="checkbox-inline">
                                            <label class="checkbox checkbox-lg">
                                                <input type="checkbox" name="permissions[]" value="log-lire" >
                                                <span></span>
                                                Voir les logs
                                            </label>
                                        </div>
                                    </div>
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
