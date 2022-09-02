@extends('admin.layouts.app')
@section('title', 'Administration - Configurations')
@section('content')
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Configurations de la plateforme</h5>
                </div>
            </div>
        </div>
    </div>




    <div class="d-flex flex-column-fluid">
        <div class="container col-md-12">
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="card card-custom">
                        <div class="card-header">
                            <span class="card-title">Informations sur la structure</span>
                        </div>
                        <div class="card-body">
                            <div class="form-group form-row">
                                <div class="col">
                                    <label >Nom de l'entreprise</label>
                                    <input name="name" class="form-control form-control" value="{{$configs->name}}" placeholder="Nom de l'entreprise">
                                    <span class="name_err error text-danger"></span>
                                </div>

                                <div class="col">
                                    <label for="">Numéro Master</label>
                                    <input name="telephone" value="{{$configs->master_number}}" class="form-control form-control" placeholder="Numero">
                                    <span class="telephone_err error text-danger"></span>
                                </div>

                                <div class="col">
                                    <label for="">Code du numéro</label>
                                    <input name="telephone" value="{{$configs->code}}" class="form-control form-control" placeholder="Code">
                                    <span class="telephone_err error text-danger"></span>
                                </div>
                            </div>

                            <div class="form-row ">
                                <div class="col">
                                    <label >Adresse </label>
                                    <textarea name="address" class="form-control" id="">{{$configs->address}}</textarea>
                                    <span class="address_err error text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Valider</button>
                        </div>
                    </div>
                </div>
            </div>



            <div class="card card-custom">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card card-custom gutter-b card-stretch" style="border: solid">
                                <div class="card-body pt-4">
                                    <div class="d-flex align-items-end mb-">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 mr-4 mt-lg-0 mt-0">
                                                <div class="symbol symbol-square symbol-lg-75">
                                                    <span class="flaticon-coins fa-3x"></span>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <span class="font-weight-bold">Montant virtuel: </span>
                                                <a class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">{{number_format($configs->amount,0, '.',' ')}} Fcfa</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card card-custom gutter-b card-stretch" style="border: solid">
                                <div class="card-body pt-4">
                                    <div class="d-flex align-items-end mb-">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 mr-4 mt-lg-0 mt-0">
                                                <div class="symbol symbol-square symbol-lg-75">
                                                    <span class="flaticon-folder-1 fa-3x"></span>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <span class="font-weight-bold">Montant cash: </span>
                                                <a class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">{{number_format($configs->amount_cash,0, '.',' ')}} Fcfa</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card card-custom gutter-b card-stretch" style="border: solid; border-color: red">
                                <div class="card-body pt-4">
                                    <div class="d-flex align-items-end mb-">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 mr-4 mt-lg-0 mt-0">
                                                <div class="symbol symbol-square symbol-lg-75 ">
                                                    <span class="flaticon-exclamation-2 fa-3x"></span>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <span class="font-weight-bold">Montant des crédits: </span>
                                                <a class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">{{number_format($configs->amount_credit,0, '.',' ')}} Fcfa</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card card-custom gutter-b card-stretch" style="border: solid; border-color:#a73939">
                                <div class="card-body pt-4">
                                    <div class="d-flex align-items-end mb-">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 mr-4 mt-lg-0 mt-0">
                                                <div class="symbol symbol-square symbol-lg-75 ">
                                                    <span class="flaticon-exclamation-2 fa-3x"></span>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <span class="font-weight-bold">Montant des avoirs: </span>
                                                <a class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">{{number_format($configs->amount_asset,0, '.',' ')}} Fcfa</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button onclick="createRecord('{{route('master.charge')}}')" class="btn btn-primary">Approvisionner le compte Master</button>
                </div>
            </div>
        </div>
    </div>

    <div id="o2d-modal-container"></div>
    <form>
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    </form>
@endsection

@section('js')
    <script src="{{asset('assets/script.js')}}"></script>
@endsection
