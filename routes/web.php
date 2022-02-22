<?php

use Illuminate\Support\Facades\Auth;
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

/* Route::get('/', function () {
    return view('guests.home');
}); */

Auth::routes();

/* Route::get('/home', 'HomeController@index')->name('home'); */

Route::middleware('auth')
->name('admin.')
->prefix('admin')
->namespace('Admin')
->group( function() {

    Route::get('/', 'HomeController@index' )->name('home'); 

    Route::resource("dishes", "DishController");
    Route::resource("orders", "OrderController");

    
    /* Route::get('/chart/months', 'OrderController@chartMonths'); */
    Route::get("/chart", 'OrderController@getChart')->name('chart');

    
});


Route::resource ('checkout', 'CheckoutController' );

Route::post('/search', 'SearchController@search')->name('search');

 Route::get("{any?}",function() {    // serve a creare una rotta generica che ho se clicco un url generico 
    return view("guests.home");
})->where("any", ".*"); 
