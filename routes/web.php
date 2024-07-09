<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;

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
Route::match(["get"], '/', "homeController@index")->name('index');
Route::group(['prefix' => 'usuario/',  'as' => 'usuarios.',   ], function () {
    Route::match(["get" , "post"], '/', "usuarioController@index")->name('index');
    Route::get('create', "usuarioController@create")->name('create');
    Route::get('edit/{id}', "usuarioController@edit")->name('edit');
    Route::get('viewer/{id}', "usuarioController@viewer")->name('viewer');
    Route::post('save/{id?}', "usuarioController@save")->name('save');
    Route::get('delete/{id}', "usuarioController@delete")->name('delete');
});
