@extends('admin.layouts.app')

@section('title', 'Index Category')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Category Name</th>
                <th scope="col">Status</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $categories as $data )
            <tr>


                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$data->category_name}}</td>
                <td>{{$data->slug}}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('admin.category.edit', $data->id )}}">edit</a>
                    <a class="btn btn-danger" href="{{ route('admin.category.destroy', $data->id )}}">delete</a>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
@endsection
