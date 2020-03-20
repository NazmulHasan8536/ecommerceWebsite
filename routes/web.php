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
// route::get('all-post','MainController@post')->name('post');
route::get('contact-us','MainController@contact')->name('contact');

// Category
Route::prefix('category')->group(function(){

    Route::get('All-category', 'category\CategoryController@index')->name('AllCategory');
    Route::get('Add-category', 'category\CategoryController@create')->name('AddCategory');
    Route::post('all-category', 'category\CategoryController@store')->name('storeCategory');
    Route::get('/view/{id}','category\CategoryController@viewCategory');
    Route::get('/delete/{id}','category\CategoryController@deleteCategory');
    Route::get('/edit/{id}','category\CategoryController@editCategory');
    Route::post('/update/{id}','category\CategoryController@updateCategory');
    
});


// post 

route::prefix('post')->group(function(){
    route::get('All-post','post\PostController@index')->name('post');
    route::get('Add-post','post\postController@create')->name('AddPost');
});