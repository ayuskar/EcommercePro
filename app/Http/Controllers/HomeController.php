<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    //
    public function index(){
    if(Auth::check()) { // Check if user is authenticated
        $cartCount = Auth::check() ? \App\Models\Cart::where('user_id', Auth::id())->count() : 0;
        $usertype = Auth::user()->usertype;
        if ($usertype == '1'){
            return view('admin.home');
        }
    }
    // Default behavior for non-authenticated users or usertype 0
    $products = Product::latest()->take(9)->get();
    return view('home.userpage', compact('products'));
}
    public function redirect(){
    $usertype = Auth::user()->usertype;
    if ($usertype == '1'){
        // Admin dashboard, no product data needed for this example
        return view('admin.home');
    }
    else{
        // For non-admin users, fetch products (latest 10) and pass to the view
        $products = Product::latest()->take(9)->get();
        return view('home.userpage', compact('products'));
    }
}
public function allproducts(){
    $products = Product::all(); // Retrieves all users
    return view('home.productlist', compact('products')); 
}
public function show($id){
    // Fetch the product by ID
    $product = Product::find($id);
    
    // Check if product exists
    if (!$product) {
        return abort(404); // Return 404 if product not found
    }
    // Fetch related products (e.g., same category)
    $relatedProducts = Product::where('category', $product->category)
                              ->where('id', '!=', $id)
                              ->take(4) // Show up to 4 related products
                              ->get();
    // Return the view with the product data
    return view('home.productdetails', compact('product', 'relatedProducts'));
}
public function add_cart(Request $request, $id)
{
    if (Auth::id()) {
        $user = Auth::user();
        $product = Product::find($id);

        // Validate Quantity
        $requestedQuantity = $request->input('quantity');
        if ($requestedQuantity > $product->quantity) {
            return redirect()->back()->with('error', 'Requested quantity is not available in stock.');
        }

        // Check if product is already in cart
        $existingCartEntry = Cart::where('user_id', Auth::id())
            ->where('product_id', $id)
            ->first();

        if ($existingCartEntry) {
            // Update existing cart entry
            $existingCartEntry->quantity += $requestedQuantity;
            $existingCartEntry->totalprice += $request->input('totalprice');
            $existingCartEntry->save();
        } else {
            // Create new cart entry
            Cart::create([
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'address' => $user->address,
                'product_title' => $product->title,
                'price' => $product->price,
                'quantity' => $request->input('quantity'),
                'image' => $product->image,
                'product_id' => $id,
                'user_id' => Auth::id(),
                'totalprice' => $request->input('totalprice'),
            ]);
        }

        return redirect('cart')->with('success', 'Product added to cart successfully.');
    } else {
        return redirect('login');
    }
}

public function cart()
{
    $userId = Auth::id();
    $cartItems = Cart::where('user_id', $userId)->get();
    $subtotal = $cartItems->sum('totalprice'); // Calculate subtotal here

    if ($cartItems->isEmpty()) {
        return view('home.cart', ['error' => 'Cart is Empty', 'subtotal' => 0]);
    } else {
        return view('home.cart', compact('cartItems', 'subtotal')); // Pass subtotal to view
    }
}

public function removeCartItem($id)
{
    Cart::find($id)->delete();
    return redirect()->route('cart')->with('success', 'Item removed from cart');
}
public function placeOrder(Request $request)
{
    $request->validate([
        'address' => 'required',
        'phone' => 'required',
    ]);

    $order = new Order();
    $order->user_id = Auth::id();
    $order->name = $request->name;
    $order->email = $request->email;
    $order->address = $request->address;
    $order->phone = $request->phone;
    $order->total = Cart::where('user_id', Auth::id())->sum('totalprice');
    $order->save();

    $cartItems = Cart::where('user_id', Auth::id())->get();
    foreach ($cartItems as $item) {
        $orderItem = new OrderItem();
        $orderItem->order_id = $order->id;
        $orderItem->product_title = $item->product_title;
        $orderItem->quantity = $item->quantity;
        $orderItem->price = $item->price;
        $orderItem->totalprice = $item->totalprice;
        $orderItem->save();

        // Remove item from cart after adding to order
        Cart::find($item->id)->delete();
    }

    return redirect()->route('home')->with('success', 'Order placed successfully!');
}
public function blogs(){
    return view('home.blog');
}
public function contact(){
    return view('home.contact');
}
public function about(){
    return view('home.about');
}
public function testimonials(){
    return view('home.testimonials');
}
}
