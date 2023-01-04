<?php

use App\Events\Penalite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PretController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\VersementController;
use App\Http\Controllers\PermissionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes([
    'register' => false,
    'verify' => false,
]);

Route::group(['middleware' => ['auth'], 'prefix' => 'administration'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //USERS ROUTES
    Route::get('/users/datatable', [UserController::class, 'datatables'])->middleware('permission:utilisateur-lire')->name('users.datatables');
    Route::get('/users', [UserController::class, 'index'])->middleware('permission:utilisateur-lire')->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->middleware('permission:utilisateur-creer')->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->middleware('permission:utilisateur-creer')->name('users.store');
    Route::get('/users/{user}/show', [UserController::class, 'show'])->middleware('permission:utilisateur-lire')->name('users.show');
    Route::get('/users/{user}/status', [UserController::class, 'status'])->middleware('permission:utilisateur-modifier')->name('users.status');
    Route::delete('/users/{user}/destroy', [UserController::class, 'destroy'])->middleware('permission:utilisateur-supprimer')->name('users.destroy');

    Route::get('/users/profile', [UserController::class, 'profile'])->middleware('permission:profile-lire')->name('profile.index');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->middleware('permission:profile-modifier')->name('users.edit');
    Route::patch('/users/{user}/update', [UserController::class, 'update'])->middleware('permission:profile-modifier')->name('users.update');
    Route::get('/user/profile/avatar', [UserController::class, 'avatar'])->middleware('permission:profile-lire')->name('profile.avatar');
    Route::get('/user/profile/pwd', [UserController::class, 'password'])->middleware('permission:profile-modifier')->name('profile.password');
    Route::post('/user/profile/pwd/reset', [UserController::class, 'passwordReset'])->middleware('permission:profile-mofifier')->name('pwd.reset');

    //PERMISSIONS ROUTE
    Route::get('/permissions/datatable', [PermissionController::class, 'datatables'])->middleware('permission:permission-lire')->name('permissions.datatables');
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index')->middleware('permission:permission-lire');
    Route::get('/permissions/create', [PermissionController::class, 'create'])->middleware('permission:permission-creer')->name('permissions.create');
    Route::post('/permissions/store', [PermissionController::class, 'store'])->middleware('permission:permission-creer')->name('permissions.store');
    Route::get('/permissions/{id}/edit', [PermissionController::class, 'edit'])->middleware('permission:permission-modifier')->name('permissions.edit');
    Route::patch('/permissions/{id}/update', [PermissionController::class, 'update'])->middleware('permission:permission-modifier')->name('permissions.update');
    Route::delete('/permissions/{id}/destroy', [PermissionController::class, 'destroy'])->middleware('permission:permission-supprimer')->name('permissions.destroy');

    //ROLES ROUTE
    Route::get('/roles/datatable', [RoleController::class, 'datatables'])->middleware('permission:role-lire')->name('roles.datatables');
    Route::get('/roles', [RoleController::class, 'index'])->middleware('permission:role-lire')->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->middleware('permission:role-creer')->name('roles.create');
    Route::post('/roles/store', [RoleController::class, 'store'])->middleware('permission:role-creer')->name('roles.store');
    Route::get('/roles/{id}/view', [RoleController::class, 'show'])->middleware('permission:role-lire')->name('roles.show');
    Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->middleware('permission:role-modifier')->name('roles.edit');
    Route::patch('/roles/{id}/update', [RoleController::class, 'update'])->middleware('permission:role-modifier')->name('roles.update');
    Route::delete('/roles/{id}/destroy', [RoleController::class, 'destroy'])->middleware('permission:role-supprimer')->name('roles.destroy');

    //CLIENTS ROUTE
    Route::get('/clients/datatable', [ClientController::class, 'datatables'])->middleware('permission:client-lire')->name('clients.datatables');
    Route::get('/clients', [ClientController::class, 'index'])->middleware('permission:client-lire')->name('clients.index');
    Route::get('/clients/create', [ClientController::class, 'create'])->middleware('permission:client-creer')->name('clients.create');
    Route::post('/clients/store', [ClientController::class, 'store'])->middleware('permission:client-creer')->name('clients.store');
    Route::get('/clients/{id}/view', [ClientController::class, 'show'])->middleware('permission:client-lire')->name('clients.show');
    Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->middleware('permission:client-modifier')->name('clients.edit');
    Route::patch('/clients/{id}/update', [ClientController::class, 'update'])->middleware('permission:client-modifier')->name('clients.update');
    Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->middleware('permission:client-supprimer')->name('clients.destroy');

    Route::get('/clients/{id}/load/clients', [ClientController::class, 'loadClients'])->middleware('permission:client-lire')->name('clients.load.clients');
    Route::get('/clients/{client:uuid}/details', [ClientController::class, 'detailClient'])->middleware('permission:client-lire')->name('clients.details');

    Route::get('/clients/restore/{id}', [ClientController::class, 'restore'])->middleware('permission:client-modifier')->name('clients.restore');
    Route::get('/clients/restore-all', [ClientController::class, 'restoreAll'])->middleware('permission:client-modifier')->name('clients.restoreAll');

    Route::get('/clients/montant', [ClientController::class, 'myMontant'])->middleware('permission:client-modifier')->name('clients.montant');
    Route::post('/clients/montant/update', [ClientController::class, 'myMontantStore'])->middleware('permission:client-modifier')->name('clients.montant.update');
    //STATUS CHANGEMENT
    Route::get('/clients/{id}/accepte', [ClientController::class, 'statusAccepte'])->middleware('permission:client-status')->name('clients.accepte');
    Route::get('/clients/{id}/rejete', [ClientController::class, 'statusRejete'])->middleware('permission:client-status')->name('clients.rejete');
    // Route::get('/clients/{id}/attete', [ClientController::class, 'statusAttente'])->name('clients.attete');


    Route::post('clients/export-clients', [ClientController::class, 'index'])->middleware('permission:client-modifier')->name('clients.export');
    Route::get('clients/export-clients', [ClientController::class, 'exportClients'])->middleware('permission:client-modifier')->name('clients.export-clients');
    Route::get('clients/export-clientspdf', [ClientController::class, 'exportClientsPdf'])->middleware('permission:client-modifier')->name('clients.export-clientspdf');

    // Exporter un fichier Excel
    Route::get('clients/report', [ClientController::class, 'generateReport'])->middleware('permission:client-creer')->name('clients.report');
    Route::get('clients/reportJour', [ClientController::class, 'generateReportJour'])->middleware('permission:client-creer')->name('clients.reportJour');

    //View Page
    Route::get('ViewPages', 'ViewController@index');
    Route::post('ViewPages', 'ViewController@index');
    Route::get('clients/reportJour', [ClientController::class, 'generateReportJour'])->middleware('permission:client-creer')->name('clients.reportJour');


    //VERSEMENTS ROUTE
    Route::get('/versements/datatable', [VersementController::class, 'datatables'])->middleware('permission:versement-lire')->name('versements.datatables');
    Route::get('/versements', [VersementController::class, 'index'])->middleware('permission:versement-lire')->name('versements.index');
    Route::get('/versements/create', [VersementController::class, 'create'])->middleware('permission:versement-creer')->name('versements.create');
    Route::get('/versements/renews', [VersementController::class, 'renews'])->middleware('permission:versement-creer')->name('versements.renews');
    Route::post('/versements/store', [VersementController::class, 'store'])->middleware('permission:versement-creer')->name('versements.store');
    Route::get('/versements/{id}/edit', [VersementController::class, 'edit'])->middleware('permission:versement-modifier')->name('versements.edit');
    Route::patch('/versements/{id}/update', [VersementController::class, 'update'])->middleware('permission:versement-modifier')->name('versements.update');
    Route::delete('/versements/{id}/destroy', [VersementController::class, 'destroy'])->middleware('permission:versement-supprimer')->name('versements.destroy');
    Route::post('/versements/store', [VersementController::class, 'versementStore'])->middleware('permission:versement-creer')->name('versements.store');

    Route::get('/versements/{id}/modifier/ajouter', [VersementController::class, 'modifyVersementModifierMontant'])->middleware('permission:versement-modifier')->name('versements.modify.add');
    Route::patch('/versements/{id}/modifier/versement', [VersementController::class, 'modifyVersementModifierMontantStore'])->middleware('permission:versement-modifier')->name('versements.modify.versement');

    Route::get('/versements/{id}/terminer', [VersementController::class, 'closeVersementPage'])->middleware('permission:versement-modifier')->name('versements.termine');
    Route::patch('/versements/{id}/finish', [VersementController::class, 'closeVersementPageStore'])->middleware('permission:versement-modifier')->name('versements.finish');
    Route::get('/versements/{id}/show', [VersementController::class, 'showVersement'])->middleware('permission:versement-lire')->name('versements.show');
    Route::get('/versements/{id}/cancel', [VersementController::class, 'versementCancel'])->middleware('permission:versement-modifier')->name('versements.cancel');
    Route::get('/versements/{id}/rule', [VersementController::class, 'versementAmountRule'])->middleware('permission:versement-règlement')->middleware('permission:versement-modifier')->name('versements.rule');
    Route::patch('/versements/{id}/rule/store', [VersementController::class, 'versementAmountRuleStore'])->middleware('permission:versement-règlement')->name('versements.rule.store');
    Route::delete('/versements/{id}/delete', [VersementController::class, 'versementDelete'])->middleware('permission:versement-supprimer')->name('versements.delete');
    Route::get('/versements/{id}/modifier', [VersementController::class, 'modifyVersement'])->middleware('permission:versement-modifier')->name('versements.modify');


    //LOGS ROUTES
    Route::get('/logs/datatable', [LogController::class, 'datatables'])->name('logs.datatable')->middleware('permission:log-consulter');
    Route::get('/logs', [LogController::class, 'index'])->name('logs.index')->middleware('permission:log-consulter');
    Route::get('/logs/show/{id}', [LogController::class, 'show'])->name('logs.show')->middleware('permission:log-consulter');

    //CONFIGURATIONS ROUTES
    Route::get('/configs', [App\Http\Controllers\ConfigurationController::class, 'index'])->name('configs.index')->middleware('permission:paramètres-voir');
    Route::patch('/configs/{id}/update', [App\Http\Controllers\ConfigurationController::class, 'update'])->name('configs.update')->middleware('permission:paramètres-voir');
});
