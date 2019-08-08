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


Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){
	Route::get('/','productController@index');
    Route::get('add','productController@create');
    Route::post('store','productController@store');
    Route::get('delete/{id}','productController@destroy');
    Route::get('edit/{id}','productController@edit');
    Route::post('update/{id}','productController@update');
});

Auth::routes();
Route::group(['prefix'=>'/','middleware'=>'user'],function(){
   Route::get('home', 'HomeController@index');
   Route::post('add', 'HomeController@add');
   Route::get('cart', 'HomeController@show');
   Route::post('delete', 'HomeController@destroy');

});

