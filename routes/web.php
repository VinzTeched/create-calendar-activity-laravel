<?php

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

Route::get('/', function () {
	return redirect(route('home'));
});


Auth::routes();

Route::middleware(['auth'])->group(function () {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('calender', 'CalendarController@index')->name('calender');
	Route::post('calender/create', 'CalendarController@create')->name('calender.create');
	Route::post('calender/update', 'CalendarController@update')->name('calender.update');
	Route::post('calender/delete', 'CalendarController@delete')->name('calender.delete');
	Route::resource('admin/user', 'UserController');
	Route::get('activities', 'CalendarController@activity')->name('activity.index');
	Route::get('find-activity', 'CalendarController@findActivity')->name('activity.find');
});



Route::group(['namespace' => 'Admin'], function(){
/*
	
	Route::middleware(['auth:admin'])->group(function () {
		Route::get('admin/messages', 'GetController@getMessages')->name('messages');
		Route::resource('admin/user-update', 'UserUpdateController');	

		Route::get('/admin/home', 'AdminController@index')->name('admin.home');
		Route::get('/admin', 'AdminController@admin');
		Route::get('/', 'AdminController@admin');

	});*/
});



