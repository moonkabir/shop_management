<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopSettingsController;
use App\Http\Controllers\ProductController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () { return view('admin/dashboard'); })->middleware(['auth'])->name('dashboard');
Route::get('/shop-settings', [ShopSettingsController::class, 'index'])->middleware(['auth'])->name('ShopSettings');
Route::post('/shop-settings/create', [ShopSettingsController::class, 'create'])->middleware(['auth'])->name('ShopSettingsCreate');

//=========================admin panel product settings routes======================================
Route::get('/product/manage', [ProductController::class, 'manage'])->middleware(['auth'])->name('ProductManage');
Route::get('/product/create', [ProductController::class, 'create'])->middleware(['auth'])->name('ProductCreate');
Route::post('/product/store', [ProductController::class, 'store'])->middleware(['auth'])->name('ProductStore');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->middleware(['auth'])->name('ProductEdit');
Route::post('/product/update', [ProductController::class, 'update'])->middleware(['auth'])->name('ProductUpdate');
Route::post('/product/delete/', [ProductController::class, 'delete'])->middleware(['auth'])->name('ProductDelete');


require __DIR__.'/auth.php';
