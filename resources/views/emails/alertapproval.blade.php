@component('mail::message')
# Dear Team,

We wish to inform you that a new Data Capture Process referenced {{$agent->ref_token}} has been done please log into Ess System to Approve Or Reject .

@component('mail::button', ['url' => ''])
View Details
@endcomponent


Regards,<br>
ESS Team


Thanks,<br>
{{ config('app.name') }}
@endcomponent