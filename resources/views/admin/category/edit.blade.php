@extends('admin.layouts.app')
@section('title','Edit Category')
@section('content')
<form action="{{ route('admin.category.update',$categories->id) }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Category Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" value='{{$categories->category_name}}'  name="category_name" placeholder="">
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
