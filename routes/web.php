<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrderController;
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

Route::get('/',[PageController::class,'home']);
Route::get('about',[PageController::class,'about']);

;
Route::group(['prefix'=>'shop'],function () {
Route::get('/',[ShopController::class,'catagories']);
Route::get('/search',[ShopController::class,'searchProduct']);

Route::get('add-to-cart',[ShopController::class,'addToCart']);
Route::get('update-cart',[ShopController::class,'updateCart']);
Route::get('remove-item/{id}',[ShopController::class,'removeItem']);
Route::get('clear-cart',[ShopController::class,'clearCart']);
Route::get('checkout',[ShopController::class,'checkOut']);
Route::get('order',[ShopController::class,'Order']);
Route::get('{cat_url}',[ShopController::class,'products']);
Route::get('{cat_url}/{item_url}',[ShopController::class,'item']);

});
Route::group(['prefix'=>'user'],function () {
    Route::get('signin',[UserController::class,'getSignIn']);
    Route::post('signin',[UserController::class,'postSignIn']);
    Route::get('signup',[UserController::class,'getSignUp']);
    Route::post('signup',[UserController::class,'postSignUp']);
    Route::get('logout',[UserController::class,'logOut']);
});
Route::group(['prefix'=>'cms','middleware' => 'adminpanel'],function () {
    Route::get('dashborad',[CmsController::class,'dashborad']);
    Route::resource('menus', MenuController::class);
    Route::resource('contents', ContentController::class);
    Route::resource('catagories', CategoriesController::class);
    Route::resource('products', ProductsController::class);
    Route::resource('admin/users', AdminController::class);
    Route::get('orders', [OrderController::class,'ShowOrders'])

    ;
});
Route::get('{url}',[PageController::class,'content']);
