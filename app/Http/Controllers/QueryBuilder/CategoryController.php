<?php

namespace App\Http\Controllers\QueryBuilder;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function create()
    {
        return view('querybuilder.category.create');
    }
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['slug'] = Str::slug($data['category_name']);
        $data['created_at'] = now();
        DB::table('categories')->insert($data);
        return redirect()->route('querybuilder.category.index')->with('success', 'tao category thanh cong');
    }
    public function edit($id)
    {

        $categories = DB::table('categories')->where('id',$id)->first();
        if (!$categories) {
            return redirect()->route('querybuilder.category.index')->with('error', 'Khong tim thay category');
        }
        return view('querybuilder.category.edit',['categories'=>$categories]);
    }
    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        $data['slug'] = Str::slug($data['category_name']);
        $data['updated_at'] = new \DateTime();
        DB::table('categories')->where('id', $id)->update($data);
        return redirect()->route('querybuilder.category.index')->with('success', 'cap nhap category thanh cong');
    }
    public function destroy($id)
    {
        $hasProduct = DB::table('products')
        ->where('category_id', $id)->count() > 0;

        if ($hasProduct) {
            return redirect()->back()->withErrors(['error' => 'không phải xóa']);
            
        }

        DB::table('categories')->where('id', $id)->delete();
        return redirect()->route('querybuilder.category.index')->with('success', 'delete thành công');
    }
    public function index()
    {
        $categories=DB::table('categories')->get();
        return view('querybuilder.category.index',compact('categories'));
    }
}
