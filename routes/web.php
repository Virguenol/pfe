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

Route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth','verified');

//categories
Route::get('/view_category', [AdminController::class, 'view_category'])->name('view_category');

Route::post('/add_category', [AdminController::class, 'add_category'])->name('add_category');

Route::get('/delete_category/{id}', [AdminController::class, 'delete_category'])->name('delete_category');

//produits
Route::get('/view_product', [AdminController::class, 'view_product'])->name('view_product');
Route::post('/add_product', [AdminController::class, 'add_product'])->name('add_product');
Route::get('/index_product', [AdminController::class, 'index_product'])->name('index_product');
Route::get('/delete_product/{id}', [AdminController::class, 'delete_product'])->name('delete_product');
Route::get('/update_product/{id}', [AdminController::class, 'update_product'])->name('update_product');
Route::post('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm'])->name('update_product_confirm');

//panier
Route::get('/product_details/{id}', [HomeController::class, 'product_details'])->name('product_details');
Route::post('/add_cart/{id}', [HomeController::class, 'add_cart'])->name('add_cart');
Route::get('/show_cart', [HomeController::class, 'show_cart'])->name('show_cart');
Route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart'])->name('remove_cart');

//commande
Route::get('/cash_order', [HomeController::class, 'cash_order'])->name('cash_order');
Route::get('/stripe/{totalprice}', [HomeController::class, 'stripe'])->name('stripe');

Route::post('stripe/{totalprice}',[HomeController::class, 'stripePost'])->name('stripe.post');



Route::get('/order', [AdminController::class, 'order'])->name('order');
Route::get('/delivered/{id}', [AdminController::class, 'delivered'])->name('delivered');
Route::get('/print_pdf/{id}', [AdminController::class, 'print_pdf'])->name('print_pdf');

Route::get('/send_email/{id}', [AdminController::class, 'send_email'])->name('send_email');
Route::post('/send_user_email/{id}', [AdminController::class, 'send_user_email'])->name('send_user_email');


//Ecommerce2022*/

