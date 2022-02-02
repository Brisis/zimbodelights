@component('mail::message')
# Order successfully sent

Dear customer, your order was delivered.

@component('mail::button', ['url' => $url])
Download Invoice
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
