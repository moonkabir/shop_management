<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopSettingsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LookupController;
use App\Http\Controllers\SalesOrderController;


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

//=========================admin panel Brand settings routes======================================
Route::get('/brand/manage', [BrandController::class, 'manage'])->middleware(['auth'])->name('BrandManage');
Route::get('/brand/create', [BrandController::class, 'create'])->middleware(['auth'])->name('BrandCreate');
Route::post('/brand/store', [BrandController::class, 'store'])->middleware(['auth'])->name('BrandStore');
Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->middleware(['auth'])->name('BrandEdit');
Route::post('/brand/update', [BrandController::class, 'update'])->middleware(['auth'])->name('BrandUpdate');
Route::post('/brand/delete/', [BrandController::class, 'delete'])->middleware(['auth'])->name('BrandDelete');

//=========================admin panel Supplier settings routes======================================
Route::get('/supplier/manage', [SupplierController::class, 'manage'])->middleware(['auth'])->name('SupplierManage');
Route::get('/supplier/create', [SupplierController::class, 'create'])->middleware(['auth'])->name('SupplierCreate');
Route::post('/supplier/store', [SupplierController::class, 'store'])->middleware(['auth'])->name('SupplierStore');
Route::get('/supplier/edit/{id}', [SupplierController::class, 'edit'])->middleware(['auth'])->name('SupplierEdit');
Route::post('/supplier/update', [SupplierController::class, 'update'])->middleware(['auth'])->name('SupplierUpdate');
Route::post('/supplier/delete/', [SupplierController::class, 'delete'])->middleware(['auth'])->name('SupplierDelete');

//=========================admin panel Customer settings routes======================================
Route::get('/customer/manage', [CustomerController::class, 'manage'])->middleware(['auth'])->name('CustomerManage');
Route::post('/customer/manage', [CustomerController::class, 'manage'])->middleware(['auth'])->name('CustomerManageSearch');
Route::get('/customer/create', [CustomerController::class, 'create'])->middleware(['auth'])->name('CustomerCreate');
Route::post('/customer/store', [CustomerController::class, 'store'])->middleware(['auth'])->name('CustomerStore');
Route::get('/customer/edit/{id}', [CustomerController::class, 'edit'])->middleware(['auth'])->name('CustomerEdit');
Route::post('/customer/update', [CustomerController::class, 'update'])->middleware(['auth'])->name('CustomerUpdate');
Route::post('/customer/delete/', [CustomerController::class, 'delete'])->middleware(['auth'])->name('CustomerDelete');

//=========================admin panel LookUp settings routes======================================
Route::get('/lookup/manage', [LookupController::class, 'manage'])->middleware(['auth'])->name('LookupManage');
Route::get('/lookup/create', [LookupController::class, 'create'])->middleware(['auth'])->name('LookupCreate');
Route::post('/lookup/store', [LookupController::class, 'store'])->middleware(['auth'])->name('LookupStore');
Route::get('/lookup/edit/{id}', [LookupController::class, 'edit'])->middleware(['auth'])->name('LookupEdit');
Route::post('/lookup/update', [LookupController::class, 'update'])->middleware(['auth'])->name('LookupUpdate');
Route::post('/lookup/delete/', [LookupController::class, 'delete'])->middleware(['auth'])->name('LookupDelete');

//=========================admin Employee settings routes======================================
// Route::get('/lookup/manage', [LookupController::class, 'manage'])->middleware(['auth'])->name('LookupManage');
// Route::get('/lookup/create', [LookupController::class, 'create'])->middleware(['auth'])->name('LookupCreate');
// Route::post('/lookup/store', [LookupController::class, 'store'])->middleware(['auth'])->name('LookupStore');
// Route::get('/lookup/edit/{id}', [LookupController::class, 'edit'])->middleware(['auth'])->name('LookupEdit');
// Route::post('/lookup/update', [LookupController::class, 'update'])->middleware(['auth'])->name('LookupUpdate');
// Route::post('/lookup/delete/', [LookupController::class, 'delete'])->middleware(['auth'])->name('LookupDelete');

//=========================admin SalesOrder settings routes======================================
Route::get('/sales-order/manage', [SalesOrderController::class, 'manage'])->middleware(['auth'])->name('SalesOrderManage');
Route::get('/sales-order/create', [SalesOrderController::class, 'create'])->middleware(['auth'])->name('SalesOrderCreate');
Route::post('/sales-order/store', [SalesOrderController::class, 'store'])->middleware(['auth'])->name('SalesOrderStore');
Route::get('/sales-order/edit/{id}', [SalesOrderController::class, 'edit'])->middleware(['auth'])->name('SalesOrderEdit');
Route::post('/sales-order/update', [SalesOrderController::class, 'update'])->middleware(['auth'])->name('SalesOrderUpdate');
Route::post('/sales-order/delete/', [SalesOrderController::class, 'delete'])->middleware(['auth'])->name('SalesOrderDelete');



require __DIR__.'/auth.php';
