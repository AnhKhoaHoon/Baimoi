@extends('admin.layouts.app')
@section('title','Index Product')
@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Product Name</th>
        <th scope="col">Status</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row"></th>
        <td></td>
        <td></td>
<td>
    <a  class="btn btn-info" href="route{{'admin.product.edit',$product->id}}" ></a>
    <a  class="btn btn-danger" href="route{{'admin.product.destroy',$product->id}}" ></a>
</td>
      </tr>

    </tbody>
  </table>
@endsection
