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

Route::group(['prefix'=>'associado', 'where'=>['id'=>'[0-9]+']], function(){
    Route::get('/',             ['as'=>'associado',         'uses'=>'\App\Http\Controllers\AssociadoController@index'  ]);
    Route::get('/create',       ['as'=>'associado.create',  'uses'=>'\App\Http\Controllers\AssociadoController@create' ]);
    Route::post('/store',       ['as'=>'associado.store',   'uses'=>'\App\Http\Controllers\AssociadoController@store'  ]);
    Route::get('/{id}/destroy', ['as'=>'associado.destroy', 'uses'=>'\App\Http\Controllers\AssociadoController@destroy']);
    Route::get('/{id}/edit',    ['as'=>'associado.edit',    'uses'=>'\App\Http\Controllers\AssociadoController@edit'   ]);
    Route::put('/{id}/update',  ['as'=>'associado.update',  'uses'=>'\App\Http\Controllers\AssociadoController@update' ]);
});

//convidado
//reuniao
//projeto
//instituicao
//patrocinador
//endereco
//acesso
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
