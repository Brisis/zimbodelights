@component('mail::message')
# Order Delivered

Dear {{ $order->buyer_name }}, your order, Order No. #{{$order->id}} has been delivered. Please let us know if you have any questions.

@component('mail::button', ['url' => $url])
Download Invoice
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
