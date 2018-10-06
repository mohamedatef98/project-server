@component('mail::message')
Hey Guys !!!

A new meeting is added !!!

{{ $meeting->location }}

{{ $meeting->time }}

{{ $meeting->info }}

@component('mail::button', ['url' => route('confirm-meeting', $meeting->id)])
Confirm Meeting !!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
