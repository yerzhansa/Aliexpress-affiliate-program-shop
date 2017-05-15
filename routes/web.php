<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/category', 'CategoryController@index');
Route::get('/category/{id}', ['as' => 'viewCategory', 'uses' => 'CategoryController@singleCategory']);
Route::get('/a/{url}', ['as' => 'viewArticle', 'uses' => 'ContentController@index']);



Route::get('/faker', 'TestController@test');

Route::get('/admin', ['as' => 'admin', 'uses' => 'AdminController@index']);
Route::get('/admin/category/create', ['as' => 'createCategory', 'uses' => 'AdminController@createCategory']);
Route::post('/admin/category/store', ['as' => 'storeCategory', 'uses' => 'AdminController@storeCategory']);
Route::get('/admin/category/all', ['as' => 'allCategory', 'uses' => 'AdminController@allCategories']);
Route::get('/admin/category/all/trashed', ['as' => 'allTrashedCategories', 'uses' => 'AdminController@allTrashedCategories']);
Route::get('/admin/category/trashed/restore/{id}', ['as' => 'restoreTrashedCategory', 'uses' => 'AdminController@restoreTrashedCategory']);
Route::get('/admin/category/trashed/delete/{id}', ['as' => 'forceDeleteCategory', 'uses' => 'AdminController@forceDeleteCategory']);
Route::get('/admin/category/update/{id}', ['as' => 'updateCategory', 'uses' => 'AdminController@updateCategory']);
Route::post('/admin/category/refresh/{id}', ['as' => 'refreshCategory', 'uses' => 'AdminController@storeCategory']);
Route::get('/admin/category/delete/{id}', ['as' => 'deleteCategory', 'uses' => 'AdminController@softDeleteCategory']);
Route::get('/admin/category/delete/{id}', ['as' => 'deleteCategory', 'uses' => 'AdminController@softDeleteCategory']);

Route::get('/admin/article/create', ['as' => 'createArticle', 'uses' => 'AdminController@addArticle']);
Route::post('/admin/article/store', ['as' => 'storeArticle', 'uses' => 'AdminController@storeArticle']);
Route::get('/admin/article/all', ['as' => 'allArticles', 'uses' => 'AdminController@allArticles']);
Route::get('/admin/article/update/{id}', ['as' => 'updateArticle', 'uses' => 'AdminController@updateArticle']);
Route::post('/admin/article/refresh/{id}', ['as' => 'refreshArticle', 'uses' => 'AdminController@storeArticle']);
Route::get('/admin/article/delete/{id}', ['as' => 'deleteArticle', 'uses' => 'AdminController@softDeleteArticle']);

Route::get('/admin/article/all/trashed', ['as' => 'allTrashedArticles', 'uses' => 'AdminController@allTrashedArticles']);
Route::get('/admin/article/trashed/restore/{id}', ['as' => 'restoreTrashedArticle', 'uses' => 'AdminController@restoreTrashedArticle']);
Route::get('/admin/article/trashed/delete/{id}', ['as' => 'forceDeleteArticle', 'uses' => 'AdminController@forceDeleteArticle']);