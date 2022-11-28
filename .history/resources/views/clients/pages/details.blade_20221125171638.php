@extends('layouts.app')
@section('title', 'Administration - Détails du client')
@section('content')
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Détails sur l'étudiant
                        [<span class="font-weight-boldest text-primary">{{$client->numb_cli}}</span>]
                        [<span class="font-weight-bolder text-primary">{{$client->name}} {{$client->lastname}}</span>]
                    </h5>
                </div>
            </div>

            <div class="d-flex align-items-center">
                <div class="btn-group dropup">
                    <a href="{{route('clients.index')}}" class="btn btn-primary btn-sm font-weight-bolder">
                        <span class="flaticon-reply"></span> Retour à la liste
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column-fluid">
        <div class="container col-md-12">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card card-custom gutter-b card-stretch">
                        <div class="card-body pt-4">
                            <div class="d-flex align-items-end mb-2">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
                                        <div class="symbol symbol-circle symbol-lg-75">
                                            <img src="{{asset('custom/clients/'.$client->photo.'')}}" alt="image">
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a class="text-dark font-weight-bolder font-size-h4 mb-0">[{{$client->numb_cli}}] - {{$client->first_name}}</a>
                                        <span class="text-muted font-weight-bold">{{$client->last_name}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center pt-2" style="border: black 1px solid; border-radius: 3px">
                                <div class="my-2">
                                    <a class="text-dark font-weight-bolder text-hover-primary font-size-h5">{{$client->classe[0]['name']}} - {{$client->classe[0]->filiere[0]->name}}</a>
                                </div>
                                <span class="label font-weight-bolder label-inline label-lg label-light-primary mb-2">{{$client->niveau[0]['type']}}</span>
                            </div>
                            <div class="separator separator-dashed separator-border-3 mb-3"></div>
                            <div class="mb-7">
                                <div class="d-flex justify-content-between align-items-cente my-1">
                                    <span class="text-dark-75 font-weight-bolder mr-2">Date de naissance:</span>
                                    <a class="text-muted font-weight-bolder">{{\Carbon\Carbon::parse($client->date_of_birth)->format('d/m/Y')}}</a>
                                </div>
                                <div class="separator separator-dashed separator-border-2 mt-3 mb-3"></div>
                                <div class="d-flex justify-content-between align-items-cente my-1">
                                    <span class="text-dark-75 font-weight-bolder mr-2">Lieu de naissance:</span>
                                    <a class="text-muted font-weight-bolder">{{$client->place_of_birth}}</a>
                                </div>
                                <div class="separator separator-dashed separator-border-2 mt-3 mb-3"></div>
                                <div class="d-flex justify-content-between align-items-cente my-1">
                                    <span class="text-dark-75 font-weight-bolder mr-2">Genre:</span>
                                    <a class="text-muted font-weight-bolder">{{$client->genre}}</a>
                                </div>
                                <div class="separator separator-dashed separator-border-2 mt-3 mb-3"></div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-dark-75 font-weight-bolder  mr-2">Statut:</span>
                                    <a class="label label-inline label-lg label-light-{{$client->status=='Actif'?'success':'danger'}} font-weight-bold">
                                        {{$client->status}}
                                    </a>
                                </div>
                                <div class="separator separator-dashed separator-border-2 mt-3 mb-3"></div>
                                <div class="d-flex justify-content-between align-items-cente my-1">
                                    <span class="text-dark-75 font-weight-bolder mr-2">Téléphone:</span>
                                    <a class="text-muted font-weight-bolder">{{$client->phone}}</a>
                                </div>
                                <div class="separator separator-dashed separator-border-2 mt-3 mb-3"></div>
                                <div class="d-flex justify-content-between align-items-cente my-1">
                                    <span class="text-dark-75 font-weight-bolder mr-2">INE:</span>
                                    <a class="primary-color font-weight-bolder">{{$client->ine}}</a>
                                </div>
                                <div class="separator separator-dashed separator-border-2 mt-3 mb-3"></div>
                                <div class="d-flex justify-content-between align-items-cente my-1">
                                    <span class="text-dark-75 font-weight-bolder mr-2">Autre téléphone:</span>
                                    <a class="text-muted font-weight-bolder">{{$client->telephone2}}</a>
                                </div>
                                <div class="separator separator-dashed separator-border-2 mt-3 mb-3"></div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-dark-75 font-weight-bolder mr-2">Email:</span>
                                    <span class="text-muted font-weight-bolder">{{$client->email}}</span>
                                </div>
                                <div class="separator separator-dashed separator-border-2 mt-3 mb-3"></div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-dark-75 font-weight-bolder mr-2">N Carte CENOU:</span>
                                    <span class="text-muted font-weight-bolder">{{$client->cenou_card_number}}</span>
                                </div>
                                <div class="separator separator-dashed separator-border-2 mt-3 mb-3"></div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-dark-75 font-weight-bolder mr-2">Expirt. Carte CENOU:</span>
                                    <span class="text-muted font-weight-bolder">{{\Carbon\Carbon::parse($client->cenou_card_number_date)->format('d/m/Y')}}</span>
                                </div>
                            </div>

                            <a href="{{route('clients.edit', $client->uuid)}}" class="btn btn-block btn-sm btn-primary font-weight-bolder text-uppercase py-3">Modifier les infos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
