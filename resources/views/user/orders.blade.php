@extends('layouts.app')
@section('userprofile')
<div class="bg-overlay py-4">
    <div class="container  bg-light">
        <div class="table-responsive">
            <table class="table table-hover table-stripped">
                <thead>
                    <tr>
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
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->qty }}</td>
                        <td>{{ $order->total }}</td>
                        <td>{{ $order->status }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td>
                            <h3 class="text-center">No Orders</h3>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection