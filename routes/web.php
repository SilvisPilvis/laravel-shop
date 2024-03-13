<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return redirect('/products', 302);
    // return view('welcome');
});
Route::get('/products', [ProductController::class, "index"])->name("");
Route::get('/products/create', [ProductController::class, "create"])->middleware("auth");
Route::post('/products', [ProductController::class, "store"])->middleware("auth");
Route::get('/products/{id}', [ProductController::class, "show"])->name("");
Route::get('/products/{id}/edit', [ProductController::class, "edit"])->name("");
Route::post("/products/{id}", [ProductController::class, "update"])->middleware("auth");
Route::delete('/products/{id}', [ProductController::class, "destroy"])->middleware("auth");
Route::get('/register', [UserController::class, "create"])->name("");
Route::post('/register', [UserController::class, "store"])->name("");
Route::get('/login', [UserController::class, "loginView"])->name("login");
Route::post('/login', [UserController::class, "login"])->name("");
Route::get('/logout', [UserController::class, "logout"])->middleware("auth")->name("logout");
