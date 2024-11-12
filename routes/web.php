<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
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

Route::get('/', [UserController::class, 'index'])->name('homepage');

Route::prefix('user')->group(function () {


    //luồng đặt hàng------------------------------------------------------------------------------------------------------------------------------
    Route::get('/product_detail/{id}', [UserController::class, 'product_detail'])->name('user.product_detail');
    Route::get('/cart', [UserController::class, 'cart'])->name('user.cart');
    Route::post('/post_cart', [UserController::class, 'post_cart'])->name('user.post_cart');
    Route::get('/delete_cart/{id}', [UserController::class, 'delete_cart'])->name('user.delete_cart');
    Route::get('/address', [UserController::class, 'address'])->name('user.address');
    Route::get('/delete_address/{id}', [UserController::class, 'delete_address'])->name('user.delete_address');
    Route::post('/post_address', [UserController::class, 'post_address'])->name('user.post_address');
    Route::get('/payment_method', [UserController::class, 'payment_method'])->name('user.payment_method');
    Route::post('/post_payment_method', [UserController::class, 'post_payment_method'])->name('user.post_payment_method');
    Route::get('/billing_details', [UserController::class, 'billing_details'])->name('user.billing_details');
    Route::post('/post_billing_details', [UserController::class, 'post_billing_details'])->name('user.post_billing_details');
    Route::post('/payment_success', [UserController::class, 'payment_success'])->name('user.payment_success');


    //luồng đăng nhập đăng kí------------------------------------------------------------------------------------------------------------------------------
    Route::get('/login', [UserController::class, 'login'])->name('user.login');
    Route::get('/regiser', [UserController::class, 'regiser'])->name('user.regiser');
    Route::get('/reset_password', [UserController::class, 'reset_password'])->name('user.reset_password');
    Route::post('/post_regiser', [UserController::class, 'post_regiser'])->name('user.post_regiser');
    Route::post('/post_login', [UserController::class, 'post_login'])->name('user.post_login');
    Route::post('/post_reset_password', [UserController::class, 'post_reset_password'])->name('user.post_reset_password');


    //luồng khác------------------------------------------------------------------------------------------------------------------------------
    Route::get('/account_profile', [UserController::class, 'account_profile'])->name('user.account_profile');
    Route::get('/account_orders', [UserController::class, 'account_orders'])->name('user.account_orders');
    Route::get('/account_dashboard', [UserController::class, 'account_dashboard'])->name('user.account_dashboard');
    Route::get('/account_saved_address', [UserController::class, 'account_saved_address'])->name('user.account_saved_address');
    Route::get('/account_edit_profile', [UserController::class, 'account_edit_profile'])->name('user.account_edit_profile');
    Route::get('/search', [UserController::class, 'search'])->name('user.search');
    Route::get('/shop_grid_type_5', [UserController::class, 'shop_grid_type_5'])->name('user.shop_grid_type_5');
    Route::get('/shop_grid', [UserController::class, 'shop_grid'])->name('user.shop_grid');
    Route::get('/wishlist', [UserController::class, 'wishlist'])->name('user.wishlist');
    Route::post('/post_wishlist/{id}', [UserController::class, 'post_wishlist'])->name('user.post_wishlist');
    Route::post('/post_comment/{id}', [UserController::class, 'post_comment'])->name('user.post_comment');

});

Route::prefix('admin')->middleware('admin.role')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    //category------------------------------------------------------------------------------------------------------------------------------
    Route::get('/category', [AdminController::class, 'category'])->name('admin.category');
    Route::get('/delete_category/{id}', [AdminController::class, 'delete_category'])->name('admin.delete_category');
    Route::get('/backup_category/{id}', [AdminController::class, 'backup_category'])->name('admin.backup_category');
    Route::get('/edit_category/{id}', [AdminController::class, 'edit_category'])->name('admin.edit_category');
    Route::put('/put_edit_category/{id}', [AdminController::class, 'put_edit_category'])->name('admin.put_edit_category');


    //Product------------------------------------------------------------------------------------------------------------------------------
    Route::get('/product', [AdminController::class, 'product'])->name('admin.product');
    Route::get('/delete_product/{id}', [AdminController::class, 'delete_product'])->name('admin.delete_product');
    Route::get('/add_product', [AdminController::class, 'add_product'])->name('admin.add_product');
    Route::post('/post_add_product', [AdminController::class, 'post_add_product'])->name('admin.post_add_product');
    Route::get('/backup_product/{id}', [AdminController::class, 'backup_product'])->name('admin.backup_product');
    Route::get('/edit_product/{id}', [AdminController::class, 'edit_product'])->name('admin.edit_product');
    Route::put('/put_edit_product/{id}', [AdminController::class, 'put_edit_product'])->name('admin.put_edit_product');
    // Route::post('/post_edit_product/{id}', [AdminController::class, 'post_edit_product'])->name('admin.post_edit_product');

    //Order------------------------------------------------------------------------------------------------------------------------------
    Route::get('/order', [AdminController::class, 'order'])->name('admin.order');
    Route::put('/update_order', [AdminController::class, 'update_order'])->name('admin.update_order');

    //Order_details------------------------------------------------------------------------------------------------------------------------------
    Route::get('/order_detail/{id}', [AdminController::class, 'order_detail'])->name('admin.order_detail');


    //account------------------------------------------------------------------------------------------------------------------------------
    Route::get('/account', [AdminController::class, 'account'])->name('admin.account');
    Route::get('/delete_account/{id}', [AdminController::class, 'delete_account'])->name('admin.delete_account');
    Route::get('/backup_account/{id}', [AdminController::class, 'backup_account'])->name('admin.backup_account');
    Route::get('/edit_account/{id}', [AdminController::class, 'edit_account'])->name('admin.edit_account');
    Route::put('/put_edit_account/{id}', [AdminController::class, 'put_edit_account'])->name('admin.put_edit_account');

});





