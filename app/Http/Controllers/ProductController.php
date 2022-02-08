<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    //GET ALL PRODUCTS
    public function index()
    {
        return Product::get();
    }
    //CREATE A PRODUCT
    public function create(Request $request)
    {
        if (auth()->user()->role === 'admin') {
            $this->validate($request, [
                'name' => 'required|max:255',
                'slug' => 'required',
                'price' => 'required',
                'quantity' => 'required'
            ]);
            return Product::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'price' => $request->price,
                'quantity' => $request->quantity
            ]);
        }
        return response()->json(['error' => 'You are not authorized to take this action'], 401);
    }

    //UPDATE A PRODUCT
    public function update(Request $request, $id)
    {
        $data =  $this->validate($request, [
            'name' => 'nullable|max:255',
            'slug' => 'nullable',
            'price' => 'nullable',
            'quantity' => 'nullable'
        ]);
        $product = Product::find($id);
        if ($product) {
            $product->update($data);
            return response()->json([
                'status' => 'Successfully updated',
                'data' => $product
            ], 200);
        }
        return response()->json([
            'status' => 'Not successfully updated'
        ], 404);
    }
    //SHOW A SINGULAR A PRODUCT
    public function show($id)
    {
        $product = Product::find($id);
        return response()->json([
            'status' => true,
            'data' => $product
        ], 200);
    }

    //DELETE A PRODUCT
    public function delete($id)
    {
        if (auth()->user()->role === 'admin') {
            return Product::destroy($id);
        }
        return response()->json(['error' => 'You are not authorized to take this action'], 401);
    }

   
}
