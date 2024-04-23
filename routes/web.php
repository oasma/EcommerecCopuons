<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;


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

// osama

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::get('/', FirstController::class . '@minpage')->middleware('customauth');

Route::get('/product/{catid?}', FirstController::class . '@product')->name('prods');

Route::get('/category', FirstController::class . '@all')->name('cats');

Route::get('/addproduct', ProductController::class . '@addproduct')->middleware('auth');
Route::get('/reviews', FirstController::class . '@reviews');
Route::post('/storereview', FirstController::class . '@storereview');


Route::post('/storeproduct', ProductController::class . '@storeproduct');
Route::get('/deleteproduct/{id?}', [ProductController::class, 'deleteproduct']);
Route::get('/editproduct/{id?}', [ProductController::class, 'editproduct']);
Route::get('/addproductimage/{id}', ProductController::class . '@addproductimage');
Route::get('/deleteproductimage/{id}', ProductController::class . '@deleteproductimage');
Route::post('/storeproductimage', ProductController::class . '@storeproductimage');
Route::post('/search', ProductController::class . '@search');

Route::get('/showproduct/{id}', ProductController::class . '@showproduct');

Route::get('/compleateorder', CartController::class . '@compleateorder')->middleware('auth');
Route::get('/previousorder', CartController::class . '@previousorder')->middleware('auth');
Route::post('/storeorder', CartController::class . '@storeorder');



Route::get('/producttable', ProductController::class . '@producttable');
Route::get('/cart', CartController::class . '@cart')->middleware('auth');

Route::get('removecartitem/{id?}', [CartController::class, 'removecartitem']);

Route::get('/addproducttocart/{product_id}', [CartController::class, 'addproducttocart'])->middleware('auth');





Route::post('/lang', function (Request $request) {
    //   if (in_array($locale, \Config::get('app.locales'))) {
    Session::put('locale', $request->locale);
    //     }
    return redirect()->back();
})->name('changeLanguage');





Route::get(
    '/admin',
    function () {
        return "admin panal";
    }

)->middleware('checkrole:admin');
