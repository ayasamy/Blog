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
Route::group([

    'prefix'=>'admin/categories',
    'namespace'=>'Admin',
],function(){
    Route::get('/','CategoriesController@index');
Route::get('/create', 'CategoriesController@create');
Route::post('/','CategoriesController@store');
Route::get('/{id}','CategoriesController@edit');
Route::put('/{id}','CategoriesController@update');
Route::delete('/{id}','CategoriesController@destroy');
});

Route::resource('admin/posts','Admin\PostsController');

