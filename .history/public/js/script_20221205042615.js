function createRecord(link) {
    $.ajax({
        url: link,
        type: "GET",
        success: function (html) {
            $("#o2d-modal-container").html(html);
            $("#o2d-modal-container div.modal").modal('toggle');
        }
    });
}


function showRecord(link) {
    $.ajax({
        url: link,
        type: "GET",
        success: function (html) {
            $("#o2d-modal-container").html(html);
            $("#o2d-modal-container div.modal").modal('toggle');

            var type = html.type;
            var message = html.message;
            switch (type) {
                case 'info':
                    Swal.fire(message, "", "info");
                    break;
                case 'warning':
                    Swal.fire("Attention!", message, "warning");
                    break;
                case 'success':
                    Swal.fire(message, "", "success");
                    break;
                case 'error':
                    Swal.fire("Attention!", message, "error");
                    break;
            }
        },
        error: function (xhr, status, error) {
            swal("Attention!", error, "error");
        }
    });
}


function storeRecord() {
    var form = $('#o2d-record-form-datatable');
    $("#o2d-modal-container div.modal .form-group .form-control").removeClass("is-invalid");
    $(".error").html("");
    var formNode = document.getElementById('o2d-record-form-datatable');
    $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: new FormData(formNode),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#text-fix').addClass('text-hide');
            $('#text-load').removeClass('text-hide');
            $('#btn-load').removeClass('d-none');
            $('#sender').addClass('disabled');
        },
        success: function (result) {
            $("div.modal").modal('hide');
            var type = result.type;
            var message = result.message;
            switch (type) {
                case 'info':
                    $.confirm({
                        icon: 'fa fa-check',
                        title: 'Info',
                        content: message,
                        typeAnimated: false,
                        autoClose: 'OK|4000',
                        theme: 'material',
                        buttons: {
                            OK: function () {
                            }
                        }
                    });
                    break;
                case 'warning':
                    $.confirm({
                        icon: 'fa fa-check',
                        title: 'Attention',
                        content: message,
                        type: 'yellow',
                        typeAnimated: true,
                        autoClose: 'OK|4000',
                        theme: 'material',
                        buttons: {
                            OK: function () {
                            }
                        }
                    });
                    break;
                case 'success':
                    $.confirm({
                        icon: 'fa fa-check',
                        title: 'Succès',
                        content: message,
                        type: 'green',
                        typeAnimated: true,
                        autoClose: 'OK|4000',
                        theme: 'material',
                        buttons: {
                            OK: function () {
                            }
                        }
                    });
                    break;
                case 'error':
                    $.confirm({
                        icon: 'fa fa-check',
                        title: 'Erreur',
                        content: message,
                        type: 'red',
                        typeAnimated: true,
                        autoClose: 'OK|4000',
                        theme: 'material',
                        buttons: {
                            OK: function () {
                            }
                        }
                    });
                    break;
            }
            $('#text-load').addClass('text-hide');
            $('#text-fix').removeClass('text-hide');
            $('#sender').addClass('enabled');
            $('#btn-load').addClass('d-none');
            $('#o2d-datatable').DataTable().ajax.reload(null, true);

        },
        error: function (xhr, status, error) {
            var response = xhr.responseJSON;
            $.each(response, function (key, value) {
                $("#o2d-modal-container div.modal .form-group." + key + " .form-control").addClass("is-invalid");
                $('.' + key + '_err').text(value);
                $('#text-load').addClass('text-hide');
                $('#text-fix').removeClass('text-hide');
                $('#btn-load').addClass('d-none');
                $('#sender').removeClass('disabled');
            });
        }
    });
}


function editRecord(link) {
    $.ajax({
        url: link,
        type: "GET",
        success: function (html) {
            $("#o2d-modal-container").html(html);
            $("#o2d-modal-container div.modal").modal('toggle');

            var type = html.type;
            var message = html.message;
            switch (type) {
                case 'info':
                    Swal.fire(message, "", "info");
                    break;
                case 'warning':
                    Swal.fire("Attention!", message, "warning");
                    break;
                case 'success':
                    Swal.fire(message, "", "success");
                    break;
                case 'error':
                    Swal.fire("Attention!", message, "error");
                    break;
            }
        },
        error: function (xhr, status, error) {
            swal("Attention!", error, "error");
        }
    });
}


