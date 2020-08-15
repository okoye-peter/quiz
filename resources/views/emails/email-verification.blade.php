@component('mail::message')
# Welcome {{$user->name}}

@component('mail::button', ['url' => 'http://127.0.0.1/verify?code={{$user->verification_code}}'])
Verify Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
