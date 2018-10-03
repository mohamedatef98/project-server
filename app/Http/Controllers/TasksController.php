<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index(Request $request){
        $available = \App\Task::where('done', 0)->get();

        return $available;
    }

}