function updateRecord() {
    var form = $('#o2d-edit-record-form');
    $("#o2d-modal-container div.modal .form-group .form-control").removeClass("is-invalid");
    $(".error").html("");
    var formNode = document.getElementById('o2d-edit-record-form');

    $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: new FormData(formNode),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#text-fix').addClass('text-hide');
            $('#text-load').removeClass('text-hide');
            $('#btn-load').removeClass('d-none');
            $('#sender').addClass('disabled');
        },
        success: function (result) {
            $("div.modal").modal('hide');
            var type = result.type;
            var message = result.message;
            switch (type) {
                case 'info':
                    $.confirm({
                        icon: 'fa fa-check',
                        title: 'Info',
                        content: message,
                        typeAnimated: false,
                        autoClose: 'OK|4000',
                        theme: 'material',
                        buttons: {
                            OK: function () {
                            }
                        }
                    });
                    break;
                case 'warning':
                    $.confirm({
                        icon: 'fa fa-check',
                        title: 'Attention',
                        content: message,
                        type: 'yellow',
                        typeAnimated: true,
                        autoClose: 'OK|4000',
                        theme: 'material',
                        buttons: {
                            OK: function () {
                            }
                        }
                    });
                    break;
                case 'success':
                    $.confirm({
                        icon: 'fa fa-check',
                        title: 'Succès',
                        content: message,
                        type: 'green',
                        typeAnimated: true,
                        autoClose: 'OK|4000',
                        theme: 'material',
                        buttons: {
                            OK: function () {
                            }
                        }
                    });
                    break;
                case 'error':
                    $.confirm({
                        icon: 'fa fa-check',
                        title: 'Erreur',
                        content: message,
                        type: 'red',
                        typeAnimated: true,
                        autoClose: 'OK|4000',
                        theme: 'material',
                        buttons: {
                            OK: function () {
                            }
                        }
                    });
                    break;
            }
            $('#text-load').addClass('text-hide');
            $('#text-fix').removeClass('text-hide');
            $('#btn-load').addClass('d-none');
            $('#sender').addClass('enabled');
            $('#sender').removeClass('disabled');
            $('#o2d-datatable').DataTable().ajax.reload(null, true);

        },
        error: function (xhr, status, error) {
            var response = xhr.responseJSON;
            $.each(response, function (key, value) {
                $("#o2d-modal-container div.modal .form-group." + key + " .form-control").addClass("is-invalid");
                $('.' + key + '_err').text(value);
                $('#text-load').addClass('text-hide');
                $('#text-fix').removeClass('text-hide');
                $('#btn-load').addClass('d-none');
                $('#sender').removeClass('disabled');

            });
        }
    });
}


function deleteRecordConfirm(link) {
    $.confirm({
        columnClass: 'medium',
        icon: 'flaticon-danger',
        title: 'Etes-vous sûr de vouloir supprimer cet enregistrement ?',
        content: 'Il ne vous sera plus possible de le récupérer.',
        confirmButton: 'Oui',
        buttons: {
            tryAgain: {
                text: 'Oui, supprimer',
                btnClass: 'btn-danger',
                action: function () {
                    deleteRecord(link);
                }
            },
            Annuler: function () {
            }
        }
    });
}

function deleteRecord(link) {
    $.ajax({
        url: link,
        type: "DELETE",
        data: {
            "_token": $('#token').val()
        },
        success: function (result) {
            var type = result.type;
            var message = result.message;
            switch (type) {
                case 'info':
                    $.confirm({
                        icon: 'fa fa-check',
                        title: 'Info',
                        content: message,
                        typeAnimated: false,
                        autoClose: 'OK|4000',
                        theme: 'material',
                        buttons: {
                            OK: function () {
                            }
                        }
                    });
                    break;
                case 'warning':
                    $.confirm({
                        icon: 'fa fa-check',
                        title: 'Attention',
                        content: message,
                        type: 'yellow',
                        typeAnimated: true,
                        autoClose: 'OK|4000',
                        theme: 'material',
                        buttons: {
                            OK: function () {
                            }
                        }
                    });
                    break;
                case 'success':
                    $.confirm({
                        icon: 'fa fa-check',
                        title: 'Succès',
                        content: message,
                        type: 'green',
                        typeAnimated: true,
                        autoClose: 'OK|4000',
                        theme: 'material',
                        buttons: {
                            OK: function () {
                            }
                        }
                    });
                    break;
                case 'error':
                    $.confirm({
                        icon: 'fa fa-check',
                        title: 'Erreur',
                        content: message,
                        type: 'red',
                        typeAnimated: true,
                        autoClose: 'OK|4000',
                        theme: 'material',
                        buttons: {
                            OK: function () {
                            }
                        }
                    });
                    break;
            }

            $('#o2d-datatable').DataTable().ajax.reload(null, true);
        }
    });
}



function statusConfirm(link) {
    $.confirm({
        columnClass: 'medium',
        icon: 'flaticon-danger',
        title: 'Etes-vous sûr de vouloir changer le status ?',
        content: 'Activation/Désactivation.',
        confirmButton: 'Oui',
        buttons: {
            tryAgain: {
                text: 'Oui, changer',
                btnClass: 'btn-primary',
                action: function () {
                    AccountStatusRecord(link);
                }
            },
            Annuler: function () {
            }
        }
    });

}


function storeConfirm(link) {
    $.confirm({
        columnClass: 'medium',
        icon: 'flaticon-danger',
        title: "Vous êtes sur le point d'ajouter cet agent ?",
        content: 'Voulez-vous vraiment continuer ?',
        confirmButton: 'Oui',
        buttons: {
            tryAgain: {
                text: 'Oui, ajouter',
                btnClass: 'btn-primary',
                action: function () {
                    storeRecord(link);
                }
            },
            Annuler: function () {
            }
        }
    });
}


function AccountStatusRecord(link) {
    $.ajax({
        url: link,
        type: "GET",
        data: {
            "_token": $('#token').val()
        },
        beforeSend: function () {
            $('#loader').removeClass('display-none')
        },
        success: function (result) {
            var type = result.type;
            var message = result.message;
            switch (type) {
                case 'info':
                    $.confirm({
                        icon: 'fa fa-check',
                        title: 'Info',
                        content: message,
                        typeAnimated: false,
                        autoClose: 'OK|4000',
                        theme: 'material',
                        buttons: {
                            OK: function () {
                            }
                        }
                    });
                    break;
                case 'warning':
                    $.confirm({
                        icon: 'fa fa-check',
                        title: 'Attention',
                        content: message,
                        type: 'yellow',
                        typeAnimated: true,
                        autoClose: 'OK|4000',
                        theme: 'material',
                        buttons: {
                            OK: function () {
                            }
                        }
                    });
                    break;
                case 'success':
                    $.confirm({
                        icon: 'fa fa-check',
                        title: 'Succès',
                        content: message,
                        type: 'green',
                        typeAnimated: true,
                        autoClose: 'OK|4000',
                        theme: 'material',
                        buttons: {
                            OK: function () {
                            }
                        }
                    });
                    break;
                case 'error':
                    $.confirm({
                        icon: 'fa fa-check',
                        title: 'Erreur',
                        content: message,
                        type: 'red',
                        typeAnimated: true,
                        autoClose: 'OK|4000',
                        theme: 'material',
                        buttons: {
                            OK: function () {
                            }
                        }
                    });
                    break;
            }
            $('#o2d-datatable').DataTable().ajax.reload(null, true);
        }
    });
}


function operationConfirmRecord(link) {
    $.ajax({
        url: link,
        type: "GET",
        data: {
            "_token": $('#token').val()
        },
        beforeSend: function () {
            $('#loader').removeClass('display-none')
        },
        success: function (result) {
            var type = result.type;
            var message = result.message;
            switch (type) {
                case 'info':
                    $.confirm({
                        icon: 'fa fa-check',
                        title: 'Info',
                        content: message,
                        typeAnimated: false,
                        autoClose: 'OK|4000',
                        theme: 'material',
                        buttons: {
                            OK: function () {
                            }
                        }
                    });
                    break;
                case 'warning':
                    $.confirm({
                        icon: 'fa fa-check',
                        title: 'Attention',
                        content: message,
                        type: 'yellow',
                        typeAnimated: true,
                        autoClose: 'OK|4000',
                        theme: 'material',
                        buttons: {
                            OK: function () {
                            }
                        }
                    });
                    break;
                case 'success':
                    $.confirm({
                        icon: 'fa fa-check',
                        title: 'Succès',
                        content: message,
                        type: 'green',
                        typeAnimated: true,
                        autoClose: 'OK|4000',
                        theme: 'material',
                        buttons: {
                            OK: function () {
                            }
                        }
                    });
                    break;
                case 'error':
                    $.confirm({
                        icon: 'fa fa-check',
                        title: 'Erreur',
                        content: message,
                        type: 'red',
                        typeAnimated: true,
                        autoClose: 'OK|4000',
                        theme: 'material',
                        buttons: {
                            OK: function () {
                            }
                        }
                    });
                    break;
            }
            $('#o2d-datatable').DataTable().ajax.reload(null, true);
        }
    });
}


