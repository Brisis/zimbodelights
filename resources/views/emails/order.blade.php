@component('mail::message')
# Order successfully sent

Dear customer, your order has been received.

@component('mail::button', ['url' => $url])
Download Invoice
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
