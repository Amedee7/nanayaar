@extends('admin.layouts.app')
@section('title', "Administration - Liste des SIMs relais")
@section('content')
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Liste des numéros(SIMs relais) - <strong>Nombre</strong>:
                        <div class="symbol symbol-40 symbol-light-primary flex-shrink-0">
                            <span class="symbol-label font-size-h4 font-weight-bold">{{count($numbers)}}</span>
                        </div>

                    </h5>
                </div>
            </div>
        </div>
    </div>


    <div class="d-flex flex-column-fluid">
        <div class="container col-md-12">
            <div class="card card-custom">
                <div class="card-header">

                    <div class="card-title">
                        <button onclick="createRecord('{{route('numbers.create')}}')" class="btn px-4 btn-dark mb-1">
                            <i class="fa fa-plus-circle"></i>
                            Ajouter un numéro
                        </button>
                    </div>
                    <div class="card-toolbar">
                        <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modalSearch">
                            <span class="flaticon-search mr-1"></span>Recherche une SIM
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        @foreach ($numbers as $item)
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                <div class="card card-custom gutter-b card-stretch" style="border: solid">
                                    <div class="card-body pt-4">
                                        <div class="d-flex align-items-end mb-3">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 mr-4 mt-lg-0 mt-0">
                                                    <div class="symbol symbol-square symbol-lg-75">
                                                        <img src="{{asset('custom/avatars/sim.png')}}" alt="image">
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <a class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">Numero: [ +226 {{$item->msisdn}} ]</a>
                                                    <span class="text-muted font-weight-bold">Code Orange Money: {{$item->serial}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-7">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="text-dark-75 font-weight-bolder mr-2">Statut:
                                                </span>
                                                <a href="#" class="text-muted text-hover-primary"> <span class="badge badge-{{$item->status=='actif'?'success':'danger'}}">{{$item->status}}</span></a>
                                            </div>
                                            <div class="separator separator-dashed separator-dark mt-2"></div>
                                            <div class="d-flex justify-content-between align-items-cente my-1">
                                                <span class="text-dark-75 font-weight-bolder mr-2">Agent relais:</span>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span style="width: 250px;">
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-40 symbol-light-primary flex-shrink-0">
                                                            <span class="symbol-label flaticon-user-settings fa-2x"></span>
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">{{$item->username}}</div>
                                                            <a class="text-muted font-weight-bold text-hover-primary">Tel: {{$item->telephone}}</a>
                                                        </div>
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                        <a href="{{route('numbers.show', $hashids->encode($item->id))}}" class="btn btn-block btn-sm btn-primary font-weight-bolder text-uppercase "><span class="flaticon-eye"></span> Voir les détails</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center">
                        {!! $numbers->links() !!}
                    </div>

                    <br>
                </div>
            </div>
        </div>
    </div>

    <div id="o2d-modal-container"></div>
    <form>
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    </form>

    <div class="modal fade" id="modalSearch" data-backdrop="static" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow radius-1">
                <div class="modal-header">
                    <h5 class="modal-title text-primary-d2" id="exampleModal2Label">Rechecher un numero</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="">
                    <div class="modal-body modal-scroll">
                        <strong>Rechecher un numero</strong>
                        <input type="text" class="form-control" name="q" placeholder="Entrer le numero">
                    </div>

                    <div class="modal-footer bgc-default-l5">
                        <button type="submit" class="btn btn-primary">Rechercher</button>

                        <button type="button" class="btn btn-lighter-grey px-4" data-dismiss="modal">Fermer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('assets/script.js')}}"></script>

@endsection
