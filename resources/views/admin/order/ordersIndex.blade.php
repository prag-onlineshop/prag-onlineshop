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
            <th>Action</th>
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
                <b>{{ $order->carts_product->count('products.name') }}</b>&nbsp/&nbsp products
            </td>
            <td>
                <b>{{ $order->carts_product->sum('qty') }}</b>&nbsp/&nbsp quantity
            </td>
            <td>{{ $order->total }}</td>
            <td>{{ $order->status }}</td>
            <td><a href="{{ url('admin/ordersid/' . $order->id) }}">View</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection