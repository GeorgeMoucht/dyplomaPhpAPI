<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->group(function () {
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('logout', [AuthController::class, 'logout']);
});

Route::middleware(['api', 'jwt'])->group(function () {
    // Allow authenticated user to create a new order
    Route::post('/orders', 'OrderController@create');

    // List a Customer's Order
    Route::get('/customers/{customer_id}/orders', 'OrderController@index');

    // View Order Details
    Route::get('/orders/{order_id}', 'OrderController@show');

    // Update Order Status
    Route::put('/orders/{order_id}', 'OrderController@update');

    // Delete an Order
    Route::delete('/orders/{order_id}', 'OrderController@destroy');

    // Add Product to Order
    Route::post('/orders/{order_id}/products', 'OrderDetailController@store');

    // Remove Product from Order
    Route::delete('/orders/{order_id}/products/{order_details_id', 'OrderDetailController@destroy');

    // List Products
    Route::get('/products', 'ProductController@index');
});
