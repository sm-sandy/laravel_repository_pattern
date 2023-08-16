<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'des' => 'required',
        ]);

        $product = Product::create($validatedData);

        // Attach categories
        if ($request->has('categories')) {
            $product->categories()->attach($request->input('categories'));
        }

        return response()->json($product, 201);
    }
}
