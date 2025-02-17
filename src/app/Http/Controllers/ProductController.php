<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\RegisterRequest;

class ProductController extends Controller
{
    public function index()
    {   
        $products = Product::paginate(6);

        return view('products.index', compact('products'));
    }
    
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function update($id)
    {
        $product = Product::findOrFail($id);
        return view('products.update', compact('product'));
    }

    public function saveUpdate(ProductRequest $request, $id)
    {

        $product = Product::findOrFail($id);


        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        

        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('public/products');
            $product->image = basename($imagePath);
        }

        $product->save();
       
        dd($request->seasons);
        $seasonIds = \App\Models\Season::whereIn('name', $request->seasons)->pluck('id')->toArray();
        dd($seasonIds);
        $product->seasons()->sync($seasonIds);

        return redirect('/products')->with('success', '商品情報を更新しました');
    }

    public function register()
    {
        return view('register');
    }

    public function store(RegisterRequest $request)
    {
        $product = new Product();
        $product->name = $request->input('product-name');
        $product->price = $request->input('product-price');
        $product->description = $request->input('description');

        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('public/products');
            $product->image = basename($imagePath);
        }

        $product->save();

        $seasonIds = \App\Models\Season::whereIn('name', $request->input('season'))->pluck('id')->toArray();
        $product->season()->sync($seasonIds);

        return redirect('/products')->with('success', '商品が登録されました');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::KeywordSearch($query)->paginate(6);

        return view('products.search_results', compact('products'));

    }
}
