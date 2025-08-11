<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
           <base href='/public'>

      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="home/images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <style>
        .cart-item-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 10px;
        }
        
       .cart-table {
            margin-top: 20px;
        }
        
       .cart-table thead tr th {
            border-top: 0;
        }
        /* ----------------------------------------
   Cart Section
---------------------------------------- */
.container h2 {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 25px;
    color: #111;
    position: relative;
    text-align:center;
}


.container h2::after {
    content: '';
    display: block;
    width: 60px;
    height: 3px;
    background: linear-gradient(135deg, #2d89ff, #00d4ff);
    margin: 8px auto 0; /* Center underline */
    border-radius: 2px;
}


/* Alert Styling */
.alert {
    border-radius: 10px;
    padding: 12px 18px;
    font-size: 0.95rem;
}

/* Cart Table */
.table {
    background: rgba(255,255,255,0.95);
    backdrop-filter: blur(6px);
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 6px 18px rgba(0,0,0,0.05);
}
.table thead {
    background: linear-gradient(135deg, #2d89ff, #00d4ff);
    color: #fff;
}
.table thead th {
    padding: 14px;
    font-weight: 600;
    font-size: 1rem;
    border: none;
}
.table tbody tr {
    border-bottom: 1px solid #eee;
    transition: background 0.3s ease;
}
.table tbody tr:hover {
    background: rgba(45,137,255,0.04);
}
.table tbody td {
    vertical-align: middle;
    padding: 14px;
    font-size: 0.95rem;
}

/* Product Image in Cart */
.table tbody td img {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 8px;
    box-shadow: 0 3px 8px rgba(0,0,0,0.06);
    transition: transform 0.3s ease;
}
.table tbody td img:hover {
    transform: scale(1.05);
}

/* Remove Button */
.btn-danger.btn-sm {
    padding: 6px 12px;
    font-size: 0.85rem;
    border-radius: 6px;
    border: none;
    background: linear-gradient(135deg, #ff5f6d, #ff3d55);
    box-shadow: 0 3px 10px rgba(255,93,102,0.3);
    transition: all 0.3s ease;
}
.btn-danger.btn-sm:hover {
    background: linear-gradient(135deg, #e73d4d, #ff1e3c);
    transform: translateY(-1px);
}

/* Checkout Section */
.d-flex.justify-content-end {
    align-items: center;
    background: rgba(255,255,255,0.9);
    border-radius: 10px;
    padding: 12px 20px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.04);
}
.d-flex.justify-content-end p {
    font-size: 1rem;
    font-weight: 600;
    margin: 0;
}
.d-flex.justify-content-end .btn-primary {
    padding: 10px 18px;
    font-size: 0.95rem;
    font-weight: 600;
    border-radius: 8px;
    background: linear-gradient(135deg, #2d89ff, #00d4ff);
    border: none;
    color: #fff;
    box-shadow: 0 4px 12px rgba(45,137,255,0.3);
    transition: all 0.3s ease;
}
.d-flex.justify-content-end .btn-primary:hover {
    background: linear-gradient(135deg, #226dd8, #00b6e6);
    transform: translateY(-1px);
}

        </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
        <!-- Product Details Page -->
       
    <div class="container">
        <h2>Cart</h2>
          @if(session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
        @if(isset($error))
            <div class="alert alert-warning">
                {{ $error }}
            </div>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Product Title</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                        <tr>
                            <td><div class="d-flex align-items-center">
                                     <img src="{{ asset('product_images/'.$item->image) }}" 
                         alt="{{ $item->product_title }}" 
                         onerror="this.src='{{ asset('home/images/p1.png') }}'"
                         class="img-fluid">
                                    <span class="ml-3">{{ $item->product_title }}</span>
                                </div></td>
                            <td>Rs. {{ $item->price }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>Rs. {{ $item->totalprice }}</td>
                            <td>
                                <!-- Action Buttons: Edit, Remove, etc. -->
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
</form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end mt-3">
    <p><strong>Subtotal:</strong> Rs. {{ $subtotal }}</p>
    <a href="{{ route('checkout') }}" class="btn btn-primary ml-3">Proceed to Checkout</a>
</div>

        @endif
    </div>


      </div>
      <!-- why section -->
      

    
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
      
   </body>
</html>