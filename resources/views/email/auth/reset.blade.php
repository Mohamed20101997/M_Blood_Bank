@component('mail::message')
# Introduction

Blood Bank Reset Password. 
<p>Hello {{ $user->name }}</p>

<p> Your reset Code is : {{ $user->code_verify }} </p>

@component('mail::button', ['url' => '#','color'=>'success' ])

Reset

@endcomponent



Thanks,<br>
{{ config('app.name') }}
@endcomponent
