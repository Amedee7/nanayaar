<?php

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
    Route::get('/users/datatable', [UserController::class, 'datatables'])->name('users.datatables');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/show', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('/users/{user}/update', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/{user}/status', [UserController::class, 'status'])->name('users.status');
    Route::delete('/users/{user}/destroy', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/users/profile', [UserController::class, 'profile'])->name('profile.index');
    Route::get('/user/profile/avatar', [UserController::class, 'avatar'])->name('profile.avatar');
    Route::get('/user/profile/pwd', [UserController::class, 'password'])->name('profile.password');
    Route::post('/user/profile/pwd/reset', [UserController::class, 'passwordReset'])->name('pwd.reset');

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
    Route::delete('/clients/{id}/destroy', [ClientController::class, 'destroy'])->middleware('permission:client-supprimer')->name('clients.destroy');
    Route::get('/status/upate', [ClientController::class, 'changeStatus'])->name('update.changeStatus');
    // Route::get('changeStatus', 'ClientController@changeStatus');

    //PRETS ROUTE
    Route::get('/prets/datatable', [PretController::class, 'datatables'])->middleware('permission:pret-lire')->name('prets.datatables');
    Route::get('/prets', [PretController::class, 'index'])->middleware('permission:pret-lire')->name('prets.index');
    Route::get('/prets/create', [PretController::class, 'create'])->middleware('permission:pret-creer')->name('prets.create');
    Route::post('/prets/store', [PretController::class, 'store'])->middleware('permission:pret-creer')->name('prets.store');
    Route::get('/prets/{id}/view', [PretController::class, 'show'])->middleware('permission:pret-lire')->name('prets.show');
    Route::get('/prets/{id}/edit', [PretController::class, 'edit'])->middleware('permission:pret-modifier')->name('prets.edit');
    Route::patch('/prets/{id}/update', [PretController::class, 'update'])->middleware('permission:pret-modifier')->name('prets.update');
    Route::delete('/prets/{id}/destroy', [PretController::class, 'destroy'])->middleware('permission:pret-supprimer')->name('prets.destroy');

    //VERSEMENTS ROUTE
    Route::get('/versements/datatable', [VersementController::class, 'datatables'])->middleware('permission:versement-lire')->name('versements.datatables');
    Route::get('/versements', [VersementController::class, 'index'])->middleware('permission:versement-lire')->name('versements.index');
    Route::get('/versements/create', [VersementController::class, 'create'])->middleware('permission:versement-creer')->name('versements.create');
    Route::post('/versements/store', [VersementController::class, 'store'])->middleware('permission:versement-creer')->name('versements.store');
    Route::get('/versements/{id}/view', [VersementController::class, 'show'])->middleware('permission:versement-lire')->name('versements.show');
    Route::get('/versements/{id}/edit', [VersementController::class, 'edit'])->middleware('permission:versement-modifier')->name('versements.edit');
    Route::patch('/versements/{id}/update', [VersementController::class, 'update'])->middleware('permission:versement-modifier')->name('versements.update');
    Route::delete('/versements/{id}/destroy', [VersementController::class, 'destroy'])->middleware('permission:versement-supprimer')->name('versements.destroy');
});
