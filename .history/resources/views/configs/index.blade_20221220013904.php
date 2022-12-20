@extends('layouts.app')
@section('title', 'O2D - Mon compte')
@section('content')
    <div class="subheader py-2 py-lg-6 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-2">
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Mon compte</h5>
            </div>
            <div class="d-flex align-items-center flex-wrap">
                <span class=" font-weight-bold mr-4"><a href="{{url()->previous()}}">Page précedente</a></span>
            </div>
        </div>
    </div>


    <div class="d-flex flex-column-fluid">
        <div class="container">
            <form action="{{route('configuration.update', $config->id)}}" method="post" id="evote-edit-form-datatable">
                @csrf
                @method('PATCH')
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-custom">
                        <div class="card-body pt-15">
                            <div class="text-center mb-3">
                                <div class="symbol symbol-60 symbol-circle symbol-xl-150">
                                    <div class="symbol-label" style="background-image:url('{{asset('custom/avatars/avatar.png')}}')"></div>
                                    <i class="symbol-badge symbol-badge-bottom bg-success"></i>
                                </div>
                                <button onclick="showRecord('{{route('profile.avatar')}}')" class="btn btn-sm btn-outline-primary pt-2 mt-4"><span class="flaticon2-image-file"></span> Modifier la photo</button>
                                <h4 class="font-weight-bold mt-4">{{$config->entreprise_name}}</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card card-custom">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="firstname">Nom de l'entreprise</label>
                                    <input class="form-control" value="{{$config->entreprise_name}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="firstname">Numero de téléphone</label>
                                    <input class="form-control" value="{{$config->telephone}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="firstname">Adresse email</label>
                                    <input class="form-control" value="{{$config->email}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="firstname">Adresse</label>
                                    <textarea name="adresse" class="form-control form-control-lg form-control-solid">{{$config->adress}}</textarea>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="modal-footer bgc-default-l5">
            <button type="button" id="sender" class="btn btn-primary" onclick="updateRecordRefresh()">
                <span id="btn-load" class="spinner-border d-none spinner-border-sm" role="status"
                    aria-hidden="true"> </span>
                <b id="text-load" class="text-hide">Veuillez patienter</b>
                <b id="text-fix">Enregistrer</b>
            </button>
            <button type="button" class="btn btn-secondary px-4" data-dismiss="modal">
                Fermer
            </button>
        </div>
        </div>
    </div>

    <div id="o2d-modal-container"></div>
    <form>
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    </form>

@endsection

@section('js')
    <script src="{{asset('custom/script.js')}}"></script>
@endsection
