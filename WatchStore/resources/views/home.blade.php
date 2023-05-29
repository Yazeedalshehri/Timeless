@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Our Products</h1>

    <!-- Products listing -->
    <div class="row">
      @foreach ($products as $product)
        <div class="col-md-4 mb-3">
          <div class="card">
            <img src="{{ URL('images/'.$product->image) }}" class="card-img-top" alt="{{ $product->name }}" width="200px" height="500">
            <div class="card-body">
              <h5 class="card-title">{{ $product->name }}</h5>
              <p class="card-text">{{ $product->description }}</p>
              <h6 class="card-subtitle mb-2 text-muted">${{ $product->price }}</h6>
              <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <button type="submit"  class="btn btn-primary">Add to Cart</button>
            </form>
           
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection