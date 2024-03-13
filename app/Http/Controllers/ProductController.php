<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request, Product $product)
    {
        // dd($request);
        // $mime = $image->getMimeType()
        $request->validate([
            'prodName' => ['required', 'max:255'],
            'prodDesc' => ['required', 'max:4096'],
            'prodPrice' => ['required', 'min:0.01', 'numeric'],
            'prodImg' => ['required', 'image', 'max:10240'],
        ]);
        $product->productName = $request->prodName;
        $product->productDescription = $request->prodDesc;
        $product->price = $request->prodPrice;
        $image = $request->file('prodImg');
        $fileName = time() . '-' . $image->getClientOriginalName();
        $image->move(public_path('img'), $fileName);
        $product->imgUrl = "/img/".$fileName;
        $product->save();
        return redirect('/products');
        // return view('create');
    }
    public function show(Request $request, $id)
    {
        // dd($id);
        $product = Product::find($id);
        if($product){
            return view('products.show', compact('product'));
        }else{
            return response()->json(['message' => "Product with id: $id not found check if the id is an integer or exists."]);
        }
        // return redirect('/products');
        // return view('create');
    }
    public function edit(Request $request, $id, Product $product)
    {
        // $request->validate([
        //     'prodName' => ['required', 'max:255'],
        //     'prodDesc' => ['required', 'max:4096'],
        //     'prodPrice' => ['required', 'min:0.01', 'numeric'],
        //     'prodImg' => ['required', 'image', 'max:10240'],
        // ]);
        // $product->productName = $request->prodName;
        // $product->productDescription = $request->prodDesc;
        // $product->price = $request->prodPrice;
        // $image = $request->file('prodImg');
        // $fileName = time() . '-' . $image->getClientOriginalName();
        // $image->move(public_path('img'), $fileName);
        // $product->imgUrl = "/img/".$fileName;
        // // $product->save();
        // // return redirect('/products');

        $product = Product::find($id);
        if($product){
            // dd($product);
            return view('products.edit', compact('product'));
        }else{
            return response()->json(['message' => "Product with id: $id not found check if the id is an integer or exists."]);
        }
        return redirect('/products');
    }
    public function update(Request $request, $id) {
        $product = Product::find($id);

        $request->validate(
            [
                'prodName' => ['required', 'max:255'],
                'prodDesc' => ['required', 'max:4096'],
                'prodPrice' => ['required', 'min:0.01', 'numeric'],
            ]
        );

        $product->productName = $request->prodName;
        $product->productDescription = $request->prodDesc;
        $product->price = $request->prodPrice;

        $product->save();

        return redirect("/products/$id");
    }
    public function destroy(Request $request, $id)
    {
        $product = Product::find($id);
        // dd($product);
        if($product){
            $product->delete();
            return redirect('/products');
        }else{
            return response()->json(['message' => "Product with id: $id not found check if the id is an integer or exists."]);
        }
    }
}

