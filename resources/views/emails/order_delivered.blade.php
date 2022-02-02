@component('mail::message')
# Order Delivered

Dear customer, Your order was delivered!

@component('mail::button', ['url' => $url])
Download Invoice
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
