<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PagesController@getIndex')->middleware('auth');
Route::get('blog/{slug}', array('as'=>'blog.single','uses'=>'BlogController@getSingle'))->where('slug','[\w\d\-\_]+')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('Home');
Route::resource('admin','PostController')->middleware('auth');
