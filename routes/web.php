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
Route::prefix('dashboard')->namespace('Dashboard')->name('dashboard.')->middleware(['auth'])->group(function (){

    // Articles Route
    Route::resource('articles', 'ArticlesController');
    // Trashed Articles Route
    Route::get('/trashed-article', 'ArticlesController@trashed')->name('trashed.index');

    // Restore Trashed Article Route
    Route::get('/trashed-article/{id}', 'ArticlesController@restore')->name('trashed.restore');

    // Projects Route
    Route::resource('projects', 'ProjectsController');

    // Clients Route
    Route::resource('clients', 'ClientsController');

    // Services Route
    Route::resource('services', 'ServicesController');

    // Settings Route
    Route::resource('settings', 'SettingsController')->only(['edit', 'update', 'index']);

    // Pages Route
    Route::resource('pages', 'PagesController');

    // Users Route
    Route::resource('users', 'UserController')->except(['show']);

    Route::middleware(['profileOwner'])->group(function () {
        // Profile Route
        Route::get('users/{id}/profile', 'UserController@profile')->name('users.profile');
        Route::put('users/{id}/update', 'UserController@updateProfile')->name('users.updateProfile');
    });
});

Route::namespace('Front')->name('front.')->group(function () {
    // Home Route
    Route::get('/', 'FrontController@home')->name('home');

    // Article Route
    Route::get('articles', 'FrontController@articles')->name('articles.index');
    Route::get('articles/{id}', 'FrontController@articleShow')->name('articles.show');

    // Projects Route
    Route::get('projects', 'FrontController@projects')->name('projects.index');
    Route::get('projects/{id}', 'FrontController@projectShow')->name('projects.show');
});
// Front Routes
