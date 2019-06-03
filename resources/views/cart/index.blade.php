@extends('layouts.app')
@section('content')



<div class="bg-overlay bg-light">
    <?php if ($cartItems->isEmpty()) { ?>
    <br>
    <section id="cart_items">
        <div class="container">
            <center>
                <h3><strong>No items in your cart</strong></h3>
            </center>
        </div>
    </section>
    <br>
    <br>
    <!--/#cart_items-->
    <?php } else { ?>
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{url('/')}}"></a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="row">
                <div id="updateDiv" class="col-sm-8">
                    <div class="table-responsive cart_info">
                        <table class="table table-condensed">
                            <thead>
                                <tr class="cart_menu">
                                    <td class="image">Image</td>
                                    <td class="description">Product</td>
                                    <td class="price">Price</td>
                                    <td class="quantity">Quantity</td>
                                    <td class="total">Total</td>
                                    <td>
                                    </td>
                                </tr>
                                @if(session('status'))
                                <div class="alert alert-success">
                                    {{session('status')}}
                                </div>
                                @endif
                                @if(session('error'))

                                <div class="alert alert-danger">
                                    {{session('error')}}
                                </div>
                                @endif
                            </thead>
                            <?php $count = 1; ?>
                            @foreach($cartItems as $cartItem)
                            <tbody>
                                <tr>
                                    <td class="cart_product">
                                        <p><img src="{{url('images',$cartItem->options->img)}}" class="img-responsive"
                                                width="70"></p>
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href="{{ url('productDetail',$cartItem->id) }}"
                                                style="color:blue">{{$cartItem->name}}</a></h4>
                                        <!-- <p>Product ID: {{$cartItem->id}}</p> -->
                                        @foreach($products as $product)
                                        @if($cartItem->id == $product->id)
                                        @if($product->quantity == 0)
                                        <p>No stock left</p>
                                        @else
                                        <p>{{$product->quantity}} left in stock</p>
                                        @php ($tot_prod = $product->quantity + $cartItem->qty)
                                        <p>Total: {{$tot_prod}}</p>
                                        @endif
                                        @endif
                                        @endforeach
                                    </td>
                                    <td class="cart_price">
                                        <p>{{$cartItem->price}}</p>
                                    </td>
                                    <td class="cart_quantity">
                                        @foreach($products as $product)
                                        @if($cartItem->id == $product->id)
                                        @php ($prod_max = $product->quantity + $cartItem->qty)
                                        <form action="{{url('cart/update',$cartItem->rowId)}}" method="post"
                                            role="form">
                                            <input type="hidden" name="_method" value="PUT">
                                            <input type="hidden" name="old_qty" value="{{$cartItem->qty}}">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <input type="hidden" name="proId" value="{{$cartItem->id}}" />
                                            <input type="number" size="2" value="{{$cartItem->qty}}" name="new_qty"
                                                id="upCart<?php echo $count; ?>" autocomplete="off"
                                                style="text-align:center; max-width:50px; border: none; " MIN="1"
                                                MAX="{{$prod_max}}">
                                            <input type="submit" class="btn btn-sm btn-primary" value="Update"
                                                styel="margin:5px">
                                        </form>
                                        @endif
                                        @endforeach
                                        <!--</div>-->
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price">{{$cartItem->subtotal}}</p>
                                    </td>
                                    <td class="cart_delete">
                                        <form action="{{url('/cart/remove')}}/{{$cartItem->rowId}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <input type="hidden" value="{{$cartItem->id}}" name="prod_id">
                                            <input type="hidden" value="{{$cartItem->qty}}" name="qty">
                                            <button class="btn btn-sm btn-secondary" type="submit">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php $count++; ?>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box">
                        <section id="do_action">
                            <h6 class="text-uppercase">Order Summary</h6>
                            <p>Shipping and additional costs are calculated based on values you have entered</p>
                            <!-- older  -->
                            <ul class="order-menu list-unstyled">
                                <li class="d-flex justify-content-between"><span>Order Subtotal
                                    </span><strong>{{ Cart::subtotal() }}</strong></li>
                                <!-- <li class="d-flex justify-content-between"><span>Shipping and handling</span><strong>Free</strong></li> -->
                                <li class="d-flex justify-content-between">
                                    @if (session()->has('coupon'))
                                    <span>Discount ({{ session()->get('coupon')['name'] }})</span>
                                    <form action="{{ route('coupons.destroy') }}" method="POST">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <button type="submit">Remove</button>
                                    </form>
                                    @endif
                                    @if (session()->has('coupon'))
                                    -{{ $amount }}
                                    @endif
                                </li>
                                <li class="d-flex justify-content-between">
                                    <span>Tax</span><strong>{{ Cart::tax() }}</strong>
                                </li>
                                <li class="d-flex justify-content-between"><span>Shipping
                                        cost</span><strong>Free</strong>
                                </li>
                                <li class="d-flex justify-content-between"><span>Total</span><strong
                                        class="text-primary price-total">{{ $newTotal }}</strong></li>
                            </ul>
                            <hr>
                            <div class="container">
                                <h6>Insert coupon code</h6>
                                @if (! session()->has('coupon'))
                                <form action="{{ route('coupons.store') }}" method="POST">
                                    @csrf
                                    <input type="text" name="coupon_code" id="coupon_code">
                                    <button type="submit" class="btn btn-sm btn-primary">Apply</button>
                                </form>
                                @endif
                            </div>
                            <div>
                                <!-- coupon -->
                                @if(count($errors) > 0)
                                <div class="spacer"></div>
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{!! $error !!}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                @if (session()->has('success_message'))
                                <div class="spacer"></div>
                                <div class="alert alert-sm alert-success">
                                    {{ session()->get('success_message') }}
                                </div>
                                @endif
                            </div>
                        </section>
                        <!--/#do_action-->
                    </div>
                    <div class="">
                        <br>
                        <a class="btn btn-primary check_out float-right" href="{{url('/')}}/checkout">Check Out</a>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#cart_items-->
    <?php } ?>
    @endsection
