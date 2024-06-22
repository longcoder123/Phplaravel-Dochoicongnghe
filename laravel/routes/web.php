<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\LoginController;

//frontend
Route::get('/home', [FrontendController::class, 'index'])->name('home');
Route::get('/shop', [FrontendController::class, 'Shop'])->name('Shop');
Route::get('/shopdetail/{id}', [FrontendController::class, 'Shopdetail'])->name('Shopdetail');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');



// cart
Route::post('add-cart',[CartController::class,'add'])->name('cart.add');
Route::get('cart',[CartController::class,'index'])->name('cart.index');
Route::post('delete-cart',[CartController::class,'delete'])->name('cart.delete');


//login fe
Route::get('/loginTBS',[LoginController::class,'Login'])->name('login');

Route::post('/loginTBS',[LoginController::class,'postLogin']);
Route::get('/register',[LoginController::class,'register'])->name('register');
Route::post('/register',[LoginController::class,'postregister']);
Route::get('/logout',[LoginController::class,'logout'])->name('logout');



//Admin
Route::get('/admin', [AdminController::class, 'index'])->name('Admin');
//them sp admin
Route::get('/them-sp', [AdminController::class, 'addsp'])->name('themsp');
Route::post('/them-sp', [AdminController::class, 'store'])->name('storesp');
// sua sp admin
Route::get('/sua-sp/{id}', [AdminController::class, 'editsp'])->name('suasp');
Route::post('/update-sp/{id}', [AdminController::class, 'update'])->name('updatesp');
Route::get('/delete-sp/{id}', [AdminController::class, 'delete'])->name('deletesp');





//admin đơn hàng
Route::get('/donhang',[AdminController::class,'dhang'])->name('addonhang');
Route::post('/orders/update-status', [AdminController::class, 'updateStatus'])->name('orders.updateStatus');
Route::get('/orders/update-dondathang', [AdminController::class, 'updateddathang'])->name('orders.dondathang');
Route::delete('/orders/{id}', [AdminController::class, 'deleteOrder'])->name('orders.delete');

//admin chi tiết đơn hàng

Route::get('/ctdonhang/{orderId}', [AdminController::class, 'ctdhang'])->name('admin.ctdonhang');






// admin danh sách tài khoản người dùng
Route::get('/user',[AdminController::class,'user'])->name('user');
Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('users.delete');






// cart
Route::post('add-cart',[CartController::class,'add'])->name('cart.add');
Route::get('cart',[CartController::class,'index'])->name('cart.index');





//login admin
Route::prefix('admin')->middleware('admin')->group(function(){});




//checkout
Route::get('checkout',[CheckoutController::class,'checkout'])->name('oder.checkout');
Route::post('checkout',[CheckoutController::class,'post_checkout']);

