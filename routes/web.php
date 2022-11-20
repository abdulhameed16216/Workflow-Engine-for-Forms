<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerApiController;
use App\Http\Controllers\AdminApiController;

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

    // Route::get('/', function () {
    //     return view('welcome');
    // });


Route::get('/', function () {
    return view('customer/index');
});


Route::post('customer/add', [CustomerApiController::class, 'add']);
Route::post('admin/login', [AdminApiController::class, 'login']);
Route::post('admin/logout', [AdminApiController::class, 'logout']);

Route::any('admin/', [AdminController::class, 'index'])->middleware('AdminLoginValid');
Route::any('admin/home', [AdminController::class, 'home'])->middleware('AdminLoginInValid');
Route::any('admin/customerstatus', [AdminApiController::class, 'customerStatus'])->middleware('AdminLoginInValid');
