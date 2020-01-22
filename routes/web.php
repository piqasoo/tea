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

Route::get('/welcome', function () {
    return view('welcome');
});

$locales = Config::get('app.locales');

$locale = Request::segment(1);
$uri = Request::path();
if(in_array($locale, $locales)){
  App::setLocale($locale);
} else {
  $locale = null;
}

Route::prefix($locale)->group(function(){
	Route::get('/', 'PagesController@homePage')->name('home');
	Route::get('/biography', 'PagesController@biographyPage')->name('biography');
	Route::get('/events/{filter}', 'PagesController@eventsPage')->name('events');
	Route::get('/events/{slug}/{id}', 'PagesController@eventPage')->name('event');
	Route::get('/press', 'PagesController@pressPage')->name('press');
	Route::get('/press/{slug}/{id}', 'PagesController@articlePage')->name('article');
	Route::get('/reviews', 'PagesController@reviewPage')->name('review');
	Route::get('/gallery-photo', 'PagesController@galleryPhotoPage')->name('galleryPhoto');
	Route::get('/gallery-photo/{slug}/{id}', 'PagesController@galleryDetaildPhotoPage')->name('galleryPhotoDetailed');
	Route::get('/gallery-video', 'PagesController@galleryVideoPage')->name('galleryVideo');
	Route::get('/contact', 'PagesController@contactPage')->name('contact');
});





