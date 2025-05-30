<?php
//
//namespace App\Http\Controllers;
//use App\Models\Category;
//use App\Models\Product;
//use Illuminate\Http\Request;
//
//
//class ProductController extends Controller
//{
//    public function index()
//    {
//        $products = Product::with('category')->get();
//        return view('panel.products.index', compact('products'));
//    }
//
//    public function create()
//    {
//        $categories = Category::all();
//        return view('panel.products.create', compact('categories'));
//    }
//
//    public function store(Request $request)
//    {
//        $request->validate([
//            'name' => 'required|string|max:255',
//            'slug' => 'required|string|max:255|unique:products',
//            'number' => 'required|integer',
//            'category_id' => 'required|exists:categories,id',
//        ]);
//
//        Product::create([
//            'name' => $request->name,
//            'slug' => $request->slug,
//            'number' => $request->number,
//            'category_id' => $request->category_id,
//        ]);
//
//        return redirect()->route('products.index');
//    }
//
////    public function show(Product $product)
////    {
////        return view('products.show', compact('product'));
////    }
//
//    public function edit(Product $product)
//    {
//        $categories = Category::all();
//        return view('panel.products.edit', compact('product', 'categories'));
//    }
//
//    public function update(Request $request, Product $product)
//    {
//        $request->validate([
//            'name' => 'required|string|max:255',
//            'slug' => 'required|string|max:255|unique:products,slug,' . $product->id,
//            'number' => 'required|integer',
//            'category_id' => 'required|exists:categories,id',
//        ]);
//
//        $product->update([
//            'name' => $request->name,
//            'slug' => $request->slug,
//            'number' => $request->number,
//            'category_id' => $request->category_id,
//        ]);
//
//        return redirect()->route('products.index');
//    }
//
//    public function destroy(Product $product)
//    {
//        $product->delete();
//        return redirect()->route('products.index');
//    }
//}
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    public function index()
    {
        // گرفتن محصولات همراه با تگ‌ها و دسته‌بندی‌ها
        $products = Product::with(['category', 'tags'])->get();
        return view('panel.products.index', compact('products'));
    }

    public function create()
    {
        // گرفتن همه دسته‌بندی‌ها و تگ‌ها
        $categories = Category::all();
        $tags = Tag::all();
        return view('panel.products.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        // اعتبارسنجی ورودی‌ها
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products',
            'number' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'array|nullable',
            'tags.*' => 'exists:tags,id', // اعتبارسنجی تگ‌ها
        ]);

        // ایجاد محصول جدید
        $product = Product::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'number' => $request->number,
            'category_id' => $request->category_id,
        ]);

        // اتصال تگ‌ها به محصول
        if ($request->has('tags')) {
            $product->tags()->sync($request->tags);
        }

        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        // گرفتن دسته‌بندی‌ها و تگ‌ها
        $categories = Category::all();
        $tags = Tag::all();
        return view('panel.products.edit', compact('product', 'categories', 'tags'));
    }

    public function update(Request $request, Product $product)
    {
        // اعتبارسنجی ورودی‌ها
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug,' . $product->id,
            'number' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'array|nullable',
            'tags.*' => 'exists:tags,id',
        ]);

        // بروزرسانی محصول
        $product->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'number' => $request->number,
            'category_id' => $request->category_id,
        ]);

        // بروزرسانی تگ‌ها
        if ($request->has('tags')) {
            $product->tags()->sync($request->tags);
        }

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        // حذف محصول
        $product->delete();
        return redirect()->route('products.index');
    }
}
