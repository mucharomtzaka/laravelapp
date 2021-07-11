@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb mt-3 mb">
<div class="pull-left">
<h2>Role Management</h2>
</div>
<div class="pull-right">

</div>
</div>
</div>

<div class="input-group mt-3 mb-3">
{!! Form::open(array('route' => 'roles.index','method'=>'GET')) !!}
  <input type="text" class="form-control" placeholder="Keyword" aria-label="Recipient's username" aria-describedby="button-addon2" name="search" 
    value="{{ request('search') }}" >
  <button class="btn btn-outline-secondary mt-3" type="submit" id="button-addon2">Search</button>
{!! Form::close() !!}
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif

@can('role-create')
<a class="btn btn-success mb-3 " href="{{ route('roles.create') }}"> Create New Role</a>
@endcan

<table class="table table-bordered">
<tr>
<th>No</th>
<th>Name</th>
<th width="280px">Action</th>
</tr>
@foreach ($roles as $key => $role)
<tr>
<td>{{ ++$i }}</td>
<td>{{ $role->name }}</td>
<td>
<a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
@can('role-edit')
<a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
@endcan
@can('role-delete')
{!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}
@endcan
</td>
</tr>
@endforeach
</table>
{!! $roles->render() !!}
@endsection