@component('mail::message')
# Introduction

Dear {{ $name }},<br />
{{ $message }}

@component('mail::button', ['url' => config('app.url')])
Visit the portal
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
