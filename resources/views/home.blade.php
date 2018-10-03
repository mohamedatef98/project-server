@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-bottom: 3rem">
        <div class="col-md-10 col-lg-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header">Meetings</div>

                <a href="{{ route('view-tasks') }}">
                    <div class="card-body main-card">
                        <img src="{{ asset('imgs/meeting.png') }}" alt="">
                    </div>
                </a>
            </div>
        </div>
        <div class="col-5">
            <div class="card">
                <div class="card-header">Tasks Submission</div>

                <a href="{{ route('view-tasks') }}">
                    <div class="card-body main-card">
                        <img src="{{ asset('imgs/task.png') }}" alt="">
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

