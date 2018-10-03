@extends('layouts.app')

@section('content')
    <div class="welcome text-center">
        <h1>CSE 2018 SW Engineering Project</h1>
        @auth
            <a href="{{ route('home') }}">
                <button class="btn btn-primary">
                    Go to Dashboard
                </button>
            </a>
        @endauth
    </div>
@endsection