function storeRecordReload() {
    var form = $('#o2d-record-form-datatable');
    $("#o2d-modal-container div.modal .form-group .form-control").removeClass("is-invalid");
    $(".error").html("");
    var formNode = document.getElementById('o2d-record-form-datatable');
    $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: new FormData(formNode),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#text-fix').addClass('text-hide');
            $('#text-load').removeClass('text-hide');
            $('#btn-load').removeClass('d-none');
            $('#sender').addClass('disabled');
        },
        success: function (result) {
            $("div.modal").modal('hide');
            var type = result.type;
            var message = result.message;
            switch (type) {
                case 'info':
                    $.confirm({
                        icon: 'fa fa-check',
                        title: 'Info',
                        content: message,
                        typeAnimated: false,
                        autoClose: 'OK|4000',
                        theme: 'material',
                        buttons: {
                            OK: function () {
                            }
                        }
                    });
                    break;
                case 'warning':
                    $.confirm({
                        icon: 'fa fa-check',
                        title: 'Attention',
                        content: message,
                        type: 'yellow',
                        typeAnimated: true,
                        autoClose: 'OK|4000',
                        theme: 'material',
                        buttons: {
                            OK: function () {
                            }
                        }
                    });
                    break;
                case 'success':
                    $.confirm({
                        icon: 'fa fa-check',
                        title: 'Succès',
                        content: message,
                        type: 'green',
                        typeAnimated: true,
                        autoClose: 'OK|4000',
                        theme: 'material',
                        buttons: {
                            OK: function () {
                            }
                        }
                    });
                    setInterval('location.reload()', 1000);
                    break;
                case 'error':
                    $.confirm({
                        icon: 'fa fa-check',
                        title: 'Erreur',
                        content: message,
                        type: 'red',
                        typeAnimated: true,
                        autoClose: 'OK|4000',
                        theme: 'material',
                        buttons: {
                            OK: function () {
                            }
                        }
                    });
                    break;
            }
            $('#text-load').addClass('text-hide');
            $('#text-fix').removeClass('text-hide');
            $('#sender').addClass('enabled');
            $('#btn-load').addClass('d-none');
            $('#o2d-datatable').DataTable().ajax.reload(null, true);

        },
        error: function (xhr, status, error) {
            var response = xhr.responseJSON;
            $.each(response, function (key, value) {
                $("#o2d-modal-container div.modal .form-group." + key + " .form-control").addClass("is-invalid");
                $('.' + key + '_err').text(value);
                $('#text-load').addClass('text-hide');
                $('#text-fix').removeClass('text-hide');
                $('#btn-load').addClass('d-none');
                $('#sender').removeClass('disabled');
            });
        }
    });
}

//CONFIRMATION D'UNE OPERATION
function operationConfirm(link) {
    $.confirm({
        columnClass: 'medium',
        icon: 'flaticon-danger',
        title: 'Vous êtes sur le point d\'effectuer une opération',
        content: 'Voulez-vous vraiment continuer.',
        confirmButton: 'Oui',
        buttons: {
            tryAgain: {
                text: 'Oui, effectuer',
                btnClass: 'btn-primary',
                action: function () {
                    operationStoreRecord(link);
                }
            },
            Annuler: function () {

            }
        }
    });
}

