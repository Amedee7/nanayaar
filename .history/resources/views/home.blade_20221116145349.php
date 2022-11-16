@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

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
                                                    value="{{ $lastClient }}">
                                                <span class="numb_cli_err error text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="box-body col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Nom <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="nom"
                                                    placeholder="Entrer le nom">
                                                <span class="nom_err error text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="box-body col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Prenom <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="prenom"
                                                    placeholder="Entrer le prenom">
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
                                                <input type="date" class="form-control" name="date_naissance">
                                                <span class="date_naissance_err error text-danger"></span>
                                            </div>
                                        </div>

                                        <div class="box-body col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Montant demander <span
                                                        class="text-danger">*</span></label>
                                                <input type="number" class="form-control" name="montant_demande"
                                                    placeholder="Entrer le montant demander">
                                                <span class="montant_demande_err error text-danger"></span>
                                            </div>
                                        </div>

                                        <div class="box-body col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Numero CNID <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="numero_cnib"
                                                    placeholder="Entrer le numero de la CNIB">
                                                <span class="numero_cnib_err error text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputPassword1">Agent commercial</label>
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
                                        <input type="text" id="o-telephone" class="form-control" name="numero_1"
                                            placeholder="Entrer le numero 1">
                                        <span class="numero_1_err error text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Numero de téléphone 2</label>
                                        <input type="text" id="o-telephone2" class="form-control" name="numero_2"
                                            placeholder="Entrer le numero 2">
                                        <span class="numero_2_err error text-danger"></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
