@component('mail::message')
# Welcome {{$name}}

Laravel Mail Test

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
