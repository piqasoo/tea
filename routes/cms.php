<?php
// use Auth;
/*
|--------------------------------------------------------------------------
| CMS Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function(){
	Route::resource('/', 'DashboardController');
	Route::resource('about', 'AboutController');
	Route::resource('contact', 'ContactController');
	Route::resource('events', 'EventController');
	Route::resource('news', 'NewsController');
	Route::resource('review', 'ReviewController');
	Route::resource('slider', 'SliderController');
});