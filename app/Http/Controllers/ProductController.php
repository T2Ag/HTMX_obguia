<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request) {
        $products = Product::orderBy('name');

        if($request->filter) {
            $products->where('name', 'like', "%$request->filter%");
        }

        return view('templates._products-list',['products'=>$products]);
    }


    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' =>'required',
            'price' =>'required',
            'img' =>'required'
        ]);

        if($validator->fails()) {
            $products = Product::orderBy('name');
            return view('templates._error', ['errors' => $validator->errors(), 'products' => $products]);

        };

        $product = Product::create($request->all());

        return view('templates._single-product',['prod'=>$product, 'newProduct' => true]);
    }

    
    public function edit(Product $product){

        $product = Product::find($product->id);

        return view('product.edit', ['product'=>$product]);

    }

    public function show(Product $product){

        $product = Product::find($product->id);

        return view('product.show', ['product'=>$product]);

    }

    public function update(Request $request, Product $product){
        $fields = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'img' => 'required'
        ]);
    
        $product->update($fields);

        $products = Product::orderBy('name');

        return view('templates._products-list', ['products'=>$products]);
    }

    public function destroy(Product $product) {
        
        $product->delete();

        return "";
    }
}
