@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Checkout</h1>

    <div class="row">
        <div class="col-md-6">
            <h2>Customer Details</h2>

            <form action="{{ route('checkout.placeOrder') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" id="address" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" name="phone" id="phone" class="form-control" required>
                </div>
            </div>

        <div class="col-md-6">
            <h2>Payment Details</h2>

            <div class="mb-3">
                <label for="card-number" class="form-label">Card Number</label>
                <input type="text" name="card-number" id="card-number" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="expiry-date" class="form-label">Expiry Date</label>
                <input type="text" name="expiry-date" id="expiry-date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="cvv" class="form-label">CVV</label>
                <input type="text" name="cvv" id="cvv" class="form-control" required>
            </div>
        </div>
    </div>

    <h2>Order Summary</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cartItems as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['price'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>{{ $item['price'] * $item['quantity'] }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">Subtotal:</td>
                <td>${{ $subTotal }}</td>
            </tr>
            <tr>
                <td colspan="3">Shipping:</td>
                <td>${{ $shipping }}</td>
            </tr>
            <tr>
                <td colspan="3">Taxes:</td>
                <td>${{ $taxes }}</td>
            </tr>
            <tr>
                <td colspan="3">Total:</td>
                <td>${{ $total }}</td>
            </tr>
        </tfoot>
    </table>

    <button type="submit" class="btn btn-success btn-lg">Place Order</button>
    </form>
</div>
@endsection