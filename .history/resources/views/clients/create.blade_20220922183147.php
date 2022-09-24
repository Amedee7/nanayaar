@extends('layouts.app')
@section('title', 'Administration - Liste des Clients')
@section('content')

    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Creer un client</h5>
                </div>
            </div>
        </div>
    </div>

    <form class="form" action="" method="POST">
        @csrf
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
                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-user"></i></span>
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
                        <option value="masculin" @if (old('genre') == 'masculin') selected="selected" @endif>
                            masculin
                        </option>
                        <option value="feminin" @if (old('genre') == 'feminin') selected="selected" @endif>
                            feminin
                        </option>
                    </select>
                    <span class="role_err error text-danger"></span>
                </div>
                <div class="col-lg-4">
                    {{-- <label for="status" class= "col-md-4 col-form-label text-md-right">STATUS</label> --}}
                    <input name="status" type="hidden" value="pending" class="form-control " id="id-form-field-1">
                    <span class="role_err error text-danger"></span>
                </div>
                <div class="col-lg-4">
                    <label for="mySelect2">AGENT COMMERCIAL</label>
                    <select class="form-control" name="user">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" @if ($loop->first) selected @endif>
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
@endsection
