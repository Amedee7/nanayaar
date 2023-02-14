@extends('layouts.app')
@section('title', 'Administration - Liste des utilisateurs')
@section('content')
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Ajouter un client</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-3 container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-1">
            <div class="d-flex align-items-baseline flex-wrap mr-5">
                <h5 class="text-dark font-weight-bolder my-1 mr-5">
                    <span class="flaticon-user-add primary-color icon-lg"></span>
                    Création d'un nouveau client. <a href="{{ route('clients.index') }}"><span
                            class="flaticon-up-arrow-1"></span> Retour à la liste</a>
                </h5>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <div class="btn-group dropup">
                <div class="btn-group dropup">
                    <button onclick="updateRecord()" id="sender" type="button" class="btn btn-primary">
                        <strong>
                            <b id="text-load" class="text-hide">Veuillez patienter...</b>
                            <b id="text-fix"><span class="flaticon-file-1 mr-2"></span> Enregistrer</b>
                        </strong>
                    </button>
                    <button type="button" class="btn btn-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" style="">
                        <a class="dropdown-item" href="#"><span class="flaticon-interface-4 mr-2"></span> Enregistrer
                            et nouveau</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column-fluid">
        <div class="container col-md-12">
            <form action="{{ route('clients.update', $client->id) }}" method="post" id="o2d-edit-record-form">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="tab-content mt-5" id="myTabContent">
                    <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel"
                        aria-labelledby="kt_tab_pane_2">

                        <div class="row example-preview" id="student_block">
                            <div class="col-md-8">
                                <div class="card card-custom">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h3 class="card-label">
                                                <span class="flaticon-list icon-lg primary-color"></span>
                                                Informations générales du client
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="box-body col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Numero client <span
                                                            class="text-danger">*</span></label>
                                                    <input readonly type="text" class="form-control" name="numb_cli"
                                                        value="{{ $client->numb_cli }}">
                                                    <span class="numb_cli_err error text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="box-body col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Nom <span
                                                            class="text-danger">*</span></label>
                                                    <input value="{{ $client->name }}" type="text" class="form-control"
                                                        name="nom" placeholder="Entrer le nom">
                                                    <span class="nom_err error text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="box-body col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Prenom <span
                                                            class="text-danger">*</span></label>
                                                    <input value="{{ $client->lastname }}" type="text"
                                                        class="form-control" name="prenom" placeholder="Entrer le prenom">
                                                    <span class="prenom_err error text-danger"></span>
                                                </div>
                                            </div>

                                            <div class="box-body col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Genre <span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-control" name="genre" style="width: 100%">
                                                        <option value="Masculin">Masculin</option>
                                                        <option value="Féminin">Féminin</option>
                                                    </select>
                                                    <span class="genre_err error text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="box-body col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Date de naissance <span
                                                            class="text-danger">*</span></label>
                                                    <input value="{{ $client->date_naiss }}" type="date"
                                                        class="form-control" name="date_naissance">
                                                    <span class="date_naissance_err error text-danger"></span>
                                                </div>
                                            </div>

                                            {{-- <div class="box-body col-md-6">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" name="status">
                                                    <span class="status_err error text-danger"></span>
                                                </div>
                                            </div> --}}

                                            <div class="box-body col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Montant demander <span
                                                            class="text-danger">*</span></label>
                                                    <input value="{{ $client->montant_demande }}" type="number"
                                                        class="form-control" name="montant_demande"
                                                        placeholder="Entrer le montant demander">
                                                    <span class="montant_demande_err error text-danger"></span>
                                                </div>
                                            </div>

                                            <div class="box-body col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Numero CNID <span
                                                            class="text-danger">*</span></label>
                                                    <input value="{{ $client->numb_cnib }}" type="text"
                                                        class="form-control" name="numero_cnib"
                                                        placeholder="Entrer le numero de la CNIB">
                                                    <span class="numero_cnib_err error text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputPassword1">Agent commercial</label>
                                                <select value="{{ $client->user->lastname }}" class="form-control"
                                                    name="utilisateur">
                                                    @foreach ($users as $item)
                                                        <option {{ $item->id == $client->user_id ? 'selected' : '' }}
                                                            value="{{ $item->id }}"> {{ $item->firstname }}
                                                            {{ $item->lastname }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="utilisateur_err error text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-custom">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h3 class="card-label">
                                                <span class="flaticon-responsive icon-lg primary-color"></span>
                                                Contacts
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Numero de téléphone 1</label>
                                            <input value="{{ $client->first_phone }}" type="text" id="o-telephone"
                                                class="form-control" name="numero_1" placeholder="Entrer le numero 1">
                                            <span class="numero_1_err error text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Numero de téléphone 2</label>
                                            <input value="{{ $client->second_phone }}" type="text" id="o-telephone2"
                                                class="form-control" name="numero_2" placeholder="Entrer le numero 2">
                                            <span class="numero_2_err error text-danger"></span>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Raison de l'emprunt</label>
                                            <textarea name="raison_du_pret" class="form-control"> {{ $client->rai }}</textarea>
                                            <span class="raison_du_pret_err error text-danger"></span>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Adresse du client</label>
                                            <textarea name="adresse" class="form-control"> {{ $client->adresse }}</textarea>
                                            <span class="adresse_err error text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer bgc-default-l5">
                <button type="button" id="sender" class="btn btn-primary" onclick="updateRecord();">
                    <span id="btn-load" class="spinner-border d-none spinner-border-sm" role="status"
                        aria-hidden="true"> </span>
                    <b id="text-load" class="text-hide">Veuillez patienter</b>
                    <b id="text-fix">Enregistrer</b>
                </button>
            </div>
        </div>
    </div>
@endsection
