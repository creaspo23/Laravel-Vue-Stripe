<?php

use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('checkout');
});
Route::post('/checkout', function (Request $request) {
    try {
        $charge = Stripe::charges()->create([
            'amount' => 40,
            'currency' => 'AED',
            'source' => $request->stripeToken,
            'description' => 'here we go',
            'receipt_email' => $request->email,
            'metadata' => [
                'data1' => 'metadata 1',
                'data2' => 'metadata 2',
                'data3' => 'metadata 3',
            ],
        ]);
        return redirect('/')->with('success_message', 'Thanks you ! Your payment has been accepted.');
    } catch (Exception $e) {
        //throw $th;
    }
});
