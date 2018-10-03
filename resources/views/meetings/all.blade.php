@extends('mask')

@section('mask')
    <div>
        <h1>Our Meetings</h1>
        <div class="meetings text-center">
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