<?php



use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\OrderItemsController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;

use Illuminate\Support\Facades\Route;


Route::prefix('/')->group(function () {
     Route::get('/', [HomeController::class, 'index'])->name('home');
     Route::get('/detaiproduct/{id}/{slug}', [HomeController::class, 'detaipro'])->name('detaiproduct');
     Route::get('/cart',[CartController::class, 'index'])->name('cart');
     Route::get('/addcart/{id}', [CartController::class, 'addToCart'])->name('addcart');
  
     Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
     Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');   
     Route::post('order', [OrderController::class, 'store'])->name('order.store'); 
     Route::get('/order/success', [HomeController::class, 'success'])->name('order.order_success'); 

    });
    // Route::get('/san-pham', [ProductController::class, 'index'])->name('products');
    // Route::get('/san-pham/{slug}', [ProductController::class, 'show'])->name('product.detail');

    // Route::post('/gio-hang/them/{id}', [CartController::class, 'add'])->name('cart.add');
    // Route::get('/gio-hang', [CartController::class, 'view'])->name('cart.view');
    // Route::post('/gio-hang/xoa/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('index');

    Route::resource('users', UsersController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('orders', OrdersController::class);
    Route::get('orderItems/customUpdate/{id}', [OrderItemsController::class, 'customUpdate'])->name('orderItems.customUpdate');
    Route::resource('orderItems', OrderItemsController::class);



});