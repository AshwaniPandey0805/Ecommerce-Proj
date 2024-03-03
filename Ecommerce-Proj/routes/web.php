<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\web\AdminController as WebAdminController;
use App\Http\Controllers\web\AuthController;
use App\Http\Controllers\web\RoleController;
use App\Http\Controllers\web\VendorController as WebVendorController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/register',[AuthController::class,'getRegisterUser'])->name('getRegisterPage.get');
Route::post('/register', [AuthController::class,'postRegisterUsers'])->name('postRegister.post');


Route::get('/', [AuthController::class, 'getLogin'])->name('login.get');
Route::post('/login', [AuthController::class, 'postLogin'])->name('login.post');

Route::get('/admin-pannel', [AuthController::class,'getAdminPannel'])->name('getAdminPannel.get');
Route::any('/logout', [AuthController::class, 'logout'])->name('logout');


Route::any('/users', [WebAdminController::class, 'getUsers'])->name('getUsers.get');

Route::get('/add-roles',  [WebAdminController::class, 'addRoles'])->name('addRoles.get');
Route::any('/add-roles', [WebAdminController::class, 'addRolesPost'])->name('addRolesPost.Post');


// Define routes for update and delete actions
Route::get('/roles/{id}/update', 'RoleController@update')->name('updateRole');
Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('deleteRole');

Route::post('/user-details/{id}', [RoleController::class, 'viewRole'])->name('viewRole.get');


Route::any('/add-user', [WebAdminController::class, 'addUser'])->name('addUser.get');
Route::any('/add-user-role' , [WebAdminController::class, 'addUserPost'])->name('addUser.post');

Route::delete('/users/{user}', [WebAdminController::class, 'deleteUser'])->name('deleteUser');

// require __DIR__.'/auth.php';

// Vender Section

Route::get('/vendor-page', [WebVendorController::class, 'getVenderPage'])->name('getVenderPage.get');

Route::any('/add-product', [WebVendorController::class, 'addProduct'])->name('addProduct.get');

Route::any('/add-productDetails',[WebVendorController::class, 'addProductDetails'])->name('addProductDetails.get');
