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

Route::get('/',[
    'uses' => "WebController@index",
    'as' => 'index'
]);

Route::get('/mapa',[
    'uses' => "WebController@mapa",
    'as' => 'mapa'
]);

Route::post('/login',[
    'uses' => "WebController@login",
    'as' => 'login'
]);
//agregar al server
Route::get('/clientes',[
    'uses' => 'WebController@clientesView',
    'as' => 'clientes.view'
]);

//movil api
Route::get('/gettrabajadores/{id}',[
   'uses' => "ApiController@getTrabajadores"
]);

Route::post('/logint',[
   'uses' => "ApiController@logint"
]);



Route::post('/logincli',[
   'uses' => "ApiController@logincli"
]);

Route::post('/reload/{id}',[
   'uses' => "ApiController@reload"
]);

Route::post('/cancel/{id}',[
   'uses' => "ApiController@cancel"
]);

Route::post('/addtrabajadores/{id}',[
   'uses' => "ApiController@addtrabajadores"
]);

Route::post('/delete/{id}',[
   'uses' => "ApiController@delete"
]);
