@component('mail::message')
# Order Received

Dear {{ $order->buyer_name }}, your order, Order No. #{{$order->id}} has been received. We will send another email when it’s on the way home.

@component('mail::button', ['url' => $url])
Download Invoice
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
