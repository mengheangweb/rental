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

Route::prefix('/unit')->middleware(['auth'])->group(function () {
    Route::get('/', 'UnitController@index');
    Route::get('/create', 'UnitController@create')->middleware('periodCheck');;
    Route::post('/store', 'UnitController@store');
    Route::get('/edit/{id}', 'UnitController@edit');
    Route::patch('/update/{id}', 'UnitController@update');
    Route::delete('/delete/{id}', 'UnitController@delete');
});

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
