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

/**
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

Route::get('/', 'PhotosController@index');


//Route::post('photos/create','PhotosController@store');

Route::get('photos/create2','PhotosController@create2');
Route::post('photos/store2','PhotosController@store2');
Route::get('photos/my','PhotosController@my');

//setup the photos controller
Route::resource('photos','PhotosController');



//Route::delete('photos/{id}','PhotosController@destroy');