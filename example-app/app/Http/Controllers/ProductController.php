<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function index(){
        $products = Product::with('category','colors')->orderBy('created_at','desc')->get();
        return view('admin.pages.products.index', ['products' => $products]);
    }
    public function create(){
        $categories = Category::all();
        $colors = Color::all();
        return view('admin.pages.products.create', ['categories' => $categories, 'colors' => $colors]);
    }
    public function store(Request $request){
        //validate
        $request -> validate([
            'title' => 'required|max:255',
            'category_id'  => 'required',
            'colors' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        //storage
        $image_name = 'products/' .time().rand(0,999) .'.' . $request->image->getClientOriginalExtension();

        //dd($request->image);
        $request->image->storeAs('public', $image_name);

        $product = Product::create([
            'title' => $request->title, 
            'category_id' => $request->category_id,
            'price' => $request->price*100,
            'description' => $request->description, 
            'image' => $image_name
        ]);

        $product->colors()->attach($request->colors);
        //return

        return back()->with('success', 'Product Saved Successfully!');
    }

    public function edit($id){
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $colors = Color::all();
        return view('admin.pages.products.edit', ['categories' => $categories, 'colors' => $colors, 'product' => $product]);
    }
    public function update(Request $request, $id){
        $request -> validate([
            'title' => 'required|max:255',
            'category_id'  => 'required',
            'colors' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = Product::findOrFail($id);
        //storage
        $image_name = $product->image;
        if($request->image){
            $image_name = 'products/' .time().rand(0,999) .'.' . $request->image->getClientOriginalExtension();
        //dd($request->image);
            $request->image->storeAs('public', $image_name);
        }

        $product->update([
            'title' => $request->title, 
            'category_id' => $request->category_id,
            'price' => $request->price*100,
            'description' => $request->description, 
            'image' => $image_name
        ]);

        $product->colors()->sync($request->colors);
        //return

        return back()->with('success', 'Product Updated Successfully!');
    }

    public function destroy($id){
        Product::findOrFail($id)->delete();
        return back()->with('success', 'Product Deleted Successfully.');
    }
}
