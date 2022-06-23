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

//Associado
Route::group(['prefix'=>'associado', 'where'=>['id'=>'[0-9]+']], function(){
    Route::get('/',             ['as'=>'associado',         'uses'=>'\App\Http\Controllers\AssociadoController@index'  ]);
    Route::get('/create',       ['as'=>'associado.create',  'uses'=>'\App\Http\Controllers\AssociadoController@create' ]);
    Route::post('/store',       ['as'=>'associado.store',   'uses'=>'\App\Http\Controllers\AssociadoController@store'  ]);
    Route::get('/{id}/destroy', ['as'=>'associado.destroy', 'uses'=>'\App\Http\Controllers\AssociadoController@destroy']);
    Route::get('/{id}/edit',    ['as'=>'associado.edit',    'uses'=>'\App\Http\Controllers\AssociadoController@edit'   ]);
    Route::put('/{id}/update',  ['as'=>'associado.update',  'uses'=>'\App\Http\Controllers\AssociadoController@update' ]);
});

//Convidado
Route::group(['prefix'=>'convidado', 'where'=>['id'=>'[0-9]+']], function(){
    Route::get('/',             ['as'=>'convidado',         'uses'=>'\App\Http\Controllers\ConvidadoController@index'  ]);
    Route::get('/create',       ['as'=>'convidado.create',  'uses'=>'\App\Http\Controllers\ConvidadoController@create' ]);
    Route::post('/store',       ['as'=>'convidado.store',   'uses'=>'\App\Http\Controllers\ConvidadoController@store'  ]);
    Route::get('/{id}/destroy', ['as'=>'convidado.destroy', 'uses'=>'\App\Http\Controllers\ConvidadoController@destroy']);
    Route::get('/{id}/edit',    ['as'=>'convidado.edit',    'uses'=>'\App\Http\Controllers\ConvidadoController@edit'   ]);
    Route::put('/{id}/update',  ['as'=>'convidado.update',  'uses'=>'\App\Http\Controllers\ConvidadoController@update' ]);
});

//Reunião
Route::group(['prefix'=>'reuniao', 'where'=>['id'=>'[0-9]+']], function(){
    Route::get('/',             ['as'=>'reuniao',         'uses'=>'\App\Http\Controllers\ReuniaoController@index'  ]);
    Route::get('/create',       ['as'=>'reuniao.create',  'uses'=>'\App\Http\Controllers\ReuniaoController@create' ]);
    Route::post('/store',       ['as'=>'reuniao.store',   'uses'=>'\App\Http\Controllers\ReuniaoController@store'  ]);
    Route::get('/{id}/destroy', ['as'=>'reuniao.destroy', 'uses'=>'\App\Http\Controllers\ReuniaoController@destroy']);
    Route::get('/{id}/edit',    ['as'=>'reuniao.edit',    'uses'=>'\App\Http\Controllers\ReuniaoController@edit'   ]);
    Route::put('/{id}/update',  ['as'=>'reuniao.update',  'uses'=>'\App\Http\Controllers\ReuniaoController@update' ]);
});

//Projeto
Route::group(['prefix'=>'projeto', 'where'=>['id'=>'[0-9]+']], function(){
    Route::get('/',             ['as'=>'projeto',         'uses'=>'\App\Http\Controllers\ProjetoController@index'  ]);
    Route::get('/create',       ['as'=>'projeto.create',  'uses'=>'\App\Http\Controllers\ProjetoController@create' ]);
    Route::post('/store',       ['as'=>'projeto.store',   'uses'=>'\App\Http\Controllers\ProjetoController@store'  ]);
    Route::get('/{id}/destroy', ['as'=>'projeto.destroy', 'uses'=>'\App\Http\Controllers\ProjetoController@destroy']);
    Route::get('edit',    ['as'=>'projeto.edit',    'uses'=>'\App\Http\Controllers\ProjetoController@edit'   ]);
    Route::put('/{id}/update',  ['as'=>'projeto.update',  'uses'=>'\App\Http\Controllers\ProjetoController@update' ]);
});

