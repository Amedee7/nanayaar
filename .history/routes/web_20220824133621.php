<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

    //CITIES ROUTE
    Route::get('/cities/datatable', [CityController::class, 'datatables'])->middleware('permission:ville-lire')->name('cities.datatables');
    Route::get('/cities', [CityController::class, 'index'])->middleware('permission:ville-lire')->name('cities.index');
    Route::get('/cities/create', [CityController::class, 'create'])->middleware('permission:ville-creer')->name('cities.create');
    Route::post('/cities/store', [CityController::class, 'store'])->middleware('permission:ville-creer')->name('cities.store');
    Route::get('/cities/{id}/view', [CityController::class, 'show'])->middleware('permission:ville-lire')->name('cities.show');
    Route::get('/cities/{id}/edit', [CityController::class, 'edit'])->middleware('permission:ville-modifier')->name('cities.edit');
    Route::patch('/cities/{id}/update', [CityController::class, 'update'])->middleware('permission:ville-modifier')->name('cities.update');
    Route::delete('/cities/{id}/destroy', [CityController::class, 'destroy'])->middleware('permission:ville-supprimer')->name('cities.destroy');

    //CLASSES ROUTE
    Route::get('/classes/datatable', [ClasseController::class, 'datatables'])->middleware('permission:classe-lire')->name('classes.datatables');
    Route::get('/classes', [ClasseController::class, 'index'])->middleware('permission:classe-lire')->name('classes.index');
    Route::get('/classes/create', [ClasseController::class, 'create'])->middleware('permission:classe-creer')->name('classes.create');
    Route::post('/classes/store', [ClasseController::class, 'store'])->middleware('permission:classe-creer')->name('classes.store');
    Route::get('/classes/{id}/view', [ClasseController::class, 'show'])->middleware('permission:classe-lire')->name('classes.show');
    Route::get('/classes/{id}/edit', [ClasseController::class, 'edit'])->middleware('permission:classe-modifier')->name('classes.edit');
    Route::patch('/classes/{id}/update', [ClasseController::class, 'update'])->middleware('permission:classe-modifier')->name('classes.update');
    Route::delete('/classes/{id}/destroy', [ClasseController::class, 'destroy'])->middleware('permission:classe-supprimer')->name('classes.destroy');
});
