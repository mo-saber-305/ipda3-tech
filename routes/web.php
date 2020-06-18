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

Route::get('/home', 'HomeController@index')->name('home');

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

// Services Route
Route::resource('settings', 'Dashboard\SettingsController');

