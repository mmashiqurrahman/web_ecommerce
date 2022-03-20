<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index() {
        $products = Product::all();
        return view('admin.products.index', ['products' => $products]);
    }

    public function show(Product $product) {
        return view('admin.products.show', ['product' => $product]);
    }

    public function displayGrid() {
        $products = Product::all();
        return view('admin.homepage', ['products' => $products]);
    }

    public function create() {
        $categories = Category::all();
        return view('admin.products.create', ['categories' => $categories]);
    }

    public function store(ProductRequest $request) {
        $category = Category::find($request->category_id);
        $ext = $request->file('image')->getClientOriginalExtension();
        $newName = Str::slug($request->name) . '.' . $ext;
        $request->file('image')->storeAs('public/products', $newName);
        try {
            Product::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'category_id' => $request->category_id,
                'category_name' => $category->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'description' => $request->description,
                'status' => $request->status,
                'image' => "storage/products/{$newName}",
                'in_stock' => $request->quantity > 0 ? 1 : 0
            ]);
            return redirect()->back()->with('success', 'Product created Successfully');
        } catch(Exception $e) {
            Log::error("ProductController store-func: " . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function edit(Product $product) {
        $categories = Category::all();
        return view('admin.products.edit', ['product' => $product, 'categories' => $categories]);
    }

    public function update(ProductRequest $request, Product $product) {
        $category = Category::find($request->category_id);
        $oldImagePath = $product->image;
        $ext = $request->file('image')->getClientOriginalExtension();
        $newName = Str::slug($request->name) . '.' . $ext;
        $request->file('image')->storeAs('public/products', $newName);
        try {
            $product->name = $request->name;
            $product->slug = Str::slug($request->name);
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->category_id = $request->category_id;
            $product->category_name = $category->name;
            $product->status = $request->status;
            $product->image = "storage/products/{$newName}";
            $product->description = $request->description;
            $product->in_stock = $request->quantity > 0 ? 1 : 0;
            $product->update();

            $newImagePath = "storage/products/{$newName}";
            if($oldImagePath != $newImagePath) {
                $oldImagePath = str_replace('storage', 'public', $oldImagePath);
                Storage::delete($oldImagePath);
            }
            return redirect()->back()->with('success', 'Product updated Successfully');
        } catch(Exception $e) {
            Log::error("ProductController update-func: " . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function destroy(Product $product) {
        try {    
            $product->delete();
            return redirect()->back()->with('success', 'Product Deleted Successfully');
        } catch(Exception $e) {
            Log::error("ProductController destroy-func: " . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
