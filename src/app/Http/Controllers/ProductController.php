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
    
    //詳細・変更画面を表示
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

     //詳細・変更画面を表示（update.blade.php）
    public function update($id)
    {
        $product = Product::findOrFail($id);// ID に対応する商品を取得
        return view('products.update', compact('product'));
    }

    //商品情報を更新（PATCH）
    public function saveUpdate(ProductRequest $request, $id)
    {
        die('ここまで来た');
        dd('リクエストデータ:', $request->all());

        $product = Product::findOrFail($id);


        //データを更新（※バリデーションはあとで）
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        

        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('public/products');
            $product->image = basename($imagePath);
        }

        $product->save();
        //$product->seasons()->sync($request->seasons); 以下に修正してみる
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
