<?php

namespace App\Http\Controllers\QueryBuilder;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function create()
    {
        $categories = DB::table('categories')->get();
        return view('querybuilder.product.create')->with('categories', $categories);
    }
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['slug'] = Str::slug($data['product_name']);
        $data['created_at'] = now();
        DB::table('products')->insert($data);
        return redirect()->route('querybuilder.product.index')->with('success', 'Tao danh muc thanh cong');
    }
    public function edit($id)
    {
        $categories = DB::table('categories')->get();
        $edit = DB::table('products')->find($id);
        if (!$edit) {
            return redirect()->route('querybuilder.product.index')->with('error', 'Khong tim thay danh muc');
        }
        return view('querybuilder.product.edit', compact('categories', 'edit'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        $data['created_at'] = now();
        $data['slug'] = Str::slug($data['product_name']);
        DB::table('products')->where('id', $id)->update($data);
        return redirect()->route('querybuilder.product.index')->with('success', 'cap nhap danh muc thanh cong');
    }
    public function destroy($id)
    {
        DB::table('products')
            ->where('id', $id)
            ->delete();
        return redirect()->route('querybuilder.product.index');
    }
    public function index()
    {
        $data = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.product_name', 'categories.category_name', 'products.id')->get();
        return view('querybuilder.product.index', ['data' => $data]);
    }
}
