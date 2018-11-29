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

Route::get('/admin', function () {
    return view('bienvenida');
})->name('panel');

Route::get('/', 'FrontWeb\HomeController@index')->name('mexquiterestaurant');
Route::get('/menu', 'FrontWeb\MenuController@index')->name('menu');
Route::get('/reservation', 'FrontWeb\ReservationController@index')->name('reservation');
Route::get('/gallery', 'FrontWeb\GalleryController@index')->name('gallery');

Route::get('/aboutUs', function(){
  return view('FrontWeb\AboutUs');
})->name('aboutUs');

Route::get('/contact', function(){
  
  return view('FrontWeb\Contact');
})->name('contact');


Auth::routes();

Route::group(['prefix' => 'admin'], function(){
	Route::resource('categories', 'Category\CategoryController');
	Route::resource('categories.dishes', 'Category\CategoryDishController');
	Route::resource('categories.galleries', 'Category\CategoryGalleryController');
	
	Route::resource('clients', 'Client\ClientController');
	Route::resource('clients.reservations', 'Client\ClientReservationController');

	Route::resource('dishes', 'Dish\DishController');
	Route::resource('galleries', 'Gallery\GalleryController');
	Route::resource('images', 'Image\ImageController');
	
	Route::resource('reservations', 'Reservation\ReservationController');
	Route::resource('reservations.dishes', 'Reservation\ReservationDishController');

	Route::resource('tables', 'Table\TableController');
	Route::resource('users', 'User\UserController');
});