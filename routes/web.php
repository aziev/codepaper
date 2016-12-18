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

Route::get('/', 'ArticleController@index');
// Route::get('/article/{id}', 'ArticleController@show');
Route::resource('article', 'ArticleController', [
    'only' => ['create', 'store', 'show'],
]);

Auth::routes();

Route::get('/home', 'HomeController@index');
