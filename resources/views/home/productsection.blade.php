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
        
        <div class="btn-box">
            <a href="">
                View All products
            </a>
        </div>
    </div>
</section>
<!-- end product section -->
