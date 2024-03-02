<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\web\AuthController;
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

Route::get('/register',[AuthController::class,'getRegisterUser'])->name('getRegisterPage.get');
Route::post('/register', [AuthController::class,'postRegisterUsers'])->name('postRegister.post');


Route::get('/login', [AuthController::class, 'getLogin'])->name('login.get');
Route::post('/login', [AuthController::class, 'postLogin'])->name('login.post');

Route::get('/admin-pannel', [AuthController::class,'getAdminPannel'])->name('getAdminPannel.get');
Route::any('/logout', [AuthController::class, 'logout'])->name('logout');


// require __DIR__.'/auth.php';
