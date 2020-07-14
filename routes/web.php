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



    // Auth Route
    Auth::routes(['register' => false]);


// Home Route
Route::get('/home', 'HomeController@index')->name('home');

// Dashboard Routes
Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function (){



    // Articles Route
    Route::resource('articles', 'Dashboard\ArticlesController');
    // Trashed Articles Route
    Route::get('/trashed-article', 'Dashboard\ArticlesController@trashed')->name('trashed.index');

    // Restore Trashed Article Route
    Route::get('/trashed-article/{id}', 'Dashboard\ArticlesController@restore')->name('trashed.restore');

    // Projects Route
    Route::resource('projects', 'Dashboard\ProjectsController');

    // Clients Route
    Route::resource('clients', 'Dashboard\ClientsController');

    // Services Route
    Route::resource('services', 'Dashboard\ServicesController');

    // Settings Route
    Route::resource('settings', 'Dashboard\SettingsController')->only(['edit', 'update', 'index']);

    // Pages Route
    Route::resource('pages', 'Dashboard\PagesController');

    // Users Route
    Route::resource('users', 'Dashboard\UserController')->except(['show']);

    Route::middleware(['profileOwner'])->group(function () {
        // Profile Route
        Route::get('users/{id}/profile', 'Dashboard\UserController@profile')->name('users.profile');
        Route::put('users/{id}/update', 'Dashboard\UserController@updateProfile')->name('users.updateProfile');
    });
});

Route::name('front.')->group(function () {
    // Home Route
    Route::get('/', 'Front\FrontController@home')->name('home');

    // Article Route
    Route::get('articles', 'Front\FrontController@articles')->name('articles.index');
    Route::get('articles/{id}', 'Front\FrontController@articleShow')->name('articles.show');

    // Projects Route
    Route::get('projects', 'Front\FrontController@projects')->name('projects.index');
    Route::get('projects/{id}', 'Front\FrontController@projectShow')->name('projects.show');
});
// Front Routes