//ENREGISTRER UNE OPERATION
function operationStoreRecord() {
    var form = $('#o2d-record-form-datatable');
    $("#o2d-modal-container div.modal .form-group .form-control").removeClass("is-invalid");
    $(".error").html("");
    var formNode = document.getElementById('o2d-record-form-datatable');
    $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: new FormData(formNode),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#text-fix').addClass('text-hide');
            $('#text-load').removeClass('text-hide');
            $('#btn-load').removeClass('d-none');
            $('#sender').addClass('disabled');
        },
        success: function (result) {
            $("div.modal").modal('hide');
            var type = result.type;
            var message = result.message;
            switch (type) {
                case 'info':
                    $.confirm({
                        icon: 'fa fa-check',
                        title: 'Info',
                        content: message,
                        typeAnimated: false,
                        autoClose: 'OK|4000',
                        theme: 'material',
                        buttons: {
                            OK: function () {
                            }
                        }
                    });
                    break;
                case 'warning':
                    $.confirm({
                        icon: 'fa fa-check',
                        title: 'Attention',
                        content: message,
                        type: 'yellow',
                        typeAnimated: true,
                        autoClose: 'OK|4000',
                        theme: 'material',
                        buttons: {
                            OK: function () {
                            }
                        }
                    });
                    break;
                case 'success':
                    $.confirm({
                        icon: 'fa fa-check',
                        title: 'Succès',
                        content: message,
                        type: 'green',
                        typeAnimated: true,
                        autoClose: 'OK|4000',
                        theme: 'material',
                        buttons: {
                            OK: function () {
                            }
                        }
                    });
                    setInterval('location.reload()', 1000);
                    break;
                case 'error':
                    $.confirm({
                        icon: 'fa fa-check',
                        title: 'Erreur',
                        content: message,
                        type: 'red',
                        typeAnimated: true,
                        autoClose: 'OK|4000',
                        theme: 'material',
                        buttons: {
                            OK: function () {
                            }
                        }
                    });
                    break;
            }
            setInterval('location.reload()', 1000);

            $('#text-load').addClass('text-hide');
            $('#text-fix').removeClass('text-hide');
            $('#sender').addClass('enabled');
            $('#btn-load').addClass('d-none');
            $('#o2d-datatable').DataTable().ajax.reload(null, true);

        },
        error: function (xhr, status, error) {
            var response = xhr.responseJSON;
            $.each(response, function (key, value) {
                $("#o2d-modal-container div.modal .form-group." + key + " .form-control").addClass("is-invalid");
                $('.' + key + '_err').text(value);
                $('#text-load').addClass('text-hide');
                $('#text-fix').removeClass('text-hide');
                $('#btn-load').addClass('d-none');
                $('#sender').removeClass('disabled');
            });
        }
    });
}

//RECHERCHE DES OPERATIONS POUR POINTAGE/COMPARAISON
function comparisonOperationSearch() {
    var form = $('#search-operation-form');
    $("#o2d-modal-container div.modal .form-group .form-control").removeClass("is-invalid");
    $(".error").html("");
    var formNode = document.getElementById('search-operation-form');
    $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: new FormData(formNode),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#text-fix').addClass('text-hide');
            $('#text-load').removeClass('text-hide');
            $('#btn-load').removeClass('d-none');
            $('#sender').addClass('disabled');
        },
        success: function (result, html) {
            $("#operation-search-result").html(result);
            var type = result.type;
            var message = result.message;
            switch (type) {
                case 'info':
                    swal(message, "", "info");
                    break;
                case 'warning':
                    swal("Attention!", message, "warning");
                    break;
                case 'success':
                    swal("Succès !", '' + message + '', "success");
                    break;
                case 'error':
                    swal("Attention!", message, "error");
                    break;
            }

            $('#text-load').addClass('text-hide');
            $('#text-fix').removeClass('text-hide');
            $('#sender').addClass('enabled');
            $('#sender').removeClass('disabled');
            $('#btn-load').addClass('d-none');

        },
        error: function (xhr, status, error) {
            var response = xhr.responseJSON;
            $.each(response, function (key, value) {
                $("#o2d-modal-container div.modal .form-group." + key + " .form-control").addClass("is-invalid");
                $('.' + key + '_err').text(value);
                $('#text-load').addClass('text-hide');
                $('#text-fix').removeClass('text-hide');
                $('#btn-load').addClass('d-none');
                $('#sender').removeClass('disabled');
            });
        }
    });
}

