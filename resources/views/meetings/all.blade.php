@extends('mask')

@section('mask')
    <div class="text-center">
        <h1>Our Meetings</h1>
        <div class="meetings">
            @foreach($meetings as $meeting)
                @if($meeting->done)
                    <a href="{{ route('view-meeting', $meeting->id) }}" class="done">
                        <h4>{{ $meeting->time }}</h4>
                    </a>
                @else
                    <a href="{{ route('view-meeting', $meeting->id) }}">
                        <h4>{{ "!!" . $meeting->time }}</h4>
                    </a>
                @endif
            @endforeach
        </div>
    </div>
@endsection

@section('title')
    Meetings
@endsection