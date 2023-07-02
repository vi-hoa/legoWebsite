<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    // //Home
    public function home(){
        $products = Product::with('category','colors')->orderBy('created_at','desc')->get();
        return view('pages.home',['products' => $products]);
    }
    //cart
    public function cart(){
        return view('pages.cart');
        
    }
    public function wishlist(){
        $products = Auth::user()->wishlist;
        return view('pages.wishlist', ['products' => $products]);
        
    }
    public function account(){
        return view('pages.account');
        
    }
    public function checkout(){
        return view('pages.checkout');
    }
    public function success(){
        return "Successfully Done !";
    }
    public function product($id){
        $product = Product::with('category', 'colors')->findOrFail($id);
        return view('pages.product',['product' => $product]);
        
    }
}
