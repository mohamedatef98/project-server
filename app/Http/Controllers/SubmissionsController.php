<?php

namespace App\Http\Controllers;

use App\Submission;
use App\Task;
use Illuminate\Http\Request;

class SubmissionsController extends Controller
{
    public function index(Task $task){
        return view('submissions.submit')->with('task',$task);
    }

    public function store(Request $request, Task $task){

        $request->validate([
            'files' => array('string', 'required'),
        ]);

        Submission::create([
            'user_id' => auth()->user()->id,
            'task_id' => $task->id,
            'files' => $request->input('files')
        ]);

        return redirect()->route('view-task',$task->id);
    }

    public function details(Request $request, Submission $submission){
        if($submission->user->id === auth()->user()->id)
            return view('submissions.details')->with('sub',$submission);
        else
            return redirect()->back();
    }
}
