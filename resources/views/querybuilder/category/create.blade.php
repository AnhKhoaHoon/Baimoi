@extends('admin.layouts.app')
@section('title', 'Create Category')
@section('content')

    <form class="form-category"action="{{ route('querybuilder.category.store') }}" method="post">
        @csrf
        <div class="">
            <label for="">Category Name</label>
            <input type="text" name="category_name" placeholder="Vui lòng điền category_name">
        </div>
        <div class="">
            <select  name="status" >
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>
        <button type="submit">Create</button>

    </form>
@endsection
