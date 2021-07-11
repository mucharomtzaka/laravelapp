@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-lg-12 mb-3 mt-3 ">
<div class="pull-left">
  <h2>Activity Management</h2>  
</div>
<div class="pull-right">
<div class="input-group mb-3">
{!! Form::open(array('route' => 'activities.index','method'=>'GET')) !!}
  <input type="text" class="form-control" placeholder="Keyword" aria-label="Recipient's username" aria-describedby="button-addon2" name="search" 
    value="{{ request('search') }}" >
  <button class="btn btn-outline-secondary mt-3" type="submit" id="button-addon2">Search</button>
{!! Form::close() !!}
</div>
</div>
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
<th>Event</th>
<th>Description</th>
<th>operator</th>
<th>Date</th>
</tr>
@foreach ($data as $key => $user)
<tr>
<td>{{ ++$i }}</td>
<td>{{ $user->event}}</td>
<td>{{ $user->description}}</td>
<td>
  {{ $user->user['name'] }}
</td>
<td>
  {{ $user->created_at }}
</td>
</tr>
@endforeach
</table>
</div>
{!! $data->render() !!}
@endsection