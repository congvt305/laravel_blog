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

Route::group(['middleware' => ['web']], function () {

    Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
    Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);
    Route::get('/', 'PagesController@getIndex')->name('/');
    Route::get('/about', 'PagesController@getAbout')->name('about');
    Route::get('/contact', 'PagesController@getContact');
    Route::post('/contact', 'PagesController@postContact');
    Route::resource('posts', 'PostController');
    Route::resource('categories', 'CategoryController');
    Route::resource('tags', 'TagController', ['except' => ['create']]);

    Route::post('comments/{post_id}', 'CommentController@store')->name('comments.store');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
