<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        // Display a listing of the resource
        $products = Product::paginate(10);
        return view('pages.product', compact('products'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer|min:0',
            'category' => 'required|string',
        ]);

        Product::create($validated);
        
        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }

    public function show($id)
    {
        // Display the specified resource
        // $product = Product::findOrFail($id);
        // return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('components.edit-product', compact('product'));
    }
    
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category' => 'required|string|max:255',
        ]);
    
        $product = Product::findOrFail($id);
        $product->update($validated);
    
        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }
    
    

    public function destroy($id)
    {
        // Remove the specified resource from storage
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}
