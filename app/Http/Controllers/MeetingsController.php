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

        $confirmed = Meeting::confirmed($request->user()->id, $meeting);

        //return $confirmed? 't': 'f';

        return view('meetings.meeting')->with('meeting',$meeting)->with('confirmed',$confirmed);
    }

    public function confirm(Request $request, Meeting $meeting){

        $confirmed = Meeting::confirmed($request->user()->id, $meeting);

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
