@component('mail::message')

Welcome {{ $data['data']->name }} <br>

The body of your message.

@component('mail::button', ['url' => aurl('reset/password/'.$data['token'])])
Click Here For Reset Password
@endcomponent
OR <br>
Copy This Link
<a href="aurl('reset/password/'.$data['token'])">{{ aurl('reset/password/'.$data['token']) }}</a>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
