<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/logout', 'Auth\LoginController@logout')->middleware('auth')->name('logout');
//Route::get('verify/{confirmationCode}', 'Auth\RegisterController@confirm')->name('verify_email');
//Route::get('verified', function () {
//    return view('auth.verified');
//});

Route::group(['middleware' => 'auth'], function () {
//    Route::post('/get-bid', 'Api\Media\GetConvertationBid');
//    Route::apiResource('images', 'API\PhotoController');
//    Route::post('/result', 'Api\Media\SetConvertationResult');
});

