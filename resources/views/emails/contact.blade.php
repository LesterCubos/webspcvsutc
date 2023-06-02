@component('mail::message')
Contact from {{$name}}
{{$subject}}
{{$message}}

@component('mail::button', ['url'=>'/'])
Visit us
@endcomponent

Thanks,<br>
{{config('app.name')}}
@endcomponent
