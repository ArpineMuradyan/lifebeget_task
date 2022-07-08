<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function get_products()
    {
        $categories = Category::all();
        $products = Product::with('category')->get();
        return view('front.product', compact('products', 'categories'));
    }

    public function get_product($id)
    {
        $product = Product::with('category')->where('id',$id)->first();
        return view('front.product_single', compact('product'));
    }

    public function filter($id){
        $categories = Category::all();
        $products = Product::with('category')->where('category_id',$id)->get();
        return view('front.product', compact('products', 'categories'));
    }
}
