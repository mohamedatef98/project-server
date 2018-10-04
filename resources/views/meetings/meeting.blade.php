@extends('mask')

@section('mask')
        <div class="meeting text-center">
            @if($meeting->done)
                <h1>Finished Meeting</h1>
            @endif

            <h3>{{ $meeting->time }}</h3>
            <h3>{{ $meeting->location }}</h3>

            <p>{{ $meeting->info }}</p>

            @if( (!$meeting->done && !$confirmed) )
                <a href="{{ route('confirm-meeting',$meeting->id) }}">
                    <button class="btn btn-primary">Confirm!</button>
                </a>
            @endif
        </div>
@endsection