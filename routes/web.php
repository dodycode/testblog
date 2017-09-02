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

Route::get('/', 'HomeController@index');
Route::get('/read', 'HomeController@redirectToIndex');
Route::get('/read/{slug}', 'HomeController@showPostOrPage');


//===========================================ADMIN ROUTE=======================================================//
Auth::routes();

//Admin Home
Route::get('/admin', 'AdminController@index');

//Tags
Route::get('/admin/tags', 'AdminController@tags');
Route::get('/admin/tags/add', 'AdminController@addTag');
Route::post('store-tag', 'AdminController@storeTag');
Route::get('/admin/tags/edit/{id}', 'AdminController@editTag');
Route::post('storeEditTag/{id}', 'AdminController@storeEditedTag');
Route::get('/admin/tags/hapus/{id}', 'AdminController@deleteTag');

//Category
Route::get('/admin/categories', 'AdminController@categories');
Route::get('/admin/categories/add', 'AdminController@addCategory');
Route::post('store-category', 'AdminController@storeCategory');
Route::get('/admin/categories/edit/{id}', 'AdminController@editCategory');
Route::post('storeEditCategory/{id}', 'AdminController@storeEditedCategory');
Route::get('/admin/categories/hapus/{id}', 'AdminController@deleteCategory');

//Posts
Route::get('/admin/posts', 'AdminController@posts');
Route::get('/admin/posts/add', 'AdminController@addPost');
Route::post('store-post', 'AdminController@storePost');
Route::get('/admin/posts/edit/{id}', 'AdminController@editPost');
Route::post('storeEditPost/{id}', 'AdminController@storeEditedPost');
Route::get('/admin/posts/hapus/{id}', 'AdminController@deletePost');


//AJAX
Route::get('/ajax-page', 'AdminController@ajaxPage');
Route::get('/ajax-tag', 'AdminController@ajaxTag');
Route::get('/ajax-category', 'AdminController@ajaxCategory');
Route::get('/ajax-post', 'AdminController@ajaxPost');
