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
            'github' => array('string','regex:/github.com/', 'required_without_all:files' , 'nullable'),
            'files' => array('file', 'mimes:png,gif,jpg,jpeg,zip,rar,bmp', 'max:10240',
                              "required_without_all:github")
        ]);

        $user = auth()->user();
        $submission = new \App\Submission;

        $submission->user_id = auth()->user()->id;
        $submission->task_id = $task->id;

        $submission->github = $request->input('github') ? $request->input('github') : '';

        $path = "";

        if($request->hasFile('files')){
            $previous_submissions = 0;

            if($task->submissions->count() > 0)
                $previous_submissions = $task->submissions->count();

            $ext = $request->file('files')->extension();
            $path = "{$task->id}_{$user->id}_{$previous_submissions}.{$ext}";
            $request->file('files')->storeAs("public/submits",$path);

        }

        $submission->files = $path;

        $submission->save();

        //return $submission;
        return redirect()->route('view-task',$task->id);
    }

    public function details(Request $request, Submission $submission){
        if($submission->user->id === auth()->user()->id)
            return view('submissions.details')->with('sub',$submission);
        else
            return redirect()->back();
    }
}
