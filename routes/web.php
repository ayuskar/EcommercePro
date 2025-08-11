<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
//HomeController
Route::get('redirect', [HomeController::class, 'redirect']);
Route::get('/product/{id}', [HomeController::class, 'show'])->name('product.details');
Route::post('/add_cart/{id}', [HomeController::class, 'add_cart'])->name('add_cart');
Route::get('/cart', [HomeController::class, 'cart'])->name('cart')->middleware('auth');
Route::delete('/cart/remove/{id}', [HomeController::class, 'removeCartItem'])->name('cart.remove');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout')->middleware('auth');
Route::post('/place-order', [HomeController::class, 'placeOrder'])->name('place.order')->middleware('auth');
Route::get('/allproducts', [HomeController::class, 'allproducts'])->name('allproducts');
Route::get('/blogs', [HomeController::class, 'blogs'])->name('blogs');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/testimonial', [HomeController::class, 'testimonials'])->name('testimonials');

//Admin Controller
Route::get('/view_category', [AdminController::class, 'view_category']);
Route::post('/add_category', [AdminController::class, 'add_category'])->name('add_category');
Route::delete('/delete_category/{id}', [AdminController::class, 'delete_category'])->name('delete_category');
Route::get('/add_product', [AdminController::class, 'add_product_view'])->name('add_product_view');
Route::post('/add_product', [AdminController::class, 'add_product'])->name('add_product');
Route::get('/view_product', [AdminController::class, 'show_product'])->name('show_product');
Route::delete('/delete_product/{id}', [AdminController::class, 'delete_product'])->name('delete_product');
Route::get('/products/edit/{id}', [AdminController::class, 'edit_product'])->name('products.edit');
Route::post('/products/update/{id}', [AdminController::class, 'update_product'])->name('products.update');

