@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-lg-12 mb-3 mt-3 ">
<div class="pull-left">
  <h2>Users Management</h2>  
</div>
<div class="pull-right">
<div class="input-group mb-3">
{!! Form::open(array('route' => 'users.index','method'=>'GET')) !!}
  <input type="text" class="form-control" placeholder="Keyword" aria-label="Recipient's username" aria-describedby="button-addon2" name="search" 
    value="{{ request('search') }}" >
  <button class="btn btn-outline-secondary mt-3" type="submit" id="button-addon2">Search</button>
{!! Form::close() !!}
</div>
</div>
@can('user-create')
  <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
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
<th>Username</th>
<th>Type</th>
<th>Roles</th>
<th>Action</th>
</tr>
@foreach ($data as $key => $user)
<tr>
<td>{{ ++$i }}</td>
<td>{{ $user->name }}</td>
<td>{{ $user->type_account }}</td>
<td>
{{  $user->roles()->pluck('name')->implode(' ') }}

</td>
<td>
<a class="btn btn-info btn-small" href="{{ route('users.show',$user->id) }}">
Show
</a>
@can('user-edit')
<a class="btn btn-primary btn-small" href="{{ route('users.edit',$user->id) }}">Edit</a>
{!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
@endcan
@can('user-delete')
{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-small']) !!}
{!! Form::close() !!}
@endcan
</td>
</tr>
@endforeach
</table>
</div>
{!! $data->render() !!}
@endsection