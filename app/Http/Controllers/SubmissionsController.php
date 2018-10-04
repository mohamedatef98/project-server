<?php

namespace App\Http\Controllers;


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
                             'image', "required_without_all:github")
        ]);

        $user = auth()->user();
        $submission = new \App\Submission;

        $submission->user_id = auth()->user()->id;
        $submission->task_id = $task->id;

        $submission->github = $request->input('github');

        $path = "";

        if($request->hasFile('files')){
            $ext = $request->file('files')->extension();
            $path = "{$task->id}_{$user->id}.{$ext}";
            $request->file('files')->storeAs("public/submits",$path);

        }

        $submission->files = $path;

        $submission->save();

        return $submission;
        return redirect()->back();
    }
}
