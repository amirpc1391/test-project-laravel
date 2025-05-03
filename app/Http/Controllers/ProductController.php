<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('panel.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('panel.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products',
            'number' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
        ]);

        Product::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'number' => $request->number,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('products.index');
    }

//    public function show(Product $product)
//    {
//        return view('products.show', compact('product'));
//    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('panel.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug,' . $product->id,
            'number' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'number' => $request->number,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
