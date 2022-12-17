<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class FrontController extends Controller
{
    public $products, $product;

    public function index()
    {
        $this->products = Product::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('front.home.home', [
            'products' => $this->products,
        ]);
    }


    public function productDetails($id)
    {
        $this->product = Product::find($id);
//        $this->products = Product::where('status', 1)->get();
        return view('front.product.details', [
            'product' => $this->product,
        ]);
    }
}
