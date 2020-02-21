<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('campings', 'Api\Admin\CampingsController')->only(['update', 'destroy', 'store']);
Route::resource('user-campings', 'Api\CampingsController')->only(['update', 'index']);
Route::resource('newest-campings', 'Api\NewestCampingsController')->only(['index']);
Route::resource('top-rated-campings', 'Api\TopRatedCampingsController')->only(['index']);

