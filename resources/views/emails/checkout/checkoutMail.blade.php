@component('mail::message')
# Greetings from Prag Onlineshop!
<h3>To: {{$name->name}}</h3>

<p>We already received your order.</p>

<strong>Order Details</strong>
@component('mail::table')
| Item | Price | Qty | Total |
|:-------------:|:-------------:|:----:|:---------:|
@foreach($products as $product)
| {{$product->name}} | {{$product->price}} | {{$product->qty}} | {{$product->total}}
@endforeach
| ** | ** | Subtotal | {{ $total }} |
| ** | ** | Discount | {{$discount}} |
| ** | ** | Total | {{$newTotal}} |

@endcomponent

<p>To check your orders, just click the button below. </p>

@component('mail::button', ['url' => 'http://localhost:8000/orders'])
Check Orders
@endcomponent

Thank you!
@endcomponent