@extends('home.layout') <!-- Assuming your base layout is in 'home/layout.blade.php' -->

@section('content')
    <div class="container">
        <h2>Checkout</h2>
        
        <div class="row">
            <div class="col-md-7">
                <h4>Billing Details</h4>
                <form method="POST" action="{{ route('place.order') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Place Order</button>
                </form>
            </div>
            <div class="col-md-5">
                <h4>Order Summary</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(Cart::where('user_id', Auth::id())->get() as $item)
                            <tr>
                                <td>{{ $item->product_title }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>Rs. {{ $item->totalprice }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2"><strong>Subtotal:</strong></td>
                            <td>Rs. {{ Cart::where('user_id', Auth::id())->sum('totalprice') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
