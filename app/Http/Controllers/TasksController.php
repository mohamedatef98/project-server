<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index(Request $request){
        $tasks = \App\Task::latest()->get();

        return view('tasks.all')->with('tasks',$tasks);
    }

    public function view(Request $request, Task $task){
        $subs = $task->submissions->where('user_id', $request->user()->id);
        return view('tasks.task')->with('task',$task)->with('subs', $subs);
    }

}
