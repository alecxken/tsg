@component('mail::message')
# Dear {{$agentname}},

This is an Invoice for the delivery of <b>{{$ccy}} {{$amount}}</b> to {{$loc_delivery}}.

<i>“All responsesshould be sent to ESS-CIT@ecobank.com”</i>

Regards,<br>
ESS Team


Thanks,<br>
{{ config('app.name') }}
@endcomponent