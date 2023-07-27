<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopSettingsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;


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

//=========================admin panel Category settings routes======================================
Route::get('/category/manage', [CategoryController::class, 'manage'])->middleware(['auth'])->name('CategoryManage');
Route::get('/category/create', [CategoryController::class, 'create'])->middleware(['auth'])->name('CategoryCreate');
Route::post('/category/store', [CategoryController::class, 'store'])->middleware(['auth'])->name('CategoryStore');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->middleware(['auth'])->name('CategoryEdit');
Route::post('/category/update', [CategoryController::class, 'update'])->middleware(['auth'])->name('CategoryUpdate');
Route::post('/category/delete/', [CategoryController::class, 'delete'])->middleware(['auth'])->name('CategoryDelete');

//=========================admin panel SubCategory settings routes======================================
Route::get('/subcategory/manage', [SubCategoryController::class, 'manage'])->middleware(['auth'])->name('SubCategoryManage');
Route::get('/subcategory/create', [SubCategoryController::class, 'create'])->middleware(['auth'])->name('SubCategoryCreate');
Route::post('/subcategory/store', [SubCategoryController::class, 'store'])->middleware(['auth'])->name('SubCategoryStore');
Route::get('/subcategory/edit/{id}', [SubCategoryController::class, 'edit'])->middleware(['auth'])->name('SubCategoryEdit');
Route::post('/subcategory/update', [SubCategoryController::class, 'update'])->middleware(['auth'])->name('SubCategoryUpdate');
Route::post('/subcategory/delete/', [SubCategoryController::class, 'delete'])->middleware(['auth'])->name('SubCategoryDelete');


require __DIR__.'/auth.php';
