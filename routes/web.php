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


Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],
function()
{


Auth::routes();

Route::get('/', 'siteController@index')->name('site');
Route::post('/', 'siteController@subscribe')->name('site.subscribe');

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'permission:*-index|*-show|*-create|*-edit|*-delete']], function () {


Route::get('/','dashboardController@index')->name('hello');

	//service
	Route::post('service/store','serviseController@store')->name('service_store');
	Route::get('service/create','serviseController@create')->name('service_create');
	Route::get('service/index','serviseController@index')->name('service_index');
	Route::get('service/show/{id}','serviseController@show')->name('service_show');
	Route::post('service/delete/{id}', 'serviseController@destroy')->name('service_delete');
	Route::get('service/edit/{id}','serviseController@edit')->name('service_edit');
	Route::post('service/update/{id}','serviseController@update')->name('service_update');

	//Setting

	Route::resource('/setting','settingController');
	Route::resource('/project','projectController');
	Route::resource('/email','emailController');
	Route::resource('/social','socialController');
	Route::resource('/mobile','mobileController');
	Route::resource('/subscribe','subscribeController');
	Route::resource('/role','roleController');
	 Route::resource('user', 'UserController');
});		











Route::get('/home', 'HomeController@index')->name('home');

Route::get('image/{filename}', function ($filename) {
	return response()->file(storage_path('app\\public\\') . "$filename");
})->name('image_show');


});

