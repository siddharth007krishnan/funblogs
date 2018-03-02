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

Route::get ('blogs' , 'BlogsController@index')->name('index');

Route::get ('blog/edit/{id}' , 'BlogsController@edit')->name('edit')->where('id' , '[0-9]+');

Route::put('blog/edit/{id}' , 'BlogsController@update')->name('update')->where('id' , '[0-9]+');

Route::get('blog/{id}' , 'BlogsController@show')->name('show')->where('id' , '[0-9]+');

//Route::get('blog/edit/{id}' , 'BlogsController@edit')->name('update')->where('id' , '[0-9]+');

Route::delete('blog/{id}' , 'BlogsController@destroy')->name('destroy')->where('id' , '[0-9]+');

Route::get('blog' , 'BlogsController@create')->name('create');

Route::post('blog' , 'BlogsController@store')->name('store');