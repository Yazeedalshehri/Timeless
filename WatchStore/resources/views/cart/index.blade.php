@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Cart</h1>
        @if(session('cart'))
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $subtotal = 0;
                    @endphp
                    @foreach(session('cart') as $id => $product)
                    @php
                    $total = $product['price'] * $product['quantity'];
                    $subtotal += $total;
                    @endphp
                    <tr>
                        <td>{{ $product['name'] }}</td>
                        <td>{{ $product['price'] }}</td>
                        <td>{{ $product['quantity'] }}</td>
                        <td>{{ $total }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-6">
                    <h3>Subtotal: ${{ $subtotal }}</h3>
                    <h3>Tax (15%): ${{ $subtotal * 0.15 }}</h3>
                    <h3>Shipping: $30.00</h3>
                    <h2>Total: ${{ $subtotal + ($subtotal * 0.15) + 30 }}</h2>
                </div>
            </div>
            <a href="{{ route('checkout') }}" class="btn btn-success float-right">Checkout</a>
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>
@endsection