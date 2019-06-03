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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
        Route::prefix('clases')->name('clases.')->group(function (){
            Route::get('/', 'ClaseController@index')->name('index');
            Route::get('create', 'ClaseController@create')->name('create');
            Route::get('show/{id}', 'ClaseController@show')->name('show');
            Route::post('store', 'ClaseController@store')->name('store');
            Route::post('update', 'ClaseController@update')->name('update');
        });

});

Auth::routes();


