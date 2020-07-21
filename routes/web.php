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

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/blog-creation', 'Admin\AdminBlogController@createIndex');

    Route::post('/blog-creation', 'Admin\AdminBlogController@create')->name('blog-creation');

    Route::get('/dashboard', 'Admin\AdminBlogController@index')->name('dashboard');

    Route::get('/edit/{id}', 'Admin\AdminBlogController@edit')->name('edit');

    Route::get('/delete/{id}', 'Admin\AdminBlogController@delete')->name('delete');

    Route::get('/publish/{id}', 'Admin\AdminBlogController@publish')->name('publish');

    Route::get('/unpublish/{id}', 'Admin\AdminBlogController@unpublish')->name('unpublish');

    Route::get('/trend/{id}', 'Admin\AdminBlogController@trend')->name('trend');

    Route::get('/untrend/{id}', 'Admin\AdminBlogController@untrend')->name('untrend');

    Route::get('/main/{id}', 'Admin\AdminBlogController@main')->name('main');

    Route::get('/unmain/{id}', 'Admin\AdminBlogController@unmain')->name('unmain');
    
    Route::get('/reviews', 'Admin\ReviewController@index')->name('reviews');

    Route::get('/review-creation', 'Admin\ReviewController@createIndex');

    Route::post('/review-creation', 'Admin\ReviewController@create')->name('review-creation');

    Route::get('/edit-review/{id}', 'Admin\ReviewController@edit')->name('edit-review');

    Route::get('/delete-review/{id}', 'Admin\ReviewController@delete')->name('delete-review');
});

