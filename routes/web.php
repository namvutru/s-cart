<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WishListController;

use App\Http\Controllers\OrderDetailController;

use App\Http\Controllers\OrderController;

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
//     return view('home');
// });
Route::get('/', [IndexController::class, 'home'])->name('home');
Route::get('/detail/{slug}', [IndexController::class, 'detail'])->name('detail');

Route::get('/category', [IndexController::class, 'pagecategory'])->name('pagecategory');
Route::get('/category/{slug}', [IndexController::class, 'category'])->name('category');
Route::get('/products', [IndexController::class, 'products'])->name('products');
Route::get('/search', [IndexController::class, 'search'])->name('search');
Route::get('/cart',[IndexController::class, 'cart'])->name('cart');
Route::get('/wishlist',[IndexController::class, 'wishlist'])->name('wishlist');
Route::get('/checkout',[IndexController::class, 'checkout'])->name('checkout');

Route::get('/news',[IndexController::class, 'listnews'])->name('news');
Route::get('/news/{slug}',[IndexController::class, 'newsdetail'])->name('newsdetail');
Route::get('/newscategory',[IndexController::class, 'listnewscategory'])->name('listnewscategory');
Route::get('/newscategory/{slug}',[IndexController::class, 'newscategory'])->name('newscategory');

Route::get('/pagelogin',[IndexController::class, 'login'])->name('pagelogin');
Route::get('/pageregister',[IndexController::class, 'register'])->name('pageregister');
Route::get('/userinfo',[IndexController::class, 'userinfo'])->name('userinfo');
Route::post('/updateinfo',[IndexController::class, 'updateinfo'])->name('updateinfo');





Route::post('/updateItem',[OrderDetailController::class, 'update'])->name('updateItem');
Route::post('/deleteItem',[OrderDetailController::class, 'delete'])->name('deleteItem');


Route::post('/updateOrderInfo',[OrderController::class, 'update'])->name('updateOrderInfo');



Route::post('/addtoCart', [CartController::class, 'addtoCart'])->name('addtoCart');
Route::post('/updatetoCart', [CartController::class, 'updateToCart'])->name('updateToCart');
Route::get('/removeToCart/{rowid}', [CartController::class, 'removeToCart'])->name('removeToCart');
Route::post('/restorecart',[CartController::class, 'restorecart'])->name('restorecart');

Route::post('/addtoWishList', [WishListController::class, 'addtoWishList'])->name('addtoWishList');
Route::get('/removeToWishList/{rowid}', [WishListController::class, 'removeToWishList'])->name('removeToWishList');

Auth::routes();


Route::get('/sc-admin', [IndexController::class, 'admin'])->name('admin');








// Route::get('/home', [HomeController::class, 'index'])->name('home');


