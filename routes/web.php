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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'HomeController@index');
Route::get('/readData', 'WSController@readData');
Route::get('/readTables', 'WSController@readTables');

/*ESTRATO*/
Route::get('/estrato', 'EstratoController@novoEstrato');
Route::post('/estrato', 'EstratoController@salvarEstrato');
Route::get('/estrato/visualizar/{id}', 'EstratoController@visualizarEstrato');
Route::get('/estrato/{id}', 'EstratoController@buscarEstrato');
Route::get('/deletarEstrato/{id}', 'EstratoController@deletarEstrato');
/*FIM ESTRATO*/

/*TALHAO*/
Route::get('/talhao/{estratoId}', 'TalhaoController@novoTalhao');
Route::post('/talhao/{estratoId}', 'TalhaoController@salvarTalhao');
Route::get('/talhao/visualizar/{id}', 'TalhaoController@visualizarTalhao');
//Route::get('/talhoes', 'TalhaoController@readTalhoes');
Route::get('/talhao/editar/{id}', 'TalhaoController@buscarTalhao');
Route::get('/deletarTalhao/{id}', 'TalhaoController@deletarTalhao');

Route::get('/removerKml/{id}/{arquivo}', 'TalhaoController@removerKml');

//Route::post('/talhao/{id}', 'TalhaoController@updateTalhao');
/*FIM TALHAO*/

/*ESPECIE*/
Route::get('/especie', 'EspecieController@novaEspecie');
Route::post('/especie', 'EspecieController@salvarEspecie');
Route::get('/especie/visualizar/{id}', 'EspecieController@visualizarEspecie');
Route::get('/especie/{id}', 'EspecieController@buscarEspecie');
Route::get('/deletarEspecie/{id}', 'EspecieController@deletarEspecie');
/*FIM ESPECIE*/

/*PARCELA*/
Route::get('/parcela/{talhaoId}', 'ParcelaController@novaParcela');
Route::post('/parcela/{talhaoId}', 'ParcelaController@salvarParcela');
Route::get('/parcela/visualizar/{id}', 'ParcelaController@visualizarParcela');
Route::get('/parcela/editar/{id}', 'ParcelaController@buscarParcela');
Route::get('/deletarParcela/{id}', 'ParcelaController@deletarParcela');

//Route::get('/parcela/{id}', 'ParcelaController@detalhesParcela');
/*FIM PARCELA*/

/*UPLOAD ARQUIVO*/
//Route::post('/preview', 'UploadController@upload');
/*FIM UPLOAD ARQUIVO*/
