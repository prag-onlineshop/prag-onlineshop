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

            <td>
                <form action="{{ url('admin/ordersid', $order->id) }}" method="post">
                @method('PATCH')
                <select name="status" id="status" style="border: none; align-text: center;">
                @foreach($order->statusOptions() as $statusOptionKey => $statusOptionValue)
                    <option value="{{$statusOptionValue}}" {{$order->status == $statusOptionKey ? 'selected' : ''}}>{{$statusOptionValue}}</option>
                @endforeach 
                </select>
                <button class="btn btn-sm btn-success float-right">save</button>
                @csrf
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{ url('admin/orders') }}" class="btn btn-primary">Back</a>
</div>

@endsection