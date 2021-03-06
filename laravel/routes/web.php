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

Route::middleware(['routelog'])->group(function(){
	Auth::routes();
	Route::get('/', 'HomeController@index')->name('welcome');
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/event/show/{id}', 'EventController@show')->name('event.show');
	Route::post('/checkout', 'CheckoutController@index')->name('checkout.index');
});