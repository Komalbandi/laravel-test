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

Route::get('/administrator', 'Administrator@show')->middleware('cors');

Route::post('/admininstrator-new-blog','Administrator@newBlog')->middleware('cors');

Route::post('/administrator-get-blog','Administrator@getBlog')->middleware('cors');

Route::put('/administrator-update-blog','Administrator@updateBlog')->middleware('cors');