//SUIVANT DE RECHERCHE POUR UPLODER LE FICHIER
function nextComparison() {
    var form = $('#file-uploader');
    $("#o2d-modal-container div.modal .form-group .form-control").removeClass("is-invalid");
    $(".error").html("");
    var formNode = document.getElementById('file-uploader');
    $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: new FormData(formNode),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#text-fixResult').addClass('text-hide');
            $('#text-loadResult').removeClass('text-hide');
            $('#btn-loadResult').removeClass('d-none');
            $('#senderResult').addClass('disabled');
        },
        success: function (result, html) {
            $("#operation-search-result-final").html(result);
            var type = result.type;
            var message = result.message;
            switch (type) {
                case 'info':
                    swal(message, "", "info");
                    break;
                case 'warning':
                    swal("Attention!", message, "warning");
                    break;
                case 'success':
                    swal("Succès !", '' + message + '', "success");
                    break;
                case 'error':
                    swal("Attention!", message, "error");
                    break;
            }

            $('#text-loadResult').addClass('text-hide');
            $('#text-fixResult').removeClass('text-hide');
            $('#senderResult').addClass('enabled');
            $('#senderResult').removeClass('disabled');
            $('#btn-loadResult').addClass('d-none');

        },
        error: function (xhr, status, error) {
            var response = xhr.responseJSON;
            $.each(response, function (key, value) {
                $("#o2d-modal-container div.modal .form-group." + key + " .form-control").addClass("is-invalid");
                $('.' + key + '_err').text(value);
                $('#text-loadResult').addClass('text-hide');
                $('#text-fixResult').removeClass('text-hide');
                $('#btn-loadResult').addClass('d-none');
                $('#senderResult').removeClass('disabled');
            });
        }
    });
}

//RECHERCHE AVANCEES SUR UN CLIENT
function advancedSearch() {
    var form = $('#o2d-record-form-datatable');
    $("#o2d-modal-container div.modal .form-group .form-control").removeClass("is-invalid");
    $(".error").html("");
    var formNode = document.getElementById('o2d-record-form-datatable');
    $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: new FormData(formNode),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#text-fix').addClass('text-hide');
            $('#text-load').removeClass('text-hide');
            $('#btn-load').removeClass('d-none');
            $('#sender').addClass('disabled');
        },
        success: function (result, html) {
            $("#operation-search-result").html(result);
            var type = result.type;
            var message = result.message;
            switch (type) {
                case 'info':
                    swal(message, "", "info");
                    break;
                case 'warning':
                    swal("Attention!", message, "warning");
                    break;
                case 'success':
                    swal("Succès !", '' + message + '', "success");
                    break;
                case 'error':
                    swal("Attention!", message, "error");
                    break;
            }

            $('#text-load').addClass('text-hide');
            $('#text-fix').removeClass('text-hide');
            $('#sender').addClass('enabled');
            $('#sender').removeClass('disabled');
            $('#btn-load').addClass('d-none');

        },
        error: function (xhr, status, error) {
            var response = xhr.responseJSON;
            $.each(response, function (key, value) {
                $("#o2d-modal-container div.modal .form-group." + key + " .form-control").addClass("is-invalid");
                $('.' + key + '_err').text(value);
                $('#text-load').addClass('text-hide');
                $('#text-fix').removeClass('text-hide');
                $('#btn-load').addClass('d-none');
                $('#sender').removeClass('disabled');
            });
        }
    });
}

//storeRecordRefresh pour la modification de la somme

function storeRecordRefresh() {
    var form = $('#o2d-edit-record-form-datatable');
    $("#o2d-modal-container div.modal .form-group .form-control").removeClass("is-invalid");
    $(".error").html("");
    var formNode = document.getElementById('o2d-edit-record-form-datatable');
    $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: new FormData(formNode),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $('#sender').addClass('disabled');
            $('#text-fix').addClass('visually-hidden');
            $('#text-load').removeClass('visually-hidden');
        },
        success: function (result) {
            $("div.modal").modal('hide');
            var type = result.type;
            var message = result.message;
            switch (type) {
                case 'info':
                    swal(message, "", "info");
                    break;
                case 'warning':
                    swal("Attention!", message, "warning");
                    break;
                case 'success':
                    swal("Succès !", '' + message + '', "success");
                    setInterval(location.href = 'http://localhost/nanayaar/public/clients/montant', 1000);
                    break;
                case 'error':
                    swal("Attention!", message, "error");
                    break;
            }
            $('#text-load').addClass('visually-hidden');
            $('#text-fix').removeClass('visually-hidden');
            $('#sender').addClass('enabled');

        },
        error: function (xhr, status, error) {
            var response = xhr.responseJSON;
            $.each(response, function (key, value) {
                $("#o2d-modal-container div.modal .form-group." + key + " .form-control").addClass("is-invalid");
                $('.' + key + '_err').text(value);
                $('#text-load').addClass('visually-hidden');
                $('#text-fix').removeClass('visually-hidden');
                $('#btn-load').addClass('d-none');
                $('#sender').removeClass('disabled');
            });
        }
    });
}



