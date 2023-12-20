@extends('admin.layouts.app')

@section('title', 'Index Product')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Category Name</th>
                <th scope="col">Status</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $data as $data )
            <tr>


                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$data->product_name}}</td>
                <td>{{$data->category_name}}</td>
                
                <td>
                    <a class="btn btn-info" href="{{ route('querybuilder.product.edit', $data->id )}}">edit</a>
                    <a class="btn btn-danger" href="{{ route('querybuilder.product.destroy', $data->id )}}">delete</a>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
@endsection
