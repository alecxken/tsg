@component('mail::message')
# Dear {{$agentname}},

We wish to inform you that a new Delivery Request Is Underway Details for the delivery are as follows are on the attached file

<i>“All responsesshould be sent to ESS-CIT@ecobank.com”</i>

Regards,<br>
ESS Team


Thanks,<br>
{{ config('app.name') }}
@endcomponent