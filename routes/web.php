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

Route::get('/', 'SiteController@index');
Route::get('/about', 'SiteController@about');
Route::get('/catering', 'SiteController@catering');
Route::get('/contact', 'SiteController@contactForm');
Route::post('/contact', 'SiteController@contactFormPost');

Route::get('/admin', 'AdminController@index');
Route::get('/admin/user/{user}', 'AdminController@editUser')->middleware('admin');
Route::delete('/user/{user}', 'AdminController@deleteUser')->middleware('admin');
Route::post('/admin/user', 'AdminController@createUser')->middleware('admin');

Route::resource('services', 'ServicesController');
Route::resource('menu', 'MenuItemsController');
Route::get('/menu/{id}/toggle-active', 'MenuItemsController@updateActive');
Route::resource('news', 'PostController');


Auth::routes();
