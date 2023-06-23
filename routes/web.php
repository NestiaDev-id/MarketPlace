<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Auth;
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

//* guest(?) =================================================================================
Route::get('/', [PublicController::class, 'index']);
Route::get('/detail/{slug}', [PublicController::class, 'detail']);

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginProcess']);

    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'registerProcess']);
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);

    // * admin =============================================================================================================
    Route::middleware('Admin-Only')->group(function () {
        Route::get('/dashboard', [ProductController::class, 'dashboard']);
        Route::get('/products', [ProductController::class, 'index']);
        Route::get('/products-add', [ProductController::class, 'addProduct']);
        Route::post('/products-add', [ProductController::class, 'addProductProcess']);
        Route::get('/products-edit/{slug}', [ProductController::class, 'editProduct']);
        Route::put('/products-edit/{slug}', [ProductController::class, 'editProcess']);
        Route::delete('/products-delete/{slug}', [ProductController::class, 'delete']);
        Route::get('/products-showDeleted', [ProductController::class, 'showDeleted']);
        Route::get('/products-restore/{slug}', [ProductController::class, 'restore']);
        Route::get('/products-deleteSlug/{slug}', [CategoryController::class, 'deleteSlug']);
        Route::get('/products-deleteAllSlug', [CategoryController::class, 'deleteAllSlug']);

        Route::get('/category', [CategoryController::class, 'index']);
        Route::get('/category-add', [CategoryController::class, 'addCategory']);
        Route::post('/category-add', [CategoryController::class, 'addCategoryProcess']);
        Route::get('/category-edit/{slug}', [CategoryController::class, 'editCategory']);
        Route::put('/category-edit/{slug}', [CategoryController::class, 'editProcess']);
        Route::delete('/category-delete/{slug}', [CategoryController::class, 'delete']);
        Route::get('/category-showDeleted', [CategoryController::class, 'showDeleted']);
        Route::get('/category-restore/{slug}', [CategoryController::class, 'restore']);
        Route::get('/category-deleteSlug/{slug}', [CategoryController::class, 'deleteSlug']);
        Route::get('/category-deleteAllSlug', [CategoryController::class, 'deleteAllSlug']);
    });

    // * users/customer ================================================================================================================
    Route::middleware('Customer-Only')->group(function () {
        Route::get('/cart', [CartController::class, 'index']);
        Route::post('/cart/{id}', [CartController::class, 'store2']);
        Route::get('/cart-checkout', [CartController::class, 'delete']);
    });
});
