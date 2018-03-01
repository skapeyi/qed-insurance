@component('mail::message')
# Request Status Changed

Dear {{ $name }},<br>
The status of your insurance request, with reference number {{$ref_no}} has changed.
Please login to your account to track its progress.

Thanks,<br>
{{ config('app.name') }} Support Team
@endcomponent
