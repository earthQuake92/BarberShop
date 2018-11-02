<?php

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


/*
 * ***** ROUTE ADMIN ****
 * -SHOW ALL
 * -SHOW BY ID
 * -SHOW ALL SERVICE BY ID_ADMIN
 * -SHOW SERVICE ID_SERVICE BY ID_ADMIN
 * -CREATE ADMIN
 * -UPDATE ADMIN
 * -DELETE ADMIN
 */
 
Route::get('admins', 'AdminController@index');
Route::get('admin/{id}', 'AdminController@show');
Route::get('admin/{id}/impresa', 'AdminController@showImpresaByAdmin');
Route::get('admin/{id}/services', 'AdminController@showsAllServiceByAdmin');
Route::get('admin/{id_admin}/service/{id_service}', 'AdminController@showServiceByAdmin');
Route::post('admin/store', 'AdminController@store');
Route::put('admin/{id}/update', 'AdminController@update');
Route::delete('admin/{id}/destroy', 'AdminController@destroy');

/*
 * ***** ROUTE IMPRESA ****
 * -SHOW ALL
 * -SHOW BY ID
 * -SHOW CLIENTS OF IMPRESA
 * -SHOW CLIENT WITH ID OF IMPRESA
 * -CREATE IMPRESA
 * -UPDATE IMPRESA
 * -DELETE IMPRESA
 */

Route::get('imprese', 'ImpresaController@index');
Route::get('impresa/{id}', 'ImpresaController@show');
Route::get('impresa/{id}/clients', 'ImpresaController@showsAllClientByImpresa');
Route::get('impresa/{id_impresa}/client/{id_client}', 'ImpresaController@showClientByImpresa');
Route::post('impresa/store', 'ImpresaController@store');
Route::put('impresa/{id}/update', 'ImpresaController@update');
Route::delete('impresa/{id}/destroy', 'ImpresaController@destroy');


/*
 * ***** ROUTE SERVICE ****
 * -SHOW ALL
 * -SHOW BY ID
 * -CREATE SERVICE
 * -UPDATE SERVICE
 * -DELETE SERVICE
 */

Route::get('services', 'ServiceController@index');
Route::get('service/{id}', 'ServiceController@show');
Route::post('service/store', 'ServiceController@store');
Route::put('service/{id}/update', 'ServiceController@update');
Route::delete('service/{id}/destroy', 'ServiceController@destroy');

/*
 * ***** ROUTE CLIENT ****
 * -SHOW ALL
 * -SHOW BY ID
 * -SHOW PRENOTAZIONI OF CLIENT
 * -SHOW PRENOTAZIONE X OF CLIENT
 * -CREATE CLIENT
 * -UPDATE CLIENT
 * -DELETE CLIENT
 */

Route::get('clients', 'ClientController@index');
Route::get('client/{id}', 'ClientController@show');
Route::get('client/{id}/prenotazioni', 'ClientController@showsAllPrenotazioniByClient');
Route::get('client/{id_client}/prenotazione/{id_prenotazione}', 'ClientController@showPrenotazioneByClient');
Route::post('client/store', 'ClientController@store');
Route::put('client/{id}/update', 'ClientController@update');
Route::delete('client/{id}/destroy', 'ClientController@destroy');


/*
 * ***** ROUTE PRENOTAZIONE ****
 * -SHOW ALL
 * -SHOW BY ID
 * -CREATE PRENOTAZIONE
 * -UPDATE PRENOTAZIONE
 * -DELETE PRENOTAZIONE
 */

Route::get('prenotazioni', 'PrenotazioneController@index');
Route::get('prenotazione/{id}', 'PrenotazioneController@show');
Route::post('prenotazione/store', 'PrenotazioneController@store');
Route::put('prenotazione/{id}/update', 'PrenotazioneController@update');
Route::delete('prenotazione/{id}/destroy', 'PrenotazioneController@destroy');



/*
 * ***** ROUTE RAFFAELE ****
 *
 * 
 */

Route::post('template/{id}', 'TemplateController@store');
Route::get('template/{id}', 'TemplateController@show');


Route::get('/', function () {
    return view('welcome');
});
