<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\DaftarController;

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

Route::get('/', [HomeController::class, 'index']);

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('admin', 'admin')->name('admin');
    Route::get('/unit/details/{id}/daftar',[DaftarController::class,'create']);
    Route::post('/unit/details/{id}/daftar', [DaftarController::class, 'store']);
});

Route::get('/unit/details/{id}',[HomeController::class,'show']);



Route::get('/admin/details/{id}',[DaftarController::class,'show']);
Route::get('/admin',[DaftarController::class,'index']);
Route::get('/admin/edit/{id}',[DaftarController::class,'edit']);
Route::post('/admin/edit/{id}',[DaftarController::class,'update']);
Route::get('/admin/deleted/{id}',[DaftarController::class,'destroy']);

Route::get('/mencari',[DaftarController::class,'mencari']);
// Route::get('/mencari', 'App\Http\Controllers\DaftarController@mencari');
// Route::get('/mencari', 'DaftarController@mencari');
