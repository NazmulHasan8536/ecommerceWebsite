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
})->name('/');



route::get('/','MainController@index')->name('/');
route::get('about','MainController@about')->name('about');
route::get('all-post','MainController@post')->name('post');
route::get('contact-us','MainController@contact')->name('contact');

// Category
Route::prefix('category')->group(function(){
    Route::get('allCategory','category\CategoryController@allCategory')->name('about');
});