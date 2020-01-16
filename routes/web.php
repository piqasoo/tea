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
include "cms.php";

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', 'PagesController@homePage')->name('home');
Route::get('/biography', 'PagesController@biographyPage')->name('biography');
Route::get('/events/{filter}', 'PagesController@eventsPage')->name('events');
Route::get('/press', 'PagesController@pressPage')->name('press');




