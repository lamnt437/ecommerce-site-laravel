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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users/{id}/info', 'UserController@info');

Route::get('/users/{id}/request', 'UserController@request');

Route::get('/requests', 'RequestController@index');

Route::get('/requests/create', 'RequestController@create');

Route::post('/requests/store', 'RequestController@store');

Route::post('/requests/{id}/approve', 'RequestController@approve');

Route::post('/requests/{id}/reject', 'RequestController@reject');