@component('mail::message')
# Order successfully sent

Dear customer, your order has been received. It will be delivered in 10 days

@component('mail::button', ['url' => '/'])
Continue Shopping
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
