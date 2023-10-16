<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes (version 2)
|--------------------------------------------------------------------------
|
| Here is where you can register API version 2 routes for your application.
|
| READ: https://laraveldaily.com/post/laravel-api-versioning-v1-v2
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('hello', function() {
    return "Hello, this is API v2";
});
