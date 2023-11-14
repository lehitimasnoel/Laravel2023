<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RestaurantController;


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

Route::get('/', function () {
    return view('welcome');
});
Route::get('restaurant', [RestaurantController::class, 'showPage'])->name('restaurantPage');
Route::get('restaurant_menu/{name}/{category}', [RestaurantController::class, 'showMenu'])->name('restaurantMenu');


Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::get('register', [AuthController::class, 'register'])->name('registration');
    Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
    Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');




});

Route::group(['middleware' => ['auth','admin']], function () {

    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('show.dashboard');

    Route::get('/product_form', [ProductController::class, 'productForm'])->name('product.form');
    Route::post('/add_product', [ProductController::class, 'addProduct'])->name('add.product');
    Route::get('/show_edit_product/{id}', [ProductController::class, 'showEditProduct'])->name('show_edit.product');
    Route::put('/update_product/{id}', [ProductController::class, 'updateProduct'])->name('update.product');
    Route::delete('delete_product/{id}', [ProductController::class, 'deleteProduct'])->name('delete.product');

});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/product', [ProductController::class, 'showProduct'])->name('show.product');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('show.profile');
    Route::patch('/profile', [ProfileController::class, 'updateImage'])->name('edit.profile');
});



