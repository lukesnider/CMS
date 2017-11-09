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


Route::prefix('admin')->group(function () {
	Route::middleware('auth')->group(function () {
		Route::get('/', 'AdminController@index')->name('admin.index');
		Route::get('/pages', 'AdminController@pages')->name('admin.pages');
		Route::get('/pages/{id}', 'AdminController@page')->name('admin.page');
		Route::post('/pages', 'AdminController@pageEdit')->name('admin.page.edit');
		

	});
	// Authentication Routes...
	Route::get('login', [
	  'as' => 'login',
	  'uses' => 'Auth\LoginController@showLoginForm'
	]);
	Route::post('login', [
	  'as' => '',
	  'uses' => 'Auth\LoginController@login'
	]);
	Route::post('logout', [
	  'as' => 'logout',
	  'uses' => 'Auth\LoginController@logout'
	]);

	// Password Reset Routes...
	Route::post('password/email', [
	  'as' => 'password.email',
	  'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
	]);
	Route::get('password/reset', [
	  'as' => 'password.request',
	  'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
	]);
	Route::post('password/reset', [
	  'as' => '',
	  'uses' => 'Auth\ResetPasswordController@reset'
	]);
	Route::get('password/reset/{token}', [
	  'as' => 'password.reset',
	  'uses' => 'Auth\ResetPasswordController@showResetForm'
	]);

	// Registration Routes...
	Route::get('register', [
	  'as' => 'register',
	  'uses' => 'Auth\RegisterController@showRegistrationForm'
	]);
	Route::post('register', [
	  'as' => '',
	  'uses' => 'Auth\RegisterController@register'
	]);


});





Route::middleware('web')->group(function () {

	Route::get('/', 'PageController@index')->name('pages.index');

	Route::any('{slug?}','PageController@show')->name('pages.show')->where('slug', '(.*)');
	

});
