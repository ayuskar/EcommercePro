<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product;
class AdminController extends Controller
{
    //
    public function view_category(){
        return view('admin.category');
    }
    public function add_category(Request $request)
    {
        $request->validate([
        'category_name' => 'required|string|max:255|unique:categories'
     ]);

     $category = new Category();
     $category->category_name = $request->category_name;
     $category->save();

     return redirect()->back()->with('message', 'Category added successfully!');
    }
    public function delete_category($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

       return response()->json(['success' => true, 'message' => 'Category deleted successfully!']);
    }
    public function add_product_view()
{
    $categories = Category::all();
    return view('admin.addproduct', compact('categories'));
}

public function add_product(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png',
        'category' => 'required|string',
        'quantity' => 'required|numeric|min:1',
        'price' => 'required|numeric',
        'discount' => 'nullable|numeric|min:0'
    ]);

    $product = new Product();
    $product->title = $request->title;
    $product->description = $request->description;
    $product->category = $request->category;
    $product->quantity = $request->quantity;
    $product->price = $request->price;
    $product->discount = $request->discount;

    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('product_images'), $imageName);
        $product->image = $imageName;
    }

    $product->save();

    return redirect()->back()->with('message', 'Product added successfully!');
}

public function show_product()
{
    $products = Product::all();
    return view('admin.viewproduct', compact('products'));
}

public function delete_product($id)
{
    $product = Product::findOrFail($id);

    if ($product->image && file_exists(public_path('product_images/' . $product->image))) {
        unlink(public_path('product_images/' . $product->image));
    }

    $product->delete();

    return response()->json(['success' => true, 'message' => 'Product deleted successfully!']);
}
public function edit_product($id)
{
    $product = Product::findOrFail($id);
    $categories = Category::all(); // Assuming you have a Category model
    return view('admin.editproduct', compact('product', 'categories'));
}

public function update_product(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png',
        'category' => 'required|string',
        'quantity' => 'required|numeric|min:1',
        'price' => 'required|numeric',
        'discount' => 'nullable|numeric|min:0'
    ]);

    $product = Product::findOrFail($id);
    $product->title = $request->title;
    $product->description = $request->description;
    $product->category = $request->category;
    $product->quantity = $request->quantity;
    $product->price = $request->price;
    $product->discount = $request->discount;

    if ($request->hasFile('image')) {
        if ($product->image && file_exists(public_path('product_images/' . $product->image))) {
            unlink(public_path('product_images/' . $product->image));
        }
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('product_images'), $imageName);
        $product->image = $imageName;
    }

    $product->save();

    return redirect()->route('show_product')->with('message', 'Product updated successfully!');
}

}
