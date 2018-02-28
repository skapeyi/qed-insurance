@component('mail::message')
# Welcome

Dear {{ $name }},<br>
Thank you for joining CritiCare. <br>
You will be able to access your account once the administrator activates your account.


Thanks,<br>
{{ config('app.name') }} Support Team
@endcomponent
