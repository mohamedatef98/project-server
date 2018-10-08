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
        $subs = \App\Submission::where('task_id', $task->id)->where('user_id',auth()->user()->id)->latest()->get();
        return view('tasks.task')->with('task',$task)->with('subs', $subs);
    }

}
