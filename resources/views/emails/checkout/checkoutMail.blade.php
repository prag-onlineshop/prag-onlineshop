@component('mail::message')
# Greetings from Prag Onlineshop!
<h3>To: {{$name->name}}</h3>

<p>We already received your order.</p>

<strong>Order Details</strong>
@component('mail::table')
| Item          | Price         | Qty  |
| ------------- |:-------------:|:----:|
@foreach($products as $product)
| {{$product->name}} | {{$product->price}} | {{$product->qty}} |
@endforeach
@endcomponent

<p>To check your orders, just click the button below. </p>

@component('mail::button', ['url' => 'localhost:8000/orders'])
Check Your Orders
@endcomponent

Thank you!
@endcomponent
