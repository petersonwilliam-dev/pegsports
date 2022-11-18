<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
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

Route::get('/', [ProductController::class, 'index'])->name('index');

Route::get('/product/create', [ProductController::class, 'create'])->middleware('auth');
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::get('/addCart/{id}', [ProductController::class, 'addCart'])->middleware('auth');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->middleware('auth');
Route::post('/create', [ProductController::class, 'store']);
Route::put('/update', [ProductController::class, 'update']);
Route::delete('/destroy/{id}', [ProductController::class, 'destroy']);
Route::get('/login', [UserController::class, 'loginPage'])->name('login');
Route::get('/dashboard', [UserController::class, 'dashboard']);
Route::post('/log-in', [UserController::class, 'login'])->name('login.user');
Route::get('/logout', [UserController::class, 'authLogout']);
Route::get('/cart', [ProductController::class, 'userCart'])->middleware('auth');
Route::delete('/leave/{id}', [ProductController::class, 'leaveCart'])->middleware('auth');
Route::get('/search', [ProductController::class, 'search']);
/*Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
}); */
