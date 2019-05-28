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
            <th>Date</th>
            <th>Product name</th>
            <th>Product Quantity</th>
            <th>Order Total</th>
            <th>Order Status</th>
        </tr>
        </thead>
        <tbody>
        @forelse($orders as $order)
        <tr>
            <td></td>
            <td>{{ $order->created_at }}</td>
            <td>{{ $order->name }}</td>
            <td>{{ $order->qty }}</td>
            <td>{{ $order->total }}</td>
            <td>{{ $order->status }}</td>
        </tr>
        @empty
        <tr>
            <td><h3 class="text-center">No Orders</h3></td>
        </tr>
        @endforelse
        </tbody>
    </table>
</div>

@endsection