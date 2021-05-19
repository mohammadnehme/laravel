@extends('layouts.app')

@section('content')
<br>
<form action="{{ url('task/create') }}" method="POST" >
    {{ csrf_field() }}
    <div class="container form-group ">
        <label for="name"> Task name</label>
        <input type="text"  name="name" class="form-control" size="20">
        <br>
        <button type="submit" class="btn btn-primary" >Submit</button>
    </div>
</form>
@endsection