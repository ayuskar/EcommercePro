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
       

/* ----------------------------------------
   Product Details Section
---------------------------------------- */
.product_details {
    padding: 80px 0;
}

.product_image_gallery {
    position: relative;
    overflow: hidden;
    border-radius: 18px;
    backdrop-filter: blur(8px);
}
.product_image_gallery img {
    width: 100%;
    display: block;
    transition: transform 0.6s cubic-bezier(.19,1,.22,1);
}
.product_image_gallery:hover img {
    transform: scale(1.08);
}

.product_info {
    padding: 35px;
    border-radius: 18px;
    backdrop-filter: blur(10px);
}
.product_info h2 {
    font-size: 2.4rem;
    font-weight: 700;
    margin-bottom: 15px;
    color: #111;
}

.rating {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 1rem;
    margin-bottom: 15px;
}
.rating i {
    color: #ffb400;
}
.rating span {
    color: #666;
}

.price {
    font-size: 1.9rem;
    font-weight: 700;
    background: linear-gradient(135deg, #2d89ff, #00d4ff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 18px;
}

.product_info p {
    margin-bottom: 12px;
    font-size: 1rem;
    color: #444;
}

.description {
    margin-top: 10px;
    line-height: 1.7;
    font-size: 1.05rem;
    color: #555;
}

.product_actions .btn {
    padding: 14px 28px;
    font-size: 1.1rem;
    font-weight: 600;
    border-radius: 10px;
    background: linear-gradient(135deg, #2d89ff, #00d4ff);
    border: none;
    color: #fff;
    box-shadow: 0 6px 15px rgba(45,137,255,0.3);
    transition: all 0.3s ease;
}
.product_actions .btn:hover {
    background: linear-gradient(135deg, #226dd8, #00b6e6);
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(45,137,255,0.4);
}

/* ----------------------------------------
   Related Products Section
---------------------------------------- */
.related_products h2 {
    font-size: 2rem;
    font-weight: 700;
    text-align: center;
    margin-bottom: 50px;
    color: #111;
    position: relative;
}
.related_products h2::after {
    content: '';
    display: block;
    width: 70px;
    height: 3px;
    background: linear-gradient(135deg, #2d89ff, #00d4ff);
    margin: 12px auto 0;
    border-radius: 3px;
}

.related_product_card {
    background: rgba(255,255,255,0.9);
    backdrop-filter: blur(6px);
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(0,0,0,0.05);
    text-align: center;
    transform: translateY(0);
    transition: transform 0.4s ease, box-shadow 0.4s ease;
}
.related_product_card:hover {
    transform: translateY(-8px);
    box-shadow: 0 14px 28px rgba(0,0,0,0.08);
}

.related_product_card img {
    width: 100%;
    height: 240px;
    object-fit: cover;
    transition: transform 0.6s cubic-bezier(.19,1,.22,1);
}
.related_product_card:hover img {
    transform: scale(1.06);
}

.related_product_card h5 {
    font-size: 1.15rem;
    font-weight: 600;
    margin: 15px 0 5px;
    color: #222;
}

.related_product_card .price {
    font-size: 1.05rem;
    font-weight: 600;
    background: linear-gradient(135deg, #2d89ff, #00d4ff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 15px;
}

.related_product_card .btn {
    margin-bottom: 18px;
    padding: 8px 16px;
    font-size: 0.95rem;
    font-weight: 500;
    border-radius: 8px;
    background: transparent;
    border: 2px solid #2d89ff;
    color: #2d89ff;
}
.related_product_card .btn:hover {
    background: #2d89ff;
    color: #fff;
    transform: scale(1.05);
}
/* ----------------------------------------
   Quantity Input & Total Price
---------------------------------------- */
.quantity-total {
    display: flex;
    align-items: center;
    gap: 15px;
    margin: 20px 0;
    padding: 12px 18px;
    background: rgba(255, 255, 255, 0.85);
    border-radius: 12px;
    border: 1px solid #e5e5e5;
    box-shadow: 0 4px 12px rgba(0,0,0,0.04);
}

.quantity-total input[type="number"] {
    width: 80px;
    padding: 8px 10px;
    font-size: 1rem;
    font-weight: 500;
    text-align: center;
    border: 1px solid #ccc;
    border-radius: 8px;
    outline: none;
    transition: border 0.3s ease, box-shadow 0.3s ease;
}
.quantity-total input[type="number"]:focus {
    border-color: #2d89ff;
    box-shadow: 0 0 0 3px rgba(45,137,255,0.15);
}

#totalPrice {
    font-size: 1.05rem;
    font-weight: 600;
    color: #333;
    background: #f8f9fc;
    padding: 6px 12px;
    border-radius: 6px;
}

/* ----------------------------------------
   Add to Cart Button (Form)
---------------------------------------- */
form[action*="add_cart"] {
    margin-top: 15px;
}

form[action*="add_cart"] button {
    display: inline-block;
    width: 100%;
    padding: 14px 25px;
    font-size: 1.1rem;
    font-weight: 600;
    border-radius: 10px;
    background: linear-gradient(135deg, #2d89ff, #00d4ff);
    border: none;
    color: #fff;
    box-shadow: 0 6px 15px rgba(45,137,255,0.3);
    transition: all 0.3s ease;
}
form[action*="add_cart"] button:hover {
    background: linear-gradient(135deg, #226dd8, #00b6e6);
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(45,137,255,0.4);
}
form[action*="add_cart"] button:active {
    transform: scale(0.98);
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



<!-- Product Details Section -->
<section class="product_details">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <!-- Product Image Gallery (Single Image for Now) -->
                <div class="product_image_gallery">
                    <img src="{{ asset('product_images/'.$product->image) }}" 
                         alt="{{ $product->title }}" 
                         onerror="this.src='{{ asset('home/images/p1.png') }}'"
                         class="img-fluid">
                </div>
            </div>
            <div class="col-md-7">
                <!-- Product Information -->
                <div class="product_info">
                    <h2>{{ $product->title }}</h2>
                    <div class="rating">
                        <!-- Add Rating System Here (e.g., 5 Stars) -->
                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
                        <span> (20 Reviews)</span>
                    </div>
<p  style="color:red; text-decoration: line-through;" class="">
    <strong style="color:red;">Price:</strong>
    <span style="color:red; font-weight: bold;">
        Rs. {{ $product->discount }} <!-- This is the discounted price -->
    </span>
</p>
                    <p class="price"><strong>Price:</strong> <span class="text-primary">Rs. {{ $product->price }}</span></p>
                    <p><strong>Category:</strong> {{ $product->category }}</p>
                    <p><strong>Quantity:</strong> {{ $product->quantity }} in Stock</p>
                    <p><strong>Description:</strong></p>
                    <p class="description">{{ $product->description }}</p>
                    
                    <!-- Quantity Input and Total Price Display -->
    <div class="quantity-total">
        <input type="number" id="quantity" value="1" min="1" max="{{ $product->quantity }}">
        <span id="totalPrice">Total Price: Rs. {{ $product->price }}</span>
    </div>
    
    <!-- Call to Action Button with Form for Adding to Cart -->
    <form action="{{ route('add_cart', $product->id) }}" method="POST">
        @csrf
        <input type="hidden" id="product_id" name="product_id" value="{{ $product->id }}">
        <input type="hidden" id="quantity" name="quantity" value="1">
        <input type="hidden" id="totalprice" name="totalprice" value="{{ $product->price }}">
        <button type="submit" class="btn btn-primary btn-block" onclick="updateQuantity()">Add to Cart</button>
    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Related Products Section -->
<section class="related_products">
    <div class="container">
        <h2>Related Products</h2>
        <div class="row">
            @if(count($relatedProducts) > 0)
                @foreach($relatedProducts as $relatedProduct)
                    <div class="col-md-3">
                        <div class="related_product_card">
                            <img src="{{ asset('product_images/'.$relatedProduct->image) }}" alt="" class="img-fluid">
                            <h5>{{ $relatedProduct->title }}</h5>
                            <p class="price">${{ $relatedProduct->price }}</p>
                            <a href="/fullproducts" class="btn btn-outline-primary btn-block">View Product</a>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-12 text-center">
                    <h4>No Related Products Available at the Moment</h4>
                    <p>Check back later for new arrivals or explore our <a href="#">catalog</a> for similar products.</p>
                </div>
            @endif
        </div>
    </div>
</section>

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
       <script>
        // Update Total Price based on Quantity Input
        const quantityInput = document.getElementById('quantity');
        const totalPriceSpan = document.getElementById('totalPrice');
        const hiddenQuantityInput = document.querySelector('input[name="quantity"]');
        const hiddenTotalPriceInput = document.querySelector('input[name="totalprice"]');

        quantityInput.addEventListener('input', updateTotalPrice);

        function updateTotalPrice() {
            const quantity = quantityInput.value;
            const price = {{ $product->price }};
            const totalPrice = quantity * price;
            totalPriceSpan.innerText = `Total Price: Rs. ${totalPrice}`;
            hiddenQuantityInput.value = quantity;
            hiddenTotalPriceInput.value = totalPrice;
        }

        // Update Hidden Inputs before Submitting
        function updateQuantity() {
            updateTotalPrice();
        }
    </script>
   </body>
</html>