@component('mail::message')
# Order Shipped

Dear customer, we’re excited to say that your order, Order No. #{{order->id}} has been shipped. We will send another email when it is delivered.

@component('mail::button', ['url' => $url])
View Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
