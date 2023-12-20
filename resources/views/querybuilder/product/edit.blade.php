@extends('admin.layouts.app')
@section('title', 'Edit Category')
@section('content')
    <form action="{{ route('querybuilder.product.update', $edit->id) }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" value='{{ $edit->product_name }}'
                name="product_name" placeholder="">
        </div>
        <div class="mb-3">
            <select class="form-select" name="category_id" aria-label="Default select example">
                @foreach ($categories as $category)
                <div class="mb-3">


                        <option value="{{$category->id}}">{{$category->category_name}}</option>


                </div>
                @endforeach


            </select>
        </div>
        <div class="mb-3">
            <select class="form-select" name="status" aria-label="Default select example">

                <option value="active">Active</option>
                <option value="inactive">Inactive</option>

            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>

    </form>
@endsection
