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

//setup the photos controller
Route::resource('photos','PhotosController');

Route::group(['middleware'=>'admin'], function(){

    Route::get('/admin', function(){

        return view('admin.index');

    });

    Route::name('admin')->resource('/admin/users', 'AdminUsersController');
    Route::name('admin')->resource('/admin/posts', 'AdminPostsController');
    Route::name('admin')->resource('/admin/categories', 'AdminCategoriesController');
    Route::name('admin')->resource('/admin/medias', 'AdminMediasController');

    // customized admin.medias.upload if you want
    // Route::name('admin.medias.upload')->get('/admin/medias/upload', 'AdminMediasController@store');
    // customized multi-medias delete
    Route::delete('/admin/delete/medias', 'AdminMediasController@deleteMedias');

    Route::name('admin')->resource('/admin/comments', 'PostCommentsController');
    Route::name('admin.comment')->resource('/admin/comment/replies', 'CommentRepliesController');
});


//Route::delete('photos/{id}','PhotosController@destroy');