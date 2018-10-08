@extends('mask')


@section('mask')
    <div class="submission">
        <div class="task-info">
            <a href="{{ route('view-task',$sub->task_id) }}">
                <h2>Task: {{ $sub->task->title }}</h2>
            </a>
        </div>
        <div class="task-img">
            <img src="{{ $sub->task->img }}" alt="">
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


                        <a target="_blank" href="{{ $sub->files }}">Files</a>

                    </div>
                </div>
        </div>
    </div>
@endsection

@section('title')
    Submission Details
@endsection