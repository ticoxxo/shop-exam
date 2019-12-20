<?php
use App\Product;
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

Route::get('/', function () {
    $products = Product::latest()->paginate(5);

    return view('welcome', compact('products'))

    ->with('i', (request()->input('page', 1) - 1) * 5);

    //return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {

    Route::resource('roles','RoleController');

    Route::resource('users','UserController');

    Route::resource('products','ProductController');

    Route::post('/cart-add', 'CartController@add')->name('cart.add');
    
    Route::get('/cart-checkout', 'CartController@cart')->name('cart.checkout');
    
    Route::post('/cart-clear', 'CartController@clear')->name('cart.clear');
    
});