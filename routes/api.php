<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\FrontController;

Route::get('/front/settings','App\Http\Controllers\Api\FrontController@settings');

Route::get('/front/pages','App\Http\Controllers\Api\FrontController@pages');
Route::get('/front/page/{id}','App\Http\Controllers\Api\FrontController@pageItem');

Route::get('/front/news','App\Http\Controllers\Api\FrontController@news');
Route::get('/front/newsAll','App\Http\Controllers\Api\FrontController@newsAll');
Route::get('/front/newsitem/{id}','App\Http\Controllers\Api\FrontController@newsItem');

Route::get('/front/photoalbums','App\Http\Controllers\Api\FrontController@photoalbums');
Route::get('/front/photoalbum/{id}','App\Http\Controllers\Api\FrontController@photoalbumItem');

Route::get('/front/videoalbums','App\Http\Controllers\Api\FrontController@videoalbums');
Route::get('/front/videoalbum/{id}','App\Http\Controllers\Api\FrontController@videoalbumItem');

Route::get('/front/schemes','App\Http\Controllers\Api\FrontController@schemes');
Route::get('/front/scheme/{id}','App\Http\Controllers\Api\FrontController@schemeItem');

Route::get('/front/r01routes','App\Http\Controllers\Api\FrontController@r01routes');
Route::get('/front/r01route/{id}','App\Http\Controllers\Api\FrontController@r01routeItem');

Route::post('/front/review', 'App\Http\Controllers\FrontReviewController@store_post');