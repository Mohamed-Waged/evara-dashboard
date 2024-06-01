<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
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
    return view('welcome');
});



Route::prefix('dashboard')->group(function(){
    Route::middleware('admin')->group(function(){
        Route::get('/', [HomeController::class, 'index'])->name('admin.index');
        Route::resource('products', ProductController::class);
        Route::post('logout', [AuthController::class,'logout'])->name('admin.logout');
    });

    Route::get('login', [AuthController::class,'loginPage'])->name('admin.loginPage');
    Route::post('login-user', [AuthController::class,'login'])->name('admin.login_user');
    
    Route::get('register', [AuthController::class,'registerPage'])->name('admin.registerPage');
    Route::post('register-user', [AuthController::class,'register'])->name('admin.register_user');

});
