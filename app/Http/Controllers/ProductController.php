<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.product');
    }

    public function store(Request $request)
    {
        Product::createProduct($request);
        return redirect()->back()->with('success', 'Product Created Successfully..');
    }

    public function show(Product $product)
    {
        $this->products = Product::orderBy('id', 'DESC')->get();
        return view('admin.product.manage', ['products' => $this->products]);
    }
    public function editProduct($id)
    {
        $this->product = Product::find($id);
        return view('admin.product.edit', [
            'product' => $this->product,
        ]);
    }

    public function updateProduct(Request $request, $id)
    {
        Product::updateProduct($request, $id);
        return redirect('/manage-product')->with('success', 'Product Updated Successfully...');
    }

    public function destroy($id)
    {
        $this->product = Product::find($id);
        if (file_exists($this->product->image)){
            unlink($this->product->image);
        }
        $this->product->delete();
        return redirect()->back()->with('success', 'Product Deleted Successfully...');
    }
}
