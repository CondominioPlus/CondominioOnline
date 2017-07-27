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



//usa login y forgot ... registro en otro lado 
Auth::routes();



/*
*
*
*   HOME CONTROLLER ... PAGINA REGISTRO ... 
*   
*   USA LA FUNCION INICIO STORE DE USERCONTROLLER 
*   
*/
Route::get('/', 'HomeController@index')->name('inicio');
Route::get('/registro', 'HomeController@registro')->name('registro');
Route::post('/registro', 'UserController@inicioStore')->name('userStore');






// RESOURCES 

Route::group(array('prefix' => 'admin', 'before' => 'auth'), function(){
    Route::get('/dashboard','HomeController@dashboard')->name('dashboard');
    // place your route definitions here
    Route::resource('/condominio', 'CondominioController');
    Route::resource('/tipo_unidad', 'TUPController');
    Route::resource('/unidad', 'UnidadController');
    Route::resource('/usuarios', 'UserController');

});



