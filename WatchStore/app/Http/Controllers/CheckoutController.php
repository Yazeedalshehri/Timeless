<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = session('cart', []);
    
        $subTotal = collect($cartItems)->sum(fn ($item) => $item['price'] * $item['quantity']);
        $shipping = 5;
        $taxes = $subTotal * 0.1;
        $total = $subTotal + $shipping + $taxes;
    
        return view('checkout.index', compact('cartItems', 'subTotal', 'shipping', 'taxes', 'total'));
    }

    public function placeOrder(Request $request)
{
    $cartItems = session('cart', []);

    $subTotal = collect($cartItems)->sum(fn ($item) => $item['price'] * $item['quantity']);
    $shipping = 5;
    $taxes = $subTotal * 0.1;
    $total = $subTotal + $shipping + $taxes;

    // Save the order to the database

    session()->forget('cart');

    return redirect()->route('thankyou');
}
}
