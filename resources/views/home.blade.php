@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <button class="btn btn-primary float-right"><a href="/tasks" style="text-decoration: none;color:white">Create a Task</a></button>
                </div>
                <h4 class="text-center"> Your tasks</h4>
                @if(count($tasks)>0)
                <table class="table table-border">
                  <tr>
                      <th> Task name</th>
                      <th> created at </th>
                      <th> Edit  </th>
                      <th> Delete</th>
                  </tr>  
                  @foreach ($tasks as $task)
                      <tr>
                          <td>{{$task->name}}</td>
                          <td>{{$task->created_at}}</td>
                          <td><a href="/task/edit/{{$task->id}}"><button class="btn btn-success">Edit</button></a></td>
                          <td><form action="{{ url('task/delete') }}" method="POST">    {{ csrf_field() }} <input type="hidden" name="id" value="{{$task->id}}"><button class="btn btn-danger">Delete</button></form></td>
                      </tr>
                  @endforeach
                </table>
                @else
                <h5 class="text-center"> No Tasks found</h4>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
