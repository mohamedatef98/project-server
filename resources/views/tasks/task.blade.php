@extends('mask')

@section('mask')
    <div class="task">
        <div class="title">
            @if($task->done)
                <h1>Finished Task</h1>
            @endif

            <h3>{{ $task->title }}</h3>
            <h3>Due To: {{ $task->due_to }}</h3>
        </div>
        <img src="{{ asset('imgs/tasks/'.$task->id.'.png') }}" alt="">

        <div class="description">{!! $task->description !!}</div>
        @if( (!$task->done && !$task->hasSubmitted(auth()->user())) )
            <a class="submit" href="{{ route('view-submit',$task->id) }}">
                <button class="btn btn-primary ">Submit!</button>
            </a>
        @endif
    </div>
@endsection