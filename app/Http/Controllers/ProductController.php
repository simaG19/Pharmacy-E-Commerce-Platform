<?php

// app/Http/Controllers/ProductController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'type' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:10000',
        ]);

        $imagePath = $request->file('image')->store('product_images');

        Product::create([
            'image' => $imagePath,
            'name' => $validated['name'],
            'price' => $validated['price'],
            'description' => $validated['description'],
            'type' => $validated['type'],
        ]);

        return redirect()->route('manage_products')->with('success', 'Product added successfully.');
    }
}
