@component('mail::message')
# Order Received

Dear Admin, {{ $order->buyer_name }} has placed an order.

@component('mail::button', ['url' => $url])
View Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
