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
                    <button onclick="clientStoreRecord()" id="sender" type="button" class="btn btn-primary">
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
            <form action="{{ route('clients.store') }}" method="POST" id="orange-create-record-form">

                <ul class="nav nav-tabs nav-tabs-line mb-5">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1">
                            <span class="nav-icon"><i class="flaticon2-chat-1"></i></span>
                            <span class="nav-text font-weight-bolder">Informations générales</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2">
                            <span class="nav-icon"><i class="flaticon2-pie-chart-4"></i></span>
                            <span class="nav-text">Informations scolaires</span>
                        </a>
                    </li>
                </ul>
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
                                                Informations générales de l'étudiant
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
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
                                                        <option value="">--Veuillez choisir--</option>
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
                                                    <input type="date" class="form-control" name="date_naissance"
                                                        placeholder="Entrer la date de naissance">
                                                    <span class="date_naissance_err error text-danger"></span>
                                                </div>
                                            </div>

                                            <div class="box-body col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Numero de  <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="lieu_naissance"
                                                        placeholder="Entrer le lieu de naissance">
                                                    <span class="lieu_naissance_err error text-danger"></span>
                                                </div>
                                            </div>

                                            <div class="box-body col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Ecole précédente <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="ecole_precedente"
                                                        placeholder="Entrer le lieu de naissance">
                                                    <span class="ecole_precedente_err error text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-custom mt-4">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h3 class="card-label">
                                                <span class="flaticon-placeholder-1 icon-lg primary-color"></span>
                                                Nationalité & Contacts
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="card-body example-preview" id="kt_blockui_content">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Agent commercial</label>
                                                <select class="form-control" name="user">
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}" @if ($loop->first) selected @endif>
                                                            {{ $user->firstname }} {{ $user->lastname }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="numero_orange_err error text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Adresse email</label>
                                                <input type="text" id="o-telephone1" class="form-control"
                                                    name="email" placeholder="Entrer une adresse email">
                                                <span class="email_err error text-danger"></span>
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
                                            <input type="text" id="o-telephone" class="form-control"
                                                name="numero_orange" placeholder="Entrer le numero Orange">
                                            <span class="numero_orange_err error text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Numero de téléphone 2</label>
                                            <input type="text" id="o-telephone2" class="form-control"
                                                name="numero_orange" placeholder="Entrer le numero Orange">
                                            <span class="numero_orange_err error text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Adresse email</label>
                                            <input type="text" id="o-telephone1" class="form-control" name="email"
                                                placeholder="Entrer une adresse email">
                                            <span class="email_err error text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel" aria-labelledby="kt_tab_pane_2">Tab
                        content 2</div>
                    <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel" aria-labelledby="kt_tab_pane_3">Tab
                        content 4</div>
                    <div class="tab-pane fade" id="kt_tab_pane_4" role="tabpanel" aria-labelledby="kt_tab_pane_4">Tab
                        content 5</div>
                </div>


                @csrf

            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function clientStoreRecord() {
            var form = $('#orange-create-record-form');
            $(".form-group .form-control").removeClass("has-error");
            $(".error").html("");
            var formNode = document.getElementById('orange-create-record-form');
            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: new FormData(formNode),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    KTApp.block('#student_block', {
                        overlayColor: '#000000',
                        state: 'primary',
                        message: 'Enregistrement en cours...'
                    })

                    $('#text-fix').addClass('text-hide');
                    $('#text-load').removeClass('text-hide');
                    $('#sender').addClass('spinner spinner-white spinner-right').attr("disabled", true);
                },
                success: function(result) {
                    $("#orange-restauration-modal-container div.modal").modal('hide');
                    var type = result.type;
                    var message = result.message;
                    var btn = KTUtil.getById("button");
                    KTUtil.btnRelease(btn);
                    switch (type) {
                        case 'info':
                            swal("Info", message, "info");
                            break;
                        case 'warning':
                            swal("Attention", message, "warning");
                            break;
                        case 'success':
                            swal("Succès", message, "success");

                            KTApp.block('#company-form', {
                                overlayColor: '#000000',
                                state: 'primary',
                                message: 'Chargement...'
                            });

                            setTimeout(function() {
                                window.location.href = "/students/create";
                                KTApp.unblock('#company-form');
                            }, 2000);

                            break;
                        case 'error':
                            swal("Erreur", message, "error");
                            break;
                    }

                    $('#text-load').addClass('text-hide');
                    $('#text-fix').removeClass('text-hide');
                    $('#sender').removeClass('spinner spinner-white spinner-right').attr("disabled", false);

                    //$('#orange-datatable').DataTable().ajax.reload(null, true);
                    KTApp.unblock('#student_block');

                },
                error: function(xhr, status, error) {
                    var response = xhr.responseJSON;
                    $.each(response, function(key, value) {
                        $('.' + key + '_err').text(value);
                        $('#text-load').addClass('text-hide');
                        $('#text-fix').removeClass('text-hide');
                        $('#sender').removeClass('spinner spinner-white spinner-right').attr("disabled",
                            false)
                    });
                    KTApp.unblock('#student_block');
                }
            });
        }
    </script>
    <script>
        jQuery(function($) {
            $("#mySelect2").select2();
        });
    </script>
@endsection
