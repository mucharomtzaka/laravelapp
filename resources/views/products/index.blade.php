@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-lg-12 mb-3 mt-3 ">
<div class="pull-left">
  <h2>Product Management</h2>  
</div>
<div class="pull-right">
<div class="input-group mb-3">
{!! Form::open(array('route' => 'products.index','method'=>'GET')) !!}
  <input type="text" class="form-control" placeholder="Keyword" aria-label="Recipient's username" aria-describedby="button-addon2" name="search" 
    value="{{ request('search') }}" >
  <button class="btn btn-outline-secondary mt-3" type="submit" id="button-addon2">Search</button>
{!! Form::close() !!}
</div>
</div>
@can('user-create')
  <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
@endcan
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<div class="table-responsive">
<table class="table table-bordered">
<tr>
<th>No</th>
<th>Name</th>
<th>Barcode</th>
<th>Price Sale</th>
<th>Stock</th>
<th>Rate</th>
<th width="250px">Action</th>
</tr>
@foreach ($data as $key => $product)
<tr>
<td>{{ ++$i }}</td>
<td>{{ $product->name }}</td>
<td>{{ $product->barcode }}</td>
<td>{{ number_format(intval($product->price)) }}
</td>
<td>
  {{ $product->stock }}
</td>
<td>{{ $product->rate }} </td>
<td>
<a class="btn btn-info btn-small" href="{{ route('products.show',$product->id) }}">
Show
</a>
@can('product-edit')
<a class="btn btn-primary btn-small" href="{{ route('products.edit',$product->id) }}">Edit</a>
{!! Form::open(['method' => 'DELETE','route' => ['products.destroy', $product->id],'style'=>'display:inline']) !!}
@endcan
@can('product-delete')
{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-small']) !!}
{!! Form::close() !!}
@endcan
</td>
</tr>
@endforeach
</table>
</div>
{!! $data->render() !!}
</div>
@endsection