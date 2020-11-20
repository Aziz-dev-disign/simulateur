<?php

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
    return view('welcome');
});
Route::get('accueil', function () {
    return view('contact/layouts/accueil');
})->name('index');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'], function () {
    Route::resource('agence', 'AgenceController');
    Route::resource('simulateur', 'SimulateurController');
    Route::resource('list-document', 'ListDocumentController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('categorie', 'CategorieListController');
    Route::resource('rendez-vous', 'RdvController');
    Route::resource('roles', 'RoleController');
    Route::resource('type-simulateur', 'TypeSimulationController');
    Route::resource('user', 'UserController');
});



Auth::routes();

