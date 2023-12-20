<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function create()
    {
        $categories = Category::get();
        return view('admin.product.create')->with('categories', $categories);
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $slug = Str::slug($request->product_name);
        $data['slug'] = $slug;
        $status = Product::create($data);
        if ($status) {
            $request->merge(['success' => 'successfully']);
        }

        return redirect()->route('admin.product.index');
    }
    public function edit($id)
    {
        $categories = Category::get();
        return view('admin.product.edit')->with('categories', $categories);
    }
    public function update(Request $request, $id)
    {
        $products = Product::findOrFail($id);
        $data = $request->all();
        $slug = Str::slug($request->product_name);
        $data['slug'] = $slug;
        $status = $products->fill($data)->save();
        if ($status) {
            $request()->merge(['success', 'successfully']);
        }
        return redirect()->route('admin.product.index');
    }
    public function destroy($id)
    {
        $products = Product::findOrFail($id);
        $status = $products->delete();
        if ($status) {
            request()->merge(['success', 'successfully']);
        }
        return redirect()->route('admin.product.index');
    }
}
