@extends('layouts.app')

@section('content')
<br>
<form action="{{ url('task/update') }}" method="POST" >
    {{ csrf_field() }}
    <div class="container form-group ">
        <label for="name"> Task name</label>
        <input type="text"  name="name" class="form-control" size="20" value="{{$task->name}}">
        <input type="hidden" value="{{$task->id}}" name="id">
        <br>
        <button type="submit" class="btn btn-primary" >Edit</button>
    </div>
</form>
@endsection