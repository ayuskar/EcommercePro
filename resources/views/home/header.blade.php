
         <!-- header section strats -->
         <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="/"><img width="250" src="home/images/logo.png" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item dropdown {{ Request::is('about') || Request::is('testimonial') ? 'active' : '' }}">
    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> 
        <span class="nav-label">Pages <span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li><a href="/about">About</a></li>
        <li><a href="/testimonial">Testimonial</a></li>
    </ul>
</li>
<li class="nav-item {{ Request::is('product*') ? 'active' : '' }}">
    <a class="nav-link" href="/allproducts">Products</a>
</li>
<li class="nav-item {{ Request::is('blogs') ? 'active' : '' }}">
    <a class="nav-link" href="/blogs">Blog</a>
</li>
<li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
    <a class="nav-link" href="/contact">Contact</a>
</li>
<style>
   .cart-link {
    position: relative;
    transition: color 0.2s ease; /* Add a smooth transition */
}

.cart-link:hover {
    color: #007bff; /* Bootstrap's primary color on hover */
}

.cart-link:hover .badge {
    background-color: #0056b3; /* Darker primary color on hover */
}

   </style>
<li class="nav-item">
    <a class="nav-link text-primary cart-link" href="{{ route('cart') }}">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
        @if(Auth::check())
            <span class="badge badge-pill badge-primary">{{ \App\Models\Cart::where('user_id', Auth::id())->count() }}</span>
        @endif
    </a>
</li>

                        <form class="form-inline">
                           <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                           <i class="fa fa-search" aria-hidden="true"></i>
                           </button>
                        </form>
                        @if (Route::has('login'))
                        @auth
                        <li class="nav-item">
                        <x-app-layout>

                        </x-app-layout></li>
                        @else
                        <li class="nav-item">
                           <a class="btn btn-primary" style="margin-right:10px" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                           <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                        </li>
                        @endauth
                        @endif
                     </ul>
                  </div>
               </nav>
            </div>
         </header>
         <!-- end header section -->