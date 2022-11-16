@extends('layouts.app')

@section('content')
<div class="container">
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
@endsection
