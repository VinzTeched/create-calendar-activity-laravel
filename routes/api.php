<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['web']], function () {
    Route::group(['namespace' => 'Admin'], function(){
		//Admin Auth Routes
		Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
		Route::post('admin-login', 'Auth\LoginController@login');
		Route::post('admin-logout', 'Auth\LoginController@logout')->name('admin-logout');

		Route::middleware(['auth:admin'])->group(function () {
			Route::resource('admin/role', 'RoleController');
			Route::resource('admin/permission', 'PermissionController');
			Route::resource('admin/user', 'UserController');
			Route::resource('admin/user-update', 'UserUpdateController');	
		
			Route::get('/admin/home', 'AdminController@index')->name('admin.home');
			Route::get('/admin', 'AdminController@admin');
			Route::get('/', 'AdminController@admin');
		
			Route::get('calender', 'CalendarController@index')->name('calender');
			Route::post('calender/create', 'CalendarController@create')->name('calender.create');
			Route::post('calender/update', 'CalendarController@update')->name('calender.update');
			Route::post('calender/delete', 'CalendarController@delete')->name('calender.delete');
		});
	});
	
});

