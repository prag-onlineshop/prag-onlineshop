@extends('layouts.app')
@section('userprofile')
<div class="container">

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
                    @if($order->status == "Paid")
                    <form action="{{route('order.delete', $order->id)}}" method="post">
                    @method('DELETE')
                    <td><span>{{ $order->status }}
                    <button type="submit" class="btn btn-sm btn-danger" title="delete">x</button></span>
                    </td>
                    @csrf
                    </form>
                    @else
                    <td>{{ $order->status }}</td>
                    @endif
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
@endsection