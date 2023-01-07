@extends('layouts.app')
@section('title', 'Administration - Mon compte')
@section('content')
    <div class="subheader py-2 py-lg-6 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-2">
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Mon compte</h5>
            </div>
            <div class="d-flex align-items-center flex-wrap">
                <span class=" font-weight-bold mr-4"><a href="{{ url()->previous() }}">Page précedente</a></span>
            </div>
        </div>
    </div>


    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-custom">
                        <div class="card-body pt-15">
                            <div class="text-center mb-3">
                                <div class="symbol symbol-60 symbol-circle symbol-xl-150">
                                    <div class="symbol-label"
                                        style="background-image:url('{{ asset('custom/avatars/avatar.png') }}')"></div>
                                    <i class="symbol-badge symbol-badge-bottom bg-success"></i>
                                </div>
                                @permission('profile-avatar')
                                    <button onclick="showRecord('{{ route('profile.avatar') }}')"
                                        class="btn btn-sm btn-outline-primary pt-2 mt-4"><span
                                            class="flaticon2-image-file"></span> Modifier la photo</button>
                                @endpermission
                                <h4 class="font-weight-bold mt-4">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                                </h4>
                                <span
                                    class="label label-light-success label-inline font-weight-bold label-lg">{{ Auth::user()->roles[0]['display_name'] }}</span>
                            </div>

                            <div class="separator separator-border-2 separator-dashed mb-5"></div>
                            @permission('profile-modifier')
                                <div class="mb-2 text-center">
                                    <a onclick="editRecord('{{ route('profile.password') }}')"
                                        class="btn btn-outline-danger btn-block mr-2">
                                        <i class="flaticon-safe-shield-protection"></i> Changer mot de passe
                                    </a>
                                </div>
                            @endpermission
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card card-custom">
                        <div class="card-header">
                            <div class="card-title">
                                <span class="flaticon-information icon-lg mr-2"></span> Détails de mon compte
                                <span
                                    class="ml-2 badge @if (Auth::user()->status == 'Actif') badge-success @else badge-danger @endif ">
                                    {{ Auth::user()->status }}
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="firstname">Nom</label>
                                    <input readonly class="form-control" value="{{ Auth::user()->firstname }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="firstname">Prenom</label>
                                    <input readonly class="form-control" value="{{ Auth::user()->lastname }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="firstname">Adresse email</label>
                                    <input readonly class="form-control" value="{{ Auth::user()->email }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="firstname">Téléphone</label>
                                    <input readonly class="form-control" value="{{ Auth::user()->telephone }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="firstname">Dernière connexion</label>
                                    <input readonly class="form-control"
                                        value="{{ \Carbon\Carbon::parse(Auth::user()->last_login_at)->format('d/m/Y à H:i:s') }}">
                                </div>
                            </div>

                        </div>
                    </div>
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
    <script src="{{ asset('custom/script.js') }}"></script>
@endsection
