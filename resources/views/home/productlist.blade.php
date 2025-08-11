<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
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
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
          <!-- inner page section -->
      <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Product Grid</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->
      <!-- product section -->
      <!-- product section -->
<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>
        
        <!-- Check if products exist -->
        @if($products->count() > 0)
            <div class="row">
                <!-- Loop through each product -->
                @foreach($products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="box">
                            <div class="option_container">
                                <div class="options">
                                     <a href="{{ route('product.details', $product->id) }}" class="option1">Details</a>
                                     <form action="{{  url('add_cart', $product->id) }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="number" name="quantity" value="1" min="1" style="width:100px">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="submit" value="Add to Cart">
                                                </form></div></div>
                                </div>
                            </div>
                            <div class="img-box">
                                <!-- Display product image, default if none -->
                                <img src="{{ asset('product_images/'.$product->image) }}" 
                                     alt="{{ $product->title }}" 
                                     onerror="this.src='{{ asset('home/images/p1.png') }}'">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    {{ $product->title }} <!-- Display product title -->
                                </h5>
                                <h6 style="text-decoration: line-through; color:red">Rs. {{ $product->discount }}</h6>
                                <h6>
                                    Rs. {{ $product->price }} <!-- Display product price -->
                                </h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Display message if no products exist -->
            <p>No products available at this time.</p>
        @endif
        
        <!-- You can keep the rest of the code the same or modify as needed -->
    </div>
</section>
<!-- end product section -->

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