(function (document) {
    'use strict';
    var TableFilter = (function (Arr) {
        var _input;
        function _onInputEvent(e) {
            _input = e.target;
            var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
            Arr.forEach.call(tables, function (table) {
                Arr.forEach.call(table.tBodies, function (tbody) {
                    Arr.forEach.call(tbody.rows, _filter);
                });
            });
        }
        function _filter(row) {
            var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
            row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
        }
        return {
            init: function () {
                var inputs = document.getElementsByClassName('light-table-filter');
                Arr.forEach.call(inputs, function (input) {
                    input.oninput = _onInputEvent;
                });
            }
        };
    })(Array.prototype);

    document.addEventListener('readystatechange', function () {
        if (document.readyState === 'complete') {
            TableFilter.init();
        }
    });

    //OUT STOCK
function versementModifierMontant(){
    var form = $('#o2d-edit-form-datatable');
    $("#o2d-modal-container div.modal .form-group .form-control" ).removeClass("is-invalid");
    $(".error" ).html("");
    var formNode = document.getElementById('o2-edit-form-datatable');

    $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: new FormData(formNode),
        contentType: false,
        cache: false,
        processData:false,
        beforeSend: function () {
            $('#sender').addClass('disabled');
            $('#text-fix').addClass('visually-hidden');
            $('#text-load').removeClass('visually-hidden');
        },
        success: function(result){
            $("div.modal").modal('hide');
            var type = result.type;
            var message = result.message;
            switch(type){
                case 'info':
                    swal(message, "", "info");
                    break;
                case 'warning':
                    swal("Attention!", message, "warning");
                    break;
                case 'success':
                    swal(message, "", "success");
                    setInterval('location.reload()', 1000);
                    break;
                case 'error':
                    swal("Attention!", message, "error");
                    break;
            }
            $('#text-load').addClass('visually-hidden');
            $('#text-fix').removeClass('visually-hidden');
            $('#sender').addClass('enabled');

        },
        error: function(xhr, status, error) {
            var response=xhr.responseJSON;
            $.each(response, function(key, value) {
                $("#o2d-edit-form-datatable div.modal .form-group."+key+" .form-control").addClass("is-invalid");
                $('.'+key+'_err').text(value);
                $('#text-load').addClass('visually-hidden');
                $('#text-fix').removeClass('visually-hidden');
                $('#btn-load').addClass('d-none');
                $('#sender').removeClass('disabled');

            });
        }
    });
}

function versementModifierMontantDelete(link){
    swal({
        title: "Etes-vous sûr de vouloir supprimer cet enregistrement?",
        text: "Il ne vous sera plus possible de le récupérer !",
        icon: "warning",
        buttons: ["Annuler !", "Oui, supprimer!"],
        dangerMode: true,
    }).then((willDelete) =>  {
        if (willDelete) {
            versementModifierMontantDeleteConfirm(link);
        } else {
        }
    });
}

function versementModifierMontantDeleteConfirm(link){
    $.ajax({
        url: link,
        type:"DELETE",
        data: {
            "_token": $('#token').val()
        },
        success: function(result){
            var type = result.type;
            var message = result.message;
            switch(type){
                case 'info':
                    swal(message, "", "info");
                    break;
                case 'warning':
                    swal("Attention!", message, "warning");
                    break;
                case 'success':
                    swal(message, "", "success");
                    setInterval('location.reload()', 1000);
                    break;
                case 'error':
                    swal("Attention!", message, "error");
                    break;
            }
        }
    });
}

//TERMINER UNE COMMANDER
function versementClose(link){
    $.ajax({
        url: link,
        type:"GET",
        beforeSend: function () {
            $('#senderX').addClass('disabled');
            $('#text-fixX').addClass('visually-hidden');
            $('#text-loadX').removeClass('visually-hidden');
        },
        success: function(html){
            $("#evote-modal-container").html(html);
            $("#evote-modal-container div.modal").modal('toggle');
            /*$( "#myModal" ).load(window.location.href + " #myModal" );*/

            $('#text-loadX').addClass('visually-hidden');
            $('#text-fixX').removeClass('visually-hidden');
            $('#senderX').removeClass('disabled');
        },
        error: function(xhr, status, error) {
            swal("Attention!", error, "error");

            $('#text-loadX').addClass('visually-hidden');
            $('#text-fixX').removeClass('visually-hidden');
            $('#senderX').removeClass('disabled');
        }

    });
}



})(document);