//Instituição
Route::group(['prefix'=>'instituicao', 'where'=>['id'=>'[0-9]+']], function(){
    Route::get('/',             ['as'=>'instituicao',         'uses'=>'\App\Http\Controllers\InstituicaoController@index'  ]);
    Route::get('/create',       ['as'=>'instituicao.create',  'uses'=>'\App\Http\Controllers\InstituicaoController@create' ]);
    Route::post('/store',       ['as'=>'instituicao.store',   'uses'=>'\App\Http\Controllers\InstituicaoController@store'  ]);
    Route::get('/{id}/destroy', ['as'=>'instituicao.destroy', 'uses'=>'\App\Http\Controllers\InstituicaoController@destroy']);
    Route::get('/{id}/edit',    ['as'=>'instituicao.edit',    'uses'=>'\App\Http\Controllers\InstituicaoController@edit'   ]);
    Route::put('/{id}/update',  ['as'=>'instituicao.update',  'uses'=>'\App\Http\Controllers\InstituicaoController@update' ]);
});

//Patrocinador
Route::group(['prefix'=>'patrocinador', 'where'=>['id'=>'[0-9]+']], function(){
    Route::get('/',             ['as'=>'patrocinador',         'uses'=>'\App\Http\Controllers\PatrocinadorController@index'  ]);
    Route::get('/create',       ['as'=>'patrocinador.create',  'uses'=>'\App\Http\Controllers\PatrocinadorController@create' ]);
    Route::post('/store',       ['as'=>'patrocinador.store',   'uses'=>'\App\Http\Controllers\PatrocinadorController@store'  ]);
    Route::get('/{id}/destroy', ['as'=>'patrocinador.destroy', 'uses'=>'\App\Http\Controllers\PatrocinadorController@destroy']);
    Route::get('/{id}/edit',    ['as'=>'patrocinador.edit',    'uses'=>'\App\Http\Controllers\PatrocinadorController@edit'   ]);
    Route::put('/{id}/update',  ['as'=>'patrocinador.update',  'uses'=>'\App\Http\Controllers\PatrocinadorController@update' ]);
});

//Endereço
Route::group(['prefix'=>'endereco', 'where'=>['id'=>'[0-9]+']], function(){
    Route::get('/',             ['as'=>'endereco',         'uses'=>'\App\Http\Controllers\EnderecoController@index'  ]);
    Route::get('/create',       ['as'=>'endereco.create',  'uses'=>'\App\Http\Controllers\EnderecoController@create' ]);
    Route::post('/store',       ['as'=>'endereco.store',   'uses'=>'\App\Http\Controllers\EnderecoController@store'  ]);
    Route::get('/{id}/destroy', ['as'=>'endereco.destroy', 'uses'=>'\App\Http\Controllers\EnderecoController@destroy']);
    Route::get('/{id}/edit',    ['as'=>'endereco.edit',    'uses'=>'\App\Http\Controllers\EnderecoController@edit'   ]);
    Route::put('/{id}/update',  ['as'=>'endereco.update',  'uses'=>'\App\Http\Controllers\EnderecoController@update' ]);
});

//Cargo
Route::group(['prefix'=>'cargo', 'where'=>['id'=>'[0-9]+']], function(){
    Route::get('/',             ['as'=>'cargo',         'uses'=>'\App\Http\Controllers\CargoController@index'  ]);
    Route::get('/create',       ['as'=>'cargo.create',  'uses'=>'\App\Http\Controllers\CargoController@create' ]);
    Route::post('/store',       ['as'=>'cargo.store',   'uses'=>'\App\Http\Controllers\CargoController@store'  ]);
    Route::get('/{id}/destroy', ['as'=>'cargo.destroy', 'uses'=>'\App\Http\Controllers\CargoController@destroy']);
    Route::get('/{id}/edit',    ['as'=>'cargo.edit',    'uses'=>'\App\Http\Controllers\CargoController@edit'   ]);
    Route::put('/{id}/update',  ['as'=>'cargo.update',  'uses'=>'\App\Http\Controllers\CargoController@update' ]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
