<?php

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Frontend\VendorController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Frontend\CartController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[FrontendController::class,'index']);

//adminController route

Route::get('/admin/login',[AdminController::class,'adminLoginForm']);
Route::post('/admin/login/form',[AdminController::class,'adminLoginSubmit']);
Route::get('/admin/dashboard',[AdminController::class,'adminDashboard']);
Route::get('/admin/logout',[AdminController::class,'adminLogout']);

//cartcontroller Route

Route::post('/add/to/cart',[CartController::class,'addToCart']);
Route::get('/checkout',[CartController::class,'checkout']);
Route::post('/cart/product/update/{id}',[CartController::class,'cartProductUpdate']);
Route::get('/cart/product/delete/{id}',[CartController::class,'cartProductDelete']);
Route::post('/customer/details/for-order',[CartController::class,'orderComplete']);

//userController Route

Route::get('/user/register',[FrontendController::class,'userRegistration']);
// Route::get('/user/login',[FrontendController::class,'userLoginform']);
// Route::post('/user/login',[VendorController::class,'userLogin']);
Route::get('/user/logout',[FrontendController::class,'userLogout']);
Route::post('/user/registration',[FrontendController::class,'userRegister']);
Route::get('/product/details/{id}',[FrontendController::class,'productDetails']);
Route::post('/review/store',[FrontendController::class,'customerReview']);

//catgoryController route

Route::get('/category/create',[CategoryController::class,'categoryCreate']);
Route::post('/category/store',[CategoryController::class,'categoryStore']);
Route::get('/category/manage',[CategoryController::class,'categoryManage']);
Route::get('/category/edit/{id}',[CategoryController::class,'categoryEdit']);
Route::post('/category/update/{id}',[CategoryController::class,'categoryUpdate']);
Route::get('/category/delete/{id}',[CategoryController::class,'categoryDelete']);

//subcategoryController Route

Route::get('/subcategory/create',[SubCategoryController::class,'subcategoryCreate']);
Route::get('/subcategory/manage',[SubCategoryController::class,'subcategoryManage']);
Route::post('/subcategory/store',[SubCategoryController::class,'subcategoryStore']);
Route::get('/subcategory/edit/{id}',[SubCategoryController::class,'subcategoryEdit']);
Route::get('/subcategory/delete/{id}',[SubCategoryController::class,'subcategoryDelete']);
Route::post('/subcategory/update/{id}',[SubCategoryController::class,'subcategoryUpdate']);

//brandControlller Route

Route::get('/brand/create',[BrandController::class,'brandCreate']);
Route::get('/brand/manage',[BrandController::class,'brandManage']);
Route::post('/brand/store',[BrandController::class,'brandStore']);
Route::get('/brand/edit/{id}',[BrandController::class,'brandEdit']);
Route::get('/brand/delete/{id}',[BrandController::class,'brandDelete']);
Route::post('/brand/update/{id}',[BrandController::class,'brandUpdate']);

//colorController Route

Route::get('/color/create',[ColorController::class,'colorCreate']);
Route::post('/color/store',[ColorController::class,'colorStore']);
Route::get('/color/manage',[ColorController::class,'colorManage']);
Route::get('/color/delete/{id}',[ColorController::class,'colorDelete']);
Route::get('/color/edit/{id}',[ColorController::class,'colorEdit']);
Route::post('/color/update/{id}',[ColorController::class,'colorUpdate']);

//sizeController Route

Route::get('/size/create',[SizeController::class,'sizeCreate']);
Route::post('/size/store',[SizeController::class,'sizeStore']);
Route::get('/size/manage',[SizeController::class,'sizeManage']);
Route::get('/size/delete/{id}',[SizeController::class,'sizeDelete']);
Route::get('/size/edit/{id}',[SizeController::class,'sizeEdit']);
Route::post('/size/update/{id}',[SizeController::class,'sizeUpdate']);

//vendorController Route

Route::get('/vendor/register',[VendorController::class,'vendorRegister']);
Route::post('/vendor/registration',[VendorController::class,'vendorRegistration']);
Route::get('/vendor/login',[VendorController::class,'vendorLoginForm']);
Route::post('/vendor/login',[VendorController::class,'vendorLogin']);
Route::get('/vendor/logout',[VendorController::class,'vendorLogout']);
Route::get('/vendor/dashboard',[VendorController::class,'vendorDashboard']);
Route::get('/vendor/product/create',[VendorController::class,'vendorProductCreateFrom']);
Route::post('/vendor/product/store',[VendorController::class,'vendorProductStore']);
Route::get('/vendor/products/delete/{id}',[VendorController::class,'vendorProductsDelete']);
Route::get('/vendor/products/edit/{id}',[VendorController::class,'vendorProductsEdit']);
Route::post('/vendor/product/update/{id}',[VendorController::class,'vendorProductsUpdate']);


//supplierController Route

Route::get('/vendors',[SupplierController::class,'vendors']);
Route::get('/admin/vendor/approve/{id}',[SupplierController::class,'vendorApprove']);
Route::get('/admin/vendor/pending/{id}',[SupplierController::class,'vendorPending']);
Route::get('/admin/vendor/delete/{id}',[SupplierController::class,'vendorDelete']);

//vendor Products Route
Route::get('/vendor/products',[SupplierController::class,'vendorProducts']);
Route::get('/vendor/product/approve/{id}',[SupplierController::class,'vendorProductApprove']);
Route::get('/vendor/product/pending/{id}',[SupplierController::class,'vendorProductPending']);
Route::get('/vendor/product/delete/{id}',[SupplierController::class,'vendorProductDelete']);
Route::get('/vendor/orders',[SupplierController::class,'vendorOrders']);
Route::get('/vendor/pending/product',[SupplierController::class,'vendorPendingProduct']);
Route::get('/vendor/aproved/product',[SupplierController::class,'vendorApprovedProduct']);

//orderController route

Route::get('/orders',[OrderController::class,'customerOrders']);

//auth
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

