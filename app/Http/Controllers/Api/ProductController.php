<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return ProductResource::collection($products);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return new ProductResource($product);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'quantity' => 'required|integer',
            'prix' => 'required|numeric',
            'exp_date' => 'required|date',
            'fab_date' => 'required|date',
        ]);

        $product = Product::create($request->all());

        return new ProductResource($product);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'quantity' => 'required|integer',
            'prix' => 'required|numeric',
            'exp_date' => 'required|date',
            'fab_date' => 'required|date',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return new ProductResource($product);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully']);
    }
}
