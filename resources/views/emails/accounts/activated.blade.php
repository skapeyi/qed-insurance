@component('mail::message')
# {{ config('app.name') }} Account Changes

Dear {{$name}} <br />
This is to notify you that changes have been made to your account({{ $email }}) by an administrator. <br />

If you have any questions, please reply to this email.

Thanks,<br>
{{ config('app.name') }} Support Team
@endcomponent
