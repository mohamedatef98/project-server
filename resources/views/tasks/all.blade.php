@extends('mask')

@section('mask')

        <div class="tasks text-center">
            <h1>Our Tasks</h1>
            <div class="row">
                @foreach($tasks as $task)
                    <div class="col-sm-2 col-md-4">
                        <div class="card text-center">
                            <div class="img">
                                @if($task->done)
                                    <h3 class="done__label">DONE</h3>
                                @endif
                                <img class="card-img-top" src="{{ asset('/imgs/tasks/'.$task->id.'.png') }}" alt="Card image cap">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $task->title }}</h5>
                                <p class="card-text">{{ $task->due_to }}</p>
                                @if($task->done)
                                    <a href="{{ route('view-task',$task->id) }}" class="btn btn-danger done">Details</a>
                                @else
                                    <a href="{{ route('view-task',$task->id) }}" class="btn btn-primary">Details</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

@endsection