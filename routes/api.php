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

// Route::get('category_api',[\App\Http\Controllers\backend\categoryApiController::class,'index']);
Route::put('category/{id}',[\App\Http\Controllers\backend\categoryApiController::class,'update']);
Route::post('categoryAdd',[\App\Http\Controllers\backend\categoryApiController::class,'savecat']);
Route::delete('categoryDelete/{id}', [\App\Http\Controllers\backend\categoryApiController::class, 'deleteCat']);

// Route::post('categoryDelete/delete',[\App\Http\Controllers\backend\categoryApiController::class,'deleteCat']);

Route::resource('category_api',\App\Http\Controllers\backend\categoryApiController::class);






