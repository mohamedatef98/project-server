@extends('mask')


@section('mask')
    <div class="submission">
        <div class="task-info">
            <a href="{{ route('view-task',$sub->task_id) }}">
                <h2>Task: {{ $sub->task->title }}</h2>
            </a>
        </div>
        <div class="task-img">
            <img src="{{ asset('imgs/tasks/'.$sub->task->id.'.png') }}" alt="">
        </div>
        <div class="submission-status">
            @if($sub->checked == 0)
                Pending
            @else
                Checked ->
                @if( $sub->valid == 1)
                    <span class="valid">Valid</span>
                @else
                    <span class="invalid">Invalid</span>
                @endif
            @endif
        </div>
        @if($sub->details !== '' && $sub->checked)
            <div class="submission-details">
                <p>
                    {!! $sub->details !!}
                </p>
            </div>
        @endif

        <div class="list-group">
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
        </div>
    </div>
@endsection