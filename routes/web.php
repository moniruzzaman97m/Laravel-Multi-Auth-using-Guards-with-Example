<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//\Route::get('admin/dashboard', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');


Route::prefix('admin')->group(function(){

    Route::get('/login',[LoginController::class,'loginpage'])->name('admin.login');
    Route::post('/login',[LoginController::class,'logged'])->name('admin.logged');

    Route::middleware(['auth:admin'])->group(function(){
        Route::get('dashboard', [HomeController::class, 'adminHome'])->name('admin.home');


        
    });
});
