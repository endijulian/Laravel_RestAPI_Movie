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

Auth::routes(['register'=>false, 'reset'=>false]);


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    // Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home', ['uses' => 'HomeController@index', 'as' => 'home']);

    Route::get('/movie', ['uses' => 'MoviesController@index', 'as' => 'movie']);
    Route::get('/movie/create', ['uses' => 'MoviesController@create', 'as' => 'movie.create']);
    Route::post('/movie/store', ['uses' => 'MoviesController@store', 'as' => 'movie.store']); 
    Route::get('/movie/edit/{id}', ['uses' => 'MoviesController@edit', 'as' => 'movie.edit']);
    Route::post('/movie/update/{id}', ['uses' => 'MoviesController@update', 'as' => 'movie.update']);
    Route::get('/movie/delete/{id}', ['uses' => 'MoviesController@destroy', 'as' => 'movie.delete']);
    
    Route::get('/kategori', ['uses' => 'KategoriController@index', 'as' => 'kategori']);
    Route::get('/kategori/create', ['uses' => 'KategoriController@create', 'as' => 'kategori.create']);
    Route::post('/kategori/store', ['uses' => 'KategoriController@store', 'as' => 'kategori.store']);
    Route::get('/kategori/edit/{id}', ['uses' => 'KategoriController@edit', 'as' => 'kategori.edit']);
    Route::post('/kategori/update/{id}', ['uses' => 'KategoriController@update', 'as' => 'kategori.update']);
    Route::get('/kategori/delete/{id}', ['uses' => 'KategoriController@destroy', 'as' => 'kategori.delete']);
});

