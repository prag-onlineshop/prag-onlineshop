@extends('layouts.adminLayout')

@section('title')
Orders List
@endsection

@section('orders')

<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>User</th>
            <th>Contact</th>
            <th>Address</th> 
            <th>Date</th>
            <th>Products</th>
            <th>Product Quantity</th>
            <th>Order Total</th>
            <th>Order Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->users->name }}</td>
            <td>{{ $order->users->contact }}</td>
            <td>{{ $order->users->address }}</td>
            <td>{{ $order->created_at }}</td>
            
            <td>
            @foreach($order->carts_product as $cp)
                {{ $cp->products->name }}<br/>
            @endforeach
            </td>
            <td>
            @foreach($order->carts_product as $cp)
                {{ $cp->qty }}<br/>
            @endforeach
            </td>
            <td>
            @foreach($order->carts_product as $cp)
                {{ $cp->total }}<br/>
            @endforeach
            </td>

            <td>{{ $order->status }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection