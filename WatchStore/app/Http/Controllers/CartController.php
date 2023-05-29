<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    
    public function index()
    {
        return view('cart.index');
    }
  
    public function add($id)
    {
        $product = Product::find($id);
    
        if (!$product) {
            abort(404);
        }
    
        $cart = session()->get('cart');
    
        if (!$cart) {
            $cart = [
                $id => [
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => 1,
                ]
            ];
    
            session()->put('cart', $cart);
    
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
    
       /* if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
    
            session()->put('cart', $cart);
    
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        */
        $cart[$id] = [
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
        ];
    
        session()->put('cart', $cart);
    
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
}
