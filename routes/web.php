<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/login', function () {
    abort(404);
});
Route::get('/admin', function(){return view('auth.login');})->name('admin');
// Auth::routes();
Auth::routes(['register' => false]);

Route::middleware('auth')->group(function () {
    // Route::get('/home', 'HomeController@index')->name('home');

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

    Route::get('/add-to-carousel/{id}', 'Admin\ReviewController@addToCarousel')->name('add-to-carousel');

    Route::get('/remove-from-carousel/{id}', 'Admin\ReviewController@removeFromCarousel')->name('remove-from-carousel');

    Route::get('/carousel', 'Admin\PageController@carousel')->name('carousel');

});


Route::get('/blog', 'BlogController@index');

Route::get('/blog/{slug}', 'BlogController@show')->name('blog-inner');

Route::get('/portfolio', function () {
    return view('Portfolio');
});

Route::get('/company', 'CompanyController@index')->name('company');

Route::get('/about-us', function () {
    return view('AboutUs');
});

Route::get('/api-integration', function () {
    return view('API_Integration');
});

Route::get('/business-intelligence', function () {
    return view('BI');
});

Route::get('/big-data', function () {
    return view('BigData');
});

Route::get('/consulting', function () {
    return view('Consulting');
});

Route::get('/customer-relationship-management', function () {
    return view('CRM');
});

Route::get('/custom-development', 'CustomDevelopmentController@index')->name('custom-development');

Route::get('e-commerce', function () {
    return view('E_Commerce');
});

Route::get('/industries', function () {
    return view('Industries');
});

Route::get('/mobile-development', function () {
    return view('MobileDevelopment');
});

Route::get('/privacy-policy', function () {
    return view('PrivacyPolicy');
});

Route::get('/processes', function () {
    return view('Processes');
});

Route::get('/real-time-solutions', function () {
    return view('RealTimeSolutions');
});

Route::get('/services', function () {
    return view('Services');
});

Route::get('/solutions', function () {
    return view('Solutions');
});

Route::get('/web-development', function () {
    return view('WebDevelopment');
});

Route::get('/contact-us', 'ContactUsController@index')->name('contact-us');

Route::post('/contact-us', 'ContactUsController@send')->name('contact-us-send');

Route::post('/subscribe', 'ContactUsController@subscribe')->name('contact-us-subscribe');
