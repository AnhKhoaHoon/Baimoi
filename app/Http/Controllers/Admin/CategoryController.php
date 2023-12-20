<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $slug = Str::slug($request->category_name);
        $data['slug'] = $slug;


        $status = Category::create($data);
        if ($status) {
            $request->merge(['success' => 'successfully']);
        }
        else{
            $request->merge(['success' => 'not successfully']);
        }
        return redirect()->route('admin.category.index');
    }


    public function edit($id)
    {
        $categories = Category::findOrFail($id);
        return view('admin.category.edit')->with('categories',$categories);


    }
    public function update(Request $request, $id)
    {
        $categories= Category::findOrFail($id);
        $data = $request->all();

        $slug = Str::slug($request->category_name);
        $data['slug']=$slug;

        $status = $categories->fill($data)->save();
        if($status){
            $request->merge(['success'=>'successfully']);
        }
        else{
            $request->merge(['success'=>'not successfully']);
        }
        return redirect()->route('admin.category.index');

    }

    public function destroy($id)
    {
        $categories= Category::findOrFail($id);
        $status= $categories->delete();
        if($status){
            request()->merge(['success'=>'successfully']);
        }
        else{
            request()->merge(['success'=>'not successfully']);
        }
        return redirect()-> route('admin.category.index');
    }
}
