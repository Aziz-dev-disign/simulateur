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
Route::resource('/', 'AccueilController');

Route::group(['prefix' => 'simulateur', 'as' => 'simulateur.', 'namespace' => 'VueClient'], function () {
    Route::resource('credits','SimulateurCLientShowController');
    Route::resource('contact','ContactController');

});

Auth::routes(['register'=>false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth','can:dashboard']], function () {
    Route::get('home', 'HomeController@index');
    Route::resource('agence', 'AgenceController');
    Route::resource('simulateur', 'SimulateurController');    
    Route::resource('list-document', 'ListDocumentController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('categorie', 'CategorieListController');
    Route::resource('roles', 'RoleController');
    Route::resource('type-simulateur', 'TypeSimulationController');
    Route::resource('user', 'UserController');
    //fichier
    Route::resource('fichier', 'ImportFilesController');
    Route::post('fichier/dce','ImportFilesController@store_dce')->name('store_dce');

    //rendez-vous
    Route::resource('contact','ContactController');
    Route::get('rendez-vous/previewPage/{rendez_vous}','ContactController@print')->name('print_page');
});






