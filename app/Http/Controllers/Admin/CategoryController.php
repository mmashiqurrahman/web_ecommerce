<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Exception;

class CategoryController extends Controller
{
    public function index() {
        $data = Category::all();
        return view('admin.categories.index', ['categories' => $data]);
    }

    public function create() {
        return view('admin.categories.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required | min:10'
        ]);
        try {
            Category::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name)
            ]);
            return redirect()->back()->with('success', 'Category created Successfully');
        } catch(Exception $e) {
            Log::error("CategoryController store-func: " . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function edit($id) {
        $category = Category::where('id', $id)->first();
        return view('admin.categories.edit', ['category' => $category]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required | min:10'
        ]);

        try {
            $category = Category::find($id);
            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->update();
            return redirect()->back()->with('success', 'Category updated Successfully!');
        } catch(Exception $e) {
            Log::error("CategoryController update-func: " . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function destroy($id) {
        try {
            $category = Category::find($id);
            $category->delete();
            return redirect()->back()->with('success', 'Category deleted Successfully!');
        } catch(Exception $e) {
            Log::error("CategoryController destroy-func: " . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
}
