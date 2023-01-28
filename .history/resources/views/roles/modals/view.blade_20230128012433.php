<div class="modal fade" id="modal" data-backdrop="static" data-backdrop-bg="bgc-grey-tp4" tabindex="-1" data-blur="true" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content border-0 shadow radius-1">
            <div class="modal-header">
                <h5 class="modal-title text-primary-d2" id="exampleModal2Label">
                    Détails du rôle
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body modal-scroll">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-custom" style="border: solid; border-color: black">
                            <div class="card-header">
                                <h5 class="card-title text-primary"><i class="fas fa-shield-alt"></i> Rôle</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for=""><strong>CODE</strong></label>
                                    <input value="{{$role->name}}" readonly name="name" type="text" class="form-control " id="id-form-field-1">
                                    <span class="name_err error text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="">LIBELLE</label>
                                    <input value="{{$role->display_name}}" readonly name="display_name" type="text" class="form-control " id="id-form-field-1">
                                    <span class="display_name_err error text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="">DESCRPTION</label>
                                    <textarea class="form-control" readonly name="description" id="">{{$role->description}}</textarea>
                                    <span class="description_err error text-danger"></span>
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
                                                            <input name="permissions[]" disabled  type="checkbox" {{ ($role->hasPermission($module.'-creer') ? 'checked' : '') }} name="permissions[]" value="{{ $module.'-creer' }}" >
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                @if (array_key_exists($module.'-lire',$permissions))
                                                    <div class="checkbox-inline">
                                                        <label class="checkbox checkbox-lg">
                                                            <input name="permissions[]" disabled type="checkbox" {{ ($role->hasPermission($module.'-lire') ? 'checked' : '') }} name="permissions[]" value="{{ $module.'-lire' }}" >
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                @if (array_key_exists($module.'-modifier',$permissions))
                                                    <div class="checkbox-inline">
                                                        <label class="checkbox checkbox-lg">
                                                            <input name="permissions[]" disabled type="checkbox" {{ ($role->hasPermission($module.'-modifier') ? 'checked' : '') }} name="permissions[]" value="{{ $module.'-modifier' }}" >
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                @if (array_key_exists($module.'-supprimer',$permissions))
                                                    <div class="checkbox-inline">
                                                        <label class="checkbox checkbox-lg">
                                                            <input name="permissions[]" disabled type="checkbox" {{ ($role->hasPermission($module.'-supprimer') ? 'checked' : '') }} name="permissions[]" value="{{ $module.'-supprimer' }}">
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
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
                                            <input disabled class="input-xlg bgc-blue" id="input1" type="checkbox" {{ ($role->hasPermission('utilisateur-changer statut') ? 'checked' : '') }} name="permissions[]" value="utilisateur-changer statut" >
                                            <span></span>
                                            Changer status utilisateur
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="checkbox-inline">
                                        <label class="checkbox checkbox-lg">
                                            <input disabled id="input2" type="checkbox" {{ ($role->hasPermission('statistique-voir sur tableau de bord') ? 'checked' : '') }} name="permissions[]" value="statistique-voir sur tableau de bord" >
                                            <span></span>
                                            Stats sur tableau de bord
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="checkbox-inline">
                                        <label class="checkbox checkbox-lg">
                                            <input disabled id="input4" type="checkbox" {{ ($role->hasPermission('configuration-regler') ? 'checked' : '') }} name="permissions[]" value="configuration-regler" >
                                            <span></span>
                                            Régler configuration
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 mt-4">
                                    <div class="checkbox-inline">
                                        <label class="checkbox checkbox-lg">
                                            <input disabled id="input8" type="checkbox" {{ ($role->hasPermission('log-cslt') ? 'checked' : '') }} name="permissions[]" value="log-cslt" >
                                            <span></span>
                                            Voir les logs
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 mt-5">
                                    <div class="checkbox-inline">
                                        <label class="checkbox checkbox-lg">
                                            <input disabled class="input-xlg bgc-blue" id="input1" type="checkbox" {{ ($role->hasPermission('client-status') ? 'checked' : '') }} name="permissions[]" value="client-status" >
                                            <span></span>
                                            Changer status client
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer bgc-default-l5">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Fermer
                </button>
            </div>
        </div>
    </div>
</div>
