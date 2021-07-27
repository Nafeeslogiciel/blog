<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostHandleController;
use App\Http\Resources\Product\ProductResource;
use App\Http\Controllers\CommentController;


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



//Route::resource('users',UserController::class)->only(['login','store']);
Route::post('userlogin',[Usercontroller::class,'login']);
Route::post('register',[Usercontroller::class,'store']);
Route::middleware('auth:api')->resource('postinfo',PostHandleController::class)->only(['index','store','update','destroy']);
Route::resource('comment',CommentController::class);




