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

Route::get('/', 'Frontend\FrontendController@index')->name('.');





Route::get('user/register','RegisterController@index')->name('user.register');
Route::post('user/register','RegisterController@submit');
Route::get('user/verified/{token}','RegisterController@verified')->name('user.verified');

		// backend/ dashboard category route

Auth::routes();
Route::get('/dashboard/category','Category\CategoryController@index')->name('dashboard.category');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

Route::name('dashboard.category.')->namespace('Category')->prefix('/dashboard/')->group(function(){
	Route::get('categories', 'CategoryController@index')->name('index');
	Route::get('category/add', 'CategoryController@add')->name('add');
	Route::post('category', 'CategoryController@store')->name('store');
	Route::get('category/{id}', 'CategoryController@show')->name('show');
	Route::get('category/{id}/edit', 'CategoryController@edit')->name('edit');
	Route::put('category/{id}', 'CategoryController@update')->name('update');
	Route::delete('category/{id}/delete', 'CategoryController@delete')->name('delete');

});

Route::resource('/dashboard/post', 'Backend\Post\PostController');



