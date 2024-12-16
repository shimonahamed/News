<?php
use \App\Http\Controllers\Fontend\commentController;

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
Route::get('comments_data',[commentController::class, 'getcomment']);
Route::post('comments_data/delete',[commentController::class, 'commentDelete']);

Route::resource('category_api',\App\Http\Controllers\Backend\categoryApiController::class);


