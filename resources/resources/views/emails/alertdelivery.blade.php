@component('mail::message')
# Dear {{$agent}},

We wish to inform you that a new Delivery Request Is Underway Details for the delivery are as follows .

@component('mail::table')
| Sender       | Receiver      | Timelines|
| -------------|:-------------:| --------:|
| Sam          | James         | 26 march 202  |

@endcomponent


Regards,<br>
ESS Team


Thanks,<br>
{{ config('app.name') }}
@endcomponent