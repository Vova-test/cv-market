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

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::get('/appold', function () {
    return view('appold');
});*/

Auth::routes();

Route::redirect('/', 'home');

/*Route::get('/home', 'HomeController@index')
	->name('home');*/

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@index')->name('posthome');
	/*->middleware('auth')
	->middleware('check.manager');*/

Route::get('/cv/{cv}', 'CvController@index')
	->name('cv')
		->middleware('auth');

Route::get('/cv-delete/{cv}', 'CvController@delete')->name('deleteCV');
Route::get('/cv-check/{cv}', 'CvController@check')->name('checkCV');
Route::get('/cv-create', 'CvController@showCreatePage')->name('showCreatePage');
Route::get('/cv-update', 'CvController@showUpdatePage')->name('showUpdatePage');
