@component('mail::message')
# Order successfully sent

Dear customer, your order has been shipped.

@component('mail::button', ['url' => $url])
Download Invoice
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
