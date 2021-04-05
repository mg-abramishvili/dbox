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
use App\Http\Controllers\SchemeController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\R01routeController;
use App\Http\Controllers\R02routeController;
use App\Http\Controllers\R03routeController;
use App\Http\Controllers\R04routeController;
use App\Http\Controllers\R05routeController;
use App\Http\Controllers\R06routeController;
use App\Http\Controllers\R07routeController;
use App\Http\Controllers\R08routeController;
use App\Http\Controllers\R09routeController;
use App\Http\Controllers\R10routeController;
use App\Http\Controllers\FrontR01routeController;
use App\Http\Controllers\FrontR02routeController;
use App\Http\Controllers\FrontR03routeController;
use App\Http\Controllers\FrontR04routeController;
use App\Http\Controllers\FrontR05routeController;
use App\Http\Controllers\FrontR06routeController;
use App\Http\Controllers\FrontR07routeController;
use App\Http\Controllers\FrontR08routeController;
use App\Http\Controllers\FrontR09routeController;
use App\Http\Controllers\FrontR10routeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FrontReviewController;

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

// Banners
Route::resource('/banners', BannerController::class)->middleware('auth');
Route::get('banners/delete/{id}','App\Http\Controllers\BannerController@delete');
Route::post('banners/file/{method}','App\Http\Controllers\BannerController@file');

// Pages
Route::resource('/pages', PageController::class)->middleware('auth');
Route::get('pages/delete/{id}','App\Http\Controllers\PageController@delete');
Route::post('pages/file/{method}','App\Http\Controllers\PageController@file');
Route::post('pg/upload/image', 'App\Http\Controllers\PageController@summernoteUpload');
Route::delete('pg/remove/image', 'App\Http\Controllers\PageController@summernoteRemove');

// Pages Front
Route::resource('/front-pages', FrontPageController::class);

// SCHEMES
Route::resource('/schemes', SchemeController::class)->middleware('auth');
Route::get('schemes/delete/{id}','App\Http\Controllers\SchemeController@delete')->middleware('auth');
Route::post('schemes/file/{method}','App\Http\Controllers\SchemeController@file')->middleware('auth');

// R01ROUTES
Route::resource('/r01routes', R01routeController::class)->middleware('auth');
Route::get('r01routes/delete/{id}','App\Http\Controllers\R01routeController@delete')->middleware('auth');
// R02ROUTES
Route::resource('/r02routes', R02routeController::class)->middleware('auth');
Route::get('r02routes/delete/{id}','App\Http\Controllers\R02routeController@delete')->middleware('auth');
// R03ROUTES
Route::resource('/r03routes', R03routeController::class)->middleware('auth');
Route::get('r03routes/delete/{id}','App\Http\Controllers\R03routeController@delete')->middleware('auth');
// R04ROUTES
Route::resource('/r04routes', R04routeController::class)->middleware('auth');
Route::get('r04routes/delete/{id}','App\Http\Controllers\R04routeController@delete')->middleware('auth');
// R05ROUTES
Route::resource('/r05routes', R05routeController::class)->middleware('auth');
Route::get('r05routes/delete/{id}','App\Http\Controllers\R05routeController@delete')->middleware('auth');
// R06ROUTES
Route::resource('/r06routes', R06routeController::class)->middleware('auth');
Route::get('r06routes/delete/{id}','App\Http\Controllers\R06routeController@delete')->middleware('auth');
// R07ROUTES
Route::resource('/r07routes', R07routeController::class)->middleware('auth');
Route::get('r07routes/delete/{id}','App\Http\Controllers\R07routeController@delete')->middleware('auth');
// R08ROUTES
Route::resource('/r08routes', R08routeController::class)->middleware('auth');
Route::get('r08routes/delete/{id}','App\Http\Controllers\R08routeController@delete')->middleware('auth');
// R09ROUTES
Route::resource('/r09routes', R09routeController::class)->middleware('auth');
Route::get('r09routes/delete/{id}','App\Http\Controllers\R09routeController@delete')->middleware('auth');
// R10ROUTES
Route::resource('/r10routes', R10routeController::class)->middleware('auth');
Route::get('r10routes/delete/{id}','App\Http\Controllers\R10routeController@delete')->middleware('auth');

// FRONT R01ROUTES
Route::resource('/front-r01routes', FrontR01routeController::class);
// FRONT R02ROUTES
Route::resource('/front-r02routes', FrontR02routeController::class);
// FRONT R03ROUTES
Route::resource('/front-r03routes', FrontR03routeController::class);
// FRONT R04ROUTES
Route::resource('/front-r04routes', FrontR04routeController::class);
// FRONT R05ROUTES
Route::resource('/front-r05routes', FrontR05routeController::class);
// FRONT R06ROUTES
Route::resource('/front-r06routes', FrontR06routeController::class);
// FRONT R07ROUTES
Route::resource('/front-r07routes', FrontR07routeController::class);
// FRONT R08ROUTES
Route::resource('/front-r08routes', FrontR08routeController::class);
// FRONT R09ROUTES
Route::resource('/front-r09routes', FrontR09routeController::class);
// FRONT R10ROUTES
Route::resource('/front-r10routes', FrontR10routeController::class);

// Reviews
Route::resource('/reviews', ReviewController::class)->middleware('auth');
Route::get('reviews/delete/{id}','App\Http\Controllers\ReviewController@delete');
// Reviews Front
Route::get('/front-reviews', 'App\Http\Controllers\FrontReviewController@create');
Route::post('/front-reviews', 'App\Http\Controllers\FrontReviewController@store');
Route::get('/front-reviews-success', 'App\Http\Controllers\FrontReviewController@review_success');

// Settings
Route::resource('/settings', SettingController::class);
Route::post('settings/file/{method}','App\Http\Controllers\SettingController@file');


Route::get('/{vue?}', function () {
    return view('layouts.vue');
})->where('vue', '[\/\w\.-]*');