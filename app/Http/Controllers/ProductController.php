<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::with('category', 'colors')->orderBy('created_at', 'desc')->get();
        return view('admin.pages.products.index', ['products' => $products]);
    }

    public function create()
    {
        $categories = Category::all();
        $colors = Color::all();
        return view('admin.pages.products.create', ['categories' => $categories, 'colors' => $colors]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'colors' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image_name = 'products/' . time() . rand(0, 999) . '.' . $request->image->getClientOriginalExtension();
        $request->image->storeAs('public', $image_name);

        $product = Product::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $image_name
        ]);

        $product->colors()->attach($request->colors);

        return back()->with('success', 'Product saved successfully!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $colors = Color::all();
        return view('admin.pages.products.edit', ['categories' => $categories, 'colors' => $colors, 'product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'price' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = Product::findOrFail($id);

        // Update the specific information of the product
        $product->title = $request->title;
        $product->price = $request->price ;
        $product->description = $request->description;
        $product->category_id = $request->category_id;

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Store the new image
            $image_name = 'products/' . time() . rand(0, 999) . '.' . $request->image->getClientOriginalExtension();
            $request->image->storeAs('public', $image_name);

            // Delete the old image file
            Storage::delete('public/' . $product->image);

            $product->image = $image_name;
        }

        $product->save();

        return back()->with('success', 'Product information updated successfully!');
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return back()->with('success', 'Product deleted successfully.');
    }
}
