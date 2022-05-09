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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/category','Api\ApiController@getcategory');
Route::get('/subcategory','Api\ApiController@getsubcategory');
Route::get('/childcategory','Api\ApiController@getchildcategory');

// Address
Route::get('/country','Api\AddressController@getCountry');
Route::get('/state','Api\AddressController@getState');
Route::get('/city','Api\AddressController@getCity');
