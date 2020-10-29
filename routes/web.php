<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NewsController;
use App\Http\Controllers\FrontNewsController;
use App\Http\Controllers\PhotoalbumController;
use App\Http\Controllers\FrontPhotoalbumController;
use App\Http\Controllers\VideoalbumController;
use App\Http\Controllers\FrontVideoalbumController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\FrontController;

Route::get('/','App\Http\Controllers\FrontController@index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// News
Route::resource('/news', NewsController::class)->middleware('auth');
Route::get('news/delete/{id}','App\Http\Controllers\NewsController@delete');
Route::post('news/file/{method}','App\Http\Controllers\NewsController@file');
// News Front
Route::resource('/front-news', FrontNewsController::class);

// Photoalbums
Route::resource('/photoalbums', PhotoalbumController::class)->middleware('auth');
Route::get('photoalbums/delete/{id}','App\Http\Controllers\PhotoalbumController@delete');
Route::post('photoalbums/file/{method}','App\Http\Controllers\PhotoalbumController@file');
// Photoalbums Front
Route::resource('/front-photoalbums', FrontPhotoalbumController::class);

// Videoalbums
Route::resource('/videoalbums', VideoalbumController::class)->middleware('auth');
Route::get('videoalbums/delete/{id}','App\Http\Controllers\VideoalbumController@delete');
Route::post('videoalbums/file/{method}','App\Http\Controllers\VideoalbumController@file');
// Videoalbums Front
Route::resource('/front-videoalbums', FrontVideoalbumController::class);

// Pages
Route::resource('/pages', PageController::class)->middleware('auth');
Route::get('pages/delete/{id}','App\Http\Controllers\PageController@delete');
Route::post('pages/file/{method}','App\Http\Controllers\PageController@file');
// Pages Front
Route::resource('/front-pages', FrontPageController::class);

// Settings
Route::resource('/settings', SettingController::class)->middleware('auth');
Route::post('settings/file/{method}','App\Http\Controllers\SettingController@file');