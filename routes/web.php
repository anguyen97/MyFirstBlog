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

Auth::routes();

/**
 * Admin
 */

Route::group(['prefix' => 'admin'], function() {

    // Authentication Routes...
	Route::get('', 'AdminAuth\LoginController@showLoginForm');

	Route::get('login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');

	Route::post('login', 'AdminAuth\LoginController@login')->name('admin.login.process');

    // Registration Routes...
	Route::get('register', 'AdminAuth\RegisterController@showRegistrationForm')->name('admin.register');

	Route::post('register', 'AdminAuth\RegisterController@register')->name('admin.signin');

    // Password Reset Routes...
	Route::get('password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');

	Route::post('password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

	Route::get('password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm')->name('admin.password.reset');
	
	Route::post('password/reset', 'AdminAuth\ResetPasswordController@reset');

});

/**
 * Login with socialite
 */

//Google login
Route::get('login/google', 'AdminAuth\GoogleController@redirectToProvider')->name('admin.login.google');
Route::get('login/google/callback', 'AdminAuth\GoogleController@handleProviderCallback');

//Facebook login
Route::get('login/twitter', 'AdminAuth\TwitterController@redirectToProvider')->name('admin.login.twitter');
Route::get('login/twitter/callback', 'AdminAuth\TwitterController@handleProviderCallback');

//Github login
Route::get('login/facebook', 'AdminAuth\FacebookController@redirectToProvider')->name('admin.login.facebook');
Route::get('login/facebook/callback', 'AdminAuth\FacebookController@handleProviderCallback');

/**
 * PROCESS IN ROLE ADMIN
 */

Route::prefix('admin')->middleware('admin')->group(function(){

	//Logout routes
	Route::post('logout', 'AdminController@getLogout')->name('admin.logout');

	// ROUTE: HOME
	Route::get('/home','AdminController@getIndex')->name('admin.home');

	/**
	 * CATEGORIES
	 */
	Route::group(['prefix' => 'categories'], function() {

		Route::get('/','Admin\CategoryController@index')->name('categories.list');

		Route::get('/{id}','Admin\CategoryController@show')->name('categories.show');

		Route::get('/{id}/posts','Admin\CategoryController@listPost')->name('categories.listPost');

		Route::post('/store','Admin\CategoryController@store')->name('categories.store');

		Route::put('/update/{id}', 'Admin\CategoryController@update')->name('categories.update');

		Route::delete('/delete/{id}','Admin\CategoryController@destroy')->name('categories.delete');

	});

	/* POSTS */
	Route::group(['prefix' => 'posts'], function() {

		Route::get('/','Admin\PostController@adminIndex')->name('admin.posts.list');

		Route::get('/{id}','Admin\PostController@adminPostShow')->name('admin.posts.show');

		// Route::get('/draft','Admin\PostController@adminDraftPosts')->name('admin.posts.draft');

		Route::get('create','Admin\PostController@adminPostCreate')->name('admin.posts.create');

		Route::post('/store','Admin\PostController@adminPostStore')->name('admin.posts.store');

		// Route::put('/draft','Admin\PostController@adminDraftUpt')->name('admin.posts.draft.update');

		Route::put('/edit/{slug}','Admin\PostController@adminPostEdit')->name('admin.posts.edit');

		Route::put('/update','Admin\PostController@adminPostUpdate')->name('admin.posts.update');

		Route::delete('/delete/{id}','Admin\PostController@adminPostDelete')->name('admin.posts.delete');
		
	});	

	Route::group(['prefix' => 'tags'], function() {

		Route::get('/','Admin\TagController@adminIndex')->name('admin.tags.list');

		Route::get('/{id}','Admin\TagController@adminTagShow')->name('admin.tags.show');

		Route::post('/store','Admin\TagController@adminTagStore')->name('admin.tags.store');

		Route::put('/update/{id}','Admin\TagController@adminTagUpdate')->name('admin.tags.update');

		Route::delete('/delete/{id}','Admin\TagController@adminTagDelete')->name('admin.tags.delete');
	});

	Route::group(['prefix' => 'users'], function() {

		Route::get('/','Admin\UserController@adminIndex')->name('admin.users.list');

		Route::get('/listUser','Admin\UserController@getListUserDatatables')->name('admin.users.list.datatable');

		Route::get('/{id}','Admin\UserController@adminUserShow')->name('admin.users.show');

		Route::post('/store','Admin\UserController@adminUserStore')->name('admin.users.store');

		Route::put('/update/{id}','Admin\UserController@adminUserUpdate')->name('admin.users.update');

		Route::delete('/delete/{id}','Admin\UserController@adminUserDelete')->name('admin.users.delete');
	});

});


/**
 * Blog
 */
Route::get('/', 'Blog\HomeController@about')->name('blog.about');
Route::get('/', 'Blog\HomeController@index')->name('blog.about');

Route::get('/home', 'Blog\HomeController@index')->name('blog.home');

Route::get('/posts/{slug}','Blog\HomeController@blogPostShow')->name('blog.posts.detail');

