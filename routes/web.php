<?php

use App\Http\Controllers\commentController;
use App\Http\Controllers\DashboardControllers;
use App\Http\Controllers\categoryControll;
use App\Http\Controllers\FontendControllers;
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






Route::get('/locale/{lange}',[App\Http\Controllers\localizationController::class,'setlang']);


Route::get('/login',[App\Http\Controllers\loginControllars::class,'index'])->name('login');
Route::post('/adlogin',[App\Http\Controllers\loginControllars::class,'adlogin'])->name('adlogin');


//category
Route::middleware(['auth'])->group(function () {


Route::get('/logout',[App\Http\Controllers\loginControllars::class,'logout'])->name('logout');
    Route::get('/admin/dashboard', [\App\Http\Controllers\DashboardControllers::class, 'dashboard'])->name('/');


//fontend



//dasbord
Route::get('/admin_comment', [\App\Http\Controllers\Fontend\commentController::class, 'commentList'])->name('admin_comment');

Route::get('/dashboard1',[App\Http\Controllers\DashboardControllers::class , 'dashboard1']);
Route::get('/dashboardtwo',[App\Http\Controllers\DashboardControllers::class , 'dashboardtwo']);
Route::get('/addCategory',[App\Http\Controllers\categoryControll::class,'addCategory']);
Route::get('/categoryList', [\App\Http\Controllers\categoryControll::class, 'categoryList']);
Route::post('/saveCat', [\App\Http\Controllers\categoryControll::class, 'saveCat']);
Route::get('/categroy/eidt/{id}', [\App\Http\Controllers\categoryControll::class, 'edit']);
Route::post('/update', [\App\Http\Controllers\categoryControll::class, 'update']);
Route::get('/delete/{id}', [\App\Http\Controllers\categoryControll::class, 'delete']);
Route::get('/eidt', [\App\Http\Controllers\NewsControllers::class, 'eidt']);

Route::resource('news',App\Http\Controllers\NewsControllers::class);

});

Route::get('/',[App\Http\Controllers\FontendControllers::class,'index']);
Route::get('/category',[App\Http\Controllers\FontendControllers::class,'index']);
Route::get('/categories/{category_id}',[App\Http\Controllers\FontendControllers::class,'webcategory'])->name('wb.cat');
Route::get('/new/{news_id}',[App\Http\Controllers\FontendControllers::class,'newsDetails'])->name('wb.news');
Route::get('/contact',[App\Http\Controllers\FontendControllers::class,'webcontact']);
Route::resource('comment',App\Http\Controllers\Fontend\commentController::class);
Route::resource('visitor_login',App\Http\Controllers\Fontend\VisitorLoginController::class);

Route::post('/visitor_do_login', [\App\Http\Controllers\Fontend\VisitorLoginController::class, 'visitor_do_login'])->name('visitor_do_login');
