@extends('mask')

@section('mask')
        <div class="meeting text-center">

            <h3 class="{{ $meeting->done ? 'done' : '' }}" >{{ $meeting->time }}</h3>
            <h3 class="{{ $meeting->done ? 'done' : '' }}" >{{ $meeting->location }}</h3>

            <p>{!! $meeting->info !!}</p>

            @if( (!$meeting->done && !$confirmed) )
                <a href="{{ route('confirm-meeting',$meeting->id) }}">
                    <button class="btn btn-primary">Confirm!</button>
                </a>
            @endif

            @if( $meeting->done )
                <h3 class="label">
                    DONE
                </h3>
            @endif

            @if( !$meeting->done && $confirmed )
                <h3 class="label">
                    CONFIRMED
                </h3>
            @endif
        </div>
@endsection