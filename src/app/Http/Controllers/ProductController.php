<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        
        return view('index', compact('products'));
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
    public function saveUpdate(Request $request, $id)
    {
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
        $product->seasons()->sync($request->season);

        return redirect('/products')->with('success', '商品情報を更新しました');
    }
}
