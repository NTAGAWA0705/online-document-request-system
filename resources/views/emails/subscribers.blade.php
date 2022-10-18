@component('mail::message')
# Introduction

Dear {{$name}},<br>
Your account has been created and is ready.<br>
email: <b>{{$email}}</b>
password: <b>{{$password}}</b>

@component('mail::button', ['url' => env('APP_URL') . '/login'])
Login now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
