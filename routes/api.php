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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register','Api\ApiController@register');
Route::post('/login','Api\ApiController@login');

Route::post('/auth-user','Api\ApiController@authuser');



Route::apiResource('/category','Api\CategoryController');

Route::apiResource('/product','Api\ProductController');

Route::get('/product_paginate','Api\ProductController@product_paginate');
