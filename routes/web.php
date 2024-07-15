<?php

use App\Http\Controllers\DashboardControllers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
//Route::get('/', function () {
//    return view('backend.dashboard');
//});



//fontend
Route::get('/homepage',[App\Http\Controllers\FontendControllers::class,'homepage']);
Route::get('/contact',[App\Http\Controllers\FontendControllers::class,'contact']);
Route::get('/services',[App\Http\Controllers\FontendControllers::class,'services']);
Route::get('/news',[App\Http\Controllers\FontendControllers::class,'news']);



Route::get('/login',[App\Http\Controllers\loginControllars::class,'index'])->name('login');
Route::post('/adlogin',[App\Http\Controllers\loginControllars::class,'adlogin'])->name('adlogin');


//category
Route::middleware(['auth'])->group(function () {


Route::get('/logout',[App\Http\Controllers\loginControllars::class,'logout'])->name('logout');
Route::get('/dashboard1',[App\Http\Controllers\DashboardControllers::class , 'dashboard1']);
Route::get('/dashboard', [\App\Http\Controllers\DashboardControllers::class, 'dashboard'])->name('dashboard');
Route::get('/dashboardtwo',[App\Http\Controllers\DashboardControllers::class , 'dashboardtwo']);

Route::get('/addCategory',[App\Http\Controllers\categoryControll::class,'addCategory']);
Route::get('/categoryList', [\App\Http\Controllers\categoryControll::class, 'categoryList']);
Route::post('/saveCat', [\App\Http\Controllers\categoryControll::class, 'saveCat']);
Route::get('/categroy/eidt/{id}', [\App\Http\Controllers\categoryControll::class, 'eidt']);
Route::post('/update', [\App\Http\Controllers\categoryControll::class, 'update']);
Route::get('/delete/{id}', [\App\Http\Controllers\categoryControll::class, 'delete']);

});

