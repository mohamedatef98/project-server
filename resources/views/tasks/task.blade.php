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
        @if( (!$task->done) )
            <a class="submit" href="{{ route('view-submit',$task->id) }}">
                <button class="btn btn-primary ">Submit!</button>
            </a>
        @endif

        @if($subs->count() >= 1)
            <div class="list-group submissions">
                @foreach($subs as $sub)
                    <div class="list-group-item list-group-item-action flex-column align-items-start {{ $sub->checked ? ($sub->valid ? 'valid':'invalid') : 'pending' }}">
                        <h3>{{ (new \Illuminate\Support\Carbon($sub->created_at))->diffForHumans(Illuminate\Support\Carbon::now()) }}</h3>
                        <div class="d-flex w-100 justify-content-between">

                            @if($sub->github !== '')
                                <a href="http://{{ $sub->github }}">Git Hub Repo</a>
                            @endif

                            @if($sub->files !== '')
                                <a href="{{ asset('storage/submits/'.$sub->files) }}" download="{{ $sub->files }}">Files</a>
                            @endif

                            <a href="{{ route('detail-submit',$sub->id) }}">Details</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection