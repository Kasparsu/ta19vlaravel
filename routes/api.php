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

Route::get('posts', [\App\Http\Controllers\PostController::class, 'posts']);

Route::get('proxy/{path}', [\App\Http\Controllers\ApiController::class, 'proxy'])->where('path', '.*');

Route::get('posts/new', [\App\Http\Controllers\ApiController::class, 'getNewPosts']);
Route::get('posts/new/long', [\App\Http\Controllers\ApiController::class, 'getNewPostsOrWait']);
