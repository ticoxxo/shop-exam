<?php

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

use App\Product;

Route::get('/', function () {
    $products = Product::latest()->paginate(5);

        return view('welcome',compact('products'))

            ->with('i', (request()->input('page', 1) - 1) * 5);
    // return view('welcome',compact('product'));
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/shopping-cart-add', function () { Cart::add(1, 'Macbook Pro', 2900, 1, array()); foreach (Cart::getContent() as $product){ echo "Id: $product->id</br>"; echo "Name: $product->name</br>"; echo "Price $product->price</br>"; echo "Quantity $product->quantity</br>"; }});

Route::group(['middleware' => ['auth']], function() {

    Route::resource('roles','RoleController');

    Route::resource('users','UserController');

    Route::resource('products','ProductController');

});