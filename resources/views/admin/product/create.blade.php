@extends('admin.layouts.app')
@section('title', 'Create Product')
@section('content')
    <form action="{{ route('admin.product.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="product_name" placeholder="">
        </div>
        <div class="mb-3">
            <select class="form-select" name="category_id" aria-label="Default select example">

                @foreach ($categories as $key => $category)
                    <option value="{{ $category->id }}"> {{ $category->category_name }} </option>
                @endforeach



            </select>
        </div>
        <div class="mb-3">
            <select class="form-select" name="status" aria-label="Default select example">

                <option value="active">Active</option>
                <option value="inactive">Inactive</option>

            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>

    </form>
@endsection
