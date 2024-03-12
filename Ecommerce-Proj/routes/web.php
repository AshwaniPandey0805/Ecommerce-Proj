<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StripePaymentController as ControllersStripePaymentController;
use App\Http\Controllers\web\StripePaymentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\web\AdminController as WebAdminController;
use App\Http\Controllers\web\AuthController;
use App\Http\Controllers\web\ProductManagerController;
use App\Http\Controllers\web\RoleController;
use App\Http\Controllers\web\VendorController as WebVendorController;
use App\Models\ProductCategory;
use App\Models\ProductTable;
use App\Models\User;
use Illuminate\Support\Facades\Route;



/**
 * Register Route
 */
Route::get('/register',[AuthController::class,'getRegisterUser'])->name('getRegisterPage.get');
Route::post('/register', [AuthController::class,'postRegisterUsers'])->name('postRegister.post');

/**
 * Login Route
 */
Route::get('/', [AuthController::class, 'getLogin'])->name('login.get');
Route::post('/login', [AuthController::class, 'postLogin'])->name('login.post');

/**
 * adding middleware to for admin portal (Auth Middleware)
 */

 Route::middleware([ 'auth' ,'authUser'])->group(function(){

    /**
     * Admin Portal  :  Route to get admin pannel dashboard
     */
    Route::get('/admin-pannel', [AuthController::class,'getAdminPannel'])->name('getAdminPannel.get');

    /**
     * Admin Portal : Route to get all users list in usertable 
     */
    Route::any('/users', [WebAdminController::class, 'getUsers'])->name('getUsers.get');

    /**
     * Admin Portal : Route to add roles in database
     */
    Route::get('/add-roles',  [WebAdminController::class, 'addRoles'])->name('addRoles.get');

    /**
     * Admin Portal : Route -> admin can add roles and permission
     */
    Route::any('/add-roles', [WebAdminController::class, 'addRolesPost'])->name('addRolesPost.Post');

    /**
     * Admin portal : ______
     */
    Route::get('/roles/{id}/update', 'RoleController@update')->name('updateRole');

    /**
     * Admin Portal : _________
     */
    Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('deleteRole');

    /**
     * Admin Portal : Route to view role of selected user based on there id 
     */
    Route::post('/user-details/{id}', [RoleController::class, 'viewRole'])->name('viewRole.get');

    /**
     * Admin Portal
     */
    Route::any('/add-user', [WebAdminController::class, 'addUser'])->name('addUser.get');

    /**
     * Admin Portal
     */
    Route::any('/add-user-role' , [WebAdminController::class, 'addUserPost'])->name('addUser.post');

    /**
     * Admin Portal : Route to delete row
     */
    Route::delete('/users/{user}', [WebAdminController::class, 'deleteUser'])->name('deleteUser');

    /**
     * Admin Portal : Route to update user detail
     */
    Route::any('/update/{userID}', [WebAdminController::class, 'updateUserDetail'])->name('updateUser.post');


 })->middleware('authCheck');




/**
 * Vendor Routes
 */

/**
 * Vendor Route Middleware
 */

 Route::middleware(['auth', 'authVendor'])->group(function(){
    /**
     * Vendor Portal : Route to show vendor dash board
     */
    Route::get('/vendor-page', [WebVendorController::class, 'getVenderPage'])->name('getVenderPage.get');

    /**
     *  Vendor Portal : Route to add product
     */
    Route::any('/add-product', [WebVendorController::class, 'addProduct'])->name('addProduct.get');

    /**
     * Vendor Portal : Route to add product details
     */
    Route::any('/add-productDetails',[WebVendorController::class, 'addProductDetails'])->name('addProductDetails.post');

    /**
     * Vendor Portal : Route to add category
     */
    Route::post('/add-Category', [WebVendorController::class,'storeCategory'])->name('addCategory.post');

    /**
     * Vendor Portal : Route to add product details
     */
    Route::any('/add-product-details', [WebVendorController::class, 'addProductItem'])->name('addProuctItem.post');

    /**
     * Vendor Portal : Route to get subcategory of selected category based on there category id
     */
    Route::any('/get-subCategory', [WebVendorController::class, 'getSubCategory'])->name('getSubCategory.post');

    /**
     * Vendor Portal : Route to get category id  based on the selected subcategory
     */
    Route::any('/get-category-id', [WebVendorController::class, 'getCategoryID'])->name('getCategoryID.post');

    /**
     * product Manager Route
     */
    Route::get('/product-manager', [ProductManagerController::class, 'getProductPannel'])->name('getProducts.get');


    /**
     * add product to DB
     */
    Route::any('/add-product-db', [ProductManagerController::class, 'addProductToDB'])->name('addProductsToDB.post');

    /**
     * get product list pannel
     */
    Route::get('/get-product-list', [ProductManagerController::class, 'getProductList'])->name('getProductList.get');

    /**
     * view Product detils and photo
     */

    Route::any('/get-product-image/{id}',[ProductManagerController::class, 'getProductView'])->name('getProductView.post');
 });


/**
 * User Routes
 */

 /**
  * User Portal : Route to handle auth middleware for User protal
  */
  Route::group(['middleware'=>'auth'], function(){

    /**
     * User Portal : Route to get user dashboard
     */
    Route::any('/user-dashboard', [UserController::class, 'getUserDashBoard'])->name('getUserDashBaord.get');

    /**
     * get cart product
     */
    Route::any('/cart-product', [UserController::class, 'getCartProduct'])->name('getCartProduct.get');

    /**
     * User Portal : Route to add to card method
     */
    Route::any('/add-to-cart/{id}', [UserController::class, 'addToCartItem'])->name('addToCartItem.post');

    /**
     * User Portal : Route to handle increment and decrement of card prduct quantity
     */
    Route::any('/handleQuantity/{product_id}/{type}',[UserController::class,'handleQuantity'])->name('handleQuantity');

    /**
     * 
     */
    Route::delete('/remove-from-cart/{product_id}', [UserController::class, 'removeFromCart'])->name('removeFromCart');

    /**
     * User Portal : Route to Place order
     */
    Route::any('/place-order/{userID}', [UserController::class, 'placeOrder'])->name('placeOrder.post');

    /**
     * User Portal : Route to proceed to paymant 
     * 
     */
    Route::any('/payment', [UserController::class, 'proceedToPayment'])->name('proceedToPayment.post');


    /**
     * User Portal : Payment GateWay Route
     */
    
  

  });

//   Route::controller(ControllersStripePaymentController::class)->group(function(){
//    Route::get('stripe', 'stripe');
//    Route::post('stripe', 'stripePost')->name('stripe.post');
// });





/**
 * Admin : logout Route
 */
Route::any('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/checkOut', [StripePaymentController::class, 'checkout']);
Route::post('/checkOut-post', [StripePaymentController::class, 'checkout'])->name('checkout.post');
Route::post('/success', [StripePaymentController::class, 'success'])->name('seccess.post');
Route::post('/cancel', [StripePaymentController::class, 'cancel'])->name('cancel.post');


/**
 * demo route
 */
Route::get('/check', [AuthController::class, 'checkLoginDetails']);






