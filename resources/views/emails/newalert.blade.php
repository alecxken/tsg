@component('mail::message')
# Dear Colleague,

We wish to inform you that a new Whistle Blow  has been done .

Please log on to system to review the comments.
@component('mail::button', ['url' => 'http://10.32.1.102:400'])
View Details
@endcomponent


Regards,<br>
ESS Team


Thanks,<br>
{{ config('app.name') }}
@endcomponent