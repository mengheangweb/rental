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
Route::middleware(['auth', 'setLocale'])->group(function () {

    Route::prefix('/unit')->group(function () {
        Route::get('/', 'UnitController@index');
        Route::get('/create', 'UnitController@create')->middleware('periodCheck');;
        Route::post('/store', 'UnitController@store');
        Route::get('/restores/{id}', 'UnitController@restore');
        Route::get('/edit/{id}', 'UnitController@edit');
        Route::patch('/update/{id}', 'UnitController@update');
        Route::delete('/delete/{id}', 'UnitController@delete');
    });

    Route::prefix('/rent')->group(function () {
        Route::get('/', 'RentController@index');
        Route::get('/create', 'RentController@create');;
        Route::post('/store', 'RentController@store');
    });

    Route::prefix('/category')->group(function () {
        Route::get('/create', 'CategoryController@create');
        Route::post('/store', 'CategoryController@store');
    });

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/notification', 'NotificationController@index')->name('notification');
    Route::get('/', function () {
        return view('welcome');
    });
});



Auth::routes();

Route::get('/setting/locale/{locale}', 'SettingController@switchLocale')->name('home');
