@component('mail::message')
Hey Guys !!!

A new task is added !!!

{{ $task->title }}

{{ $task->due_to }}

![Some option text][logo]

[logo]: {{ asset("/imgs/tasks/{$task->id}.png") }} "Logo"

{{ $task->description }}

@component('mail::button', ['url' => route('view-task', $task->id)])
View task !!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
