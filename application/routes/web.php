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
    Route::prefix('clases')->name('clases.')->group(function () {
        Route::get('/', 'ClaseController@index')->name('index');
        Route::get('show/{id}', 'ClaseController@show')->name('show');
        Route::get('create', 'ClaseController@create')->name('create');
        Route::get('getin', 'ClaseController@getin')->name('getin');
        Route::post('join', 'ClaseController@join')->name('join');
        Route::post('store', 'ClaseController@store')->name('store');
        Route::get('edit/{id}', 'ClaseController@edit')->name('edit');
        Route::post('update/{id}', 'ClaseController@update')->name('update');
        Route::get('delete/{id}', 'ClaseController@delete')->name('delete');

        Route::prefix('{claseid}/tareas')->name('tareas.')->group(function () {
            Route::get('show/{id}', 'TareaController@show')->name('show');
            Route::get('create', 'TareaController@create')->name('create');
            Route::post('store', 'TareaController@store')->name('store');
            Route::get('edit/{id}', 'TareaController@edit')->name('edit');
            Route::post('update/{id}', 'TareaController@update')->name('update');
            Route::get('delete/{id}', 'TareaController@destroy')->name('delete');

            Route::prefix('{tareaid}/respuestas')->name('respuestas.')->group(function () {
                Route::get('ver', 'RespuestaController@ver')->name('ver');
                Route::post('store/{id?}', 'RespuestaController@store')->name('store');
                Route::get('edit/{id?}', 'RespuestaController@edit')->name('edit');
                Route::get('download/{id}', 'RespuestaController@download')->name('download');
            });
        });
    });
});

Auth::routes();
