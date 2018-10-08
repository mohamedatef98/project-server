<?php

namespace App\Http\Controllers;

use App\Meeting;
use Illuminate\Http\Request;

class MeetingsController extends Controller
{
    public function index(Request $request){
        $available = Meeting::latest()->get();

        return view('meetings.all')->with('meetings',$available);
    }

    public function view(Request $request, Meeting $meeting){

        $confirmed = $meeting->hasConfirmed($request->user());

        return view('meetings.meeting')->with('meeting',$meeting)->with('confirmed',$confirmed);
    }

    public function confirm(Request $request, Meeting $meeting){

        $confirmed = $meeting->hasConfirmed($request->user());

        if(! $confirmed || !$meeting->done){
            $user = $request->user();

            if($meeting->users == "")
                $meeting->users = $user->id;

            else
                $meeting->users = $meeting->users . "," . $user->id;

            $meeting->save();
        }

        return redirect()->back();
    }
}
