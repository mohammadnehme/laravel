<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except'=>['index']]);
    }

    public function index() {
        return view('tasks.index');
    }
    
    public function show(){
        $user_id= auth()->user()->id;
        $user=User::find($user_id);
        return view('home')->with('tasks',$user->task);
    }

    public function create(){
        return view('tasks.create');
    }

    public function store(Request $request){
        $this->validate($request,['name'=> 'required']);
        $task=new Task;
        $task->name=$request->name;
        $task->user_id=auth()->user()->id;
        $task->save();
        return redirect('/home')->with('success','Task created Successfuly');     
    }
    public function edit($id)
    {
        $task=Task::find($id);


        //Check for correct user

        if(auth()->user()->id !== $task->user_id){
            return redirect('/home')->with('error','You cant edit that post');
        }

        return view('tasks.update')->with('task',$task);

    }
    
    
    
    public function update(Request $request){
        
        $task=Task::find($request->id);
        $this->validate($request,['name' => 'required|max:255']);
        $task->name=$request->name;
        $task->user_id=auth()->user()->id;
        $task->save();
        return redirect('/home')->with('success','Task updated ');
    }

    public function destroy(Request $request){
  
        $task=Task::find($request->id);
        if(auth()->user()->id != $task->user_id){
            return redirect('/home')->with('error','Unauthorized access');
        }
        $task->delete();
        return redirect('/home')->with('success','Task deleted');

    }
}

