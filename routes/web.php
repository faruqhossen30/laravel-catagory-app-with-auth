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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Category Route
Route::get('category/all', 'CategoryController@allCat')->name('all.category');
Route::post('category/add', 'CategoryController@addCat')->name('store.catagory');
Route::get('category/edit/{id}', 'CategoryController@editCat')->name('edit.catagory');
Route::post('category/update/{id}', 'CategoryController@upadateCat')->name('update.catagory');
Route::get('category/destroy/{id}', 'CategoryController@destroyCat')->name('destroy.catagory');
