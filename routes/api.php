<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('customerauth')->group(function() {

    //show detail customers
    Route::get('customers/show/{id}', 'CustomerApi\CustomersController@show')->name('customers.show');
});

//kategoris
Route::resource('kategoris', 'KategoriApi\KategorisController', ['only' => 'index']);

//movies
Route::resource('movies', 'MovieApi\MoviesController', ['only' => 'index','show']);
Route::get('movies/show/{id}', ['uses' => 'MovieApi\MoviesController@show', 'as' => 'movies.show']);
Route::get('movies/showByKat/{id}', 'MovieApi\MoviesController@showByKat')->name('movies.showByKat');

//register customers
Route::post('customers/store', 'CustomerApi\CustomersController@store')->name('customers.store');
Route::post('customersLogin/store', 'CustomerApi\CustomersLoginController@store')->name('customersLogin.store');


//Orders
Route::post('orders/store', 'OrderApi\OrdersController@store')->name('orders.store');