<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\PostController;


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
    return view('pages.index');
});

Route::get('home',function(){
    echo "Hello Everyone this is home page";
});

Route::get('about','App\Http\Controllers\HelloController@About')->name('about');
Route::get('contact','App\Http\Controllers\HelloController@Contact')->name('contact');

// Category CRUD are here==========================
Route::get('add/category','App\Http\Controllers\HelloController@AddCategory')->name('add.category');
Route::get('all/category','App\Http\Controllers\HelloController@AllCategory')->name('all.category');
Route::post('store/category','App\Http\Controllers\HelloController@StoreCategory')->name('store.category');
Route::get('view/category/{id}','App\Http\Controllers\HelloController@ViewCategory');
Route::get('delete/category/{id}','App\Http\Controllers\HelloController@DeleteCategory');
Route::get('edit/category/{id}','App\Http\Controllers\HelloController@EditCategory');
Route::post('update/category/{id}','App\Http\Controllers\HelloController@UpdateCategory');

//Posts CRUD are here================================
Route::get('write/post','App\Http\Controllers\PostController@writePost')->name('write.post');
Route::post('store/post','App\Http\Controllers\PostController@StorePost')->name('store.post');
Route::get('all/post','App\Http\Controllers\PostController@AllPost')->name('all.post');

