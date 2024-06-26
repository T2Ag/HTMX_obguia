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
        
        $html = "";

        foreach($products->get() as $prod) {
            $html .= "
                <div class='p-4 rounded overflow-hidden shadow-md bg-white mt-3'>
                    <img src='$prod->img' alt='$prod->name' class='w-full h-48 object-cover rounded-t'>
                    <h3 class='text-2xl'>$prod->name</h3>
                    <p class='text-lg'>Price: $prod->price</p>
                </div>
            ";
        }

        return $html;
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' =>'required',
            'price' =>'required',
            'img' =>'required'
        ]);

        if($validator->fails()) {
            $products = Product::orderBy('name');
            return view('templates._error', ['errors' => $validator->errors()->all(), 'products' => $products]);

        };
        $products = Product::orderBy('name');

        Product::create($request->all());

        return view('templates._products-list',['products'=>$products]);
    }
}
