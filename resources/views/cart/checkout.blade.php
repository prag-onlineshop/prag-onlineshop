@extends('layouts.app')
@section('content')
<div class="bg-overlay">
<section class="hero hero-page gray-bg padding-small">
    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-9 order-2 order-lg-1">
                <br>
                <h2>Checkout</h2>
                <p class="lead text-muted">You currently have {{Cart::count()}} item(s) in your basket</p>
            </div>
        </div>
    </div>
</section>
<!-- Checout Forms-->
<div class="container">
<div class="table-responsive cart_info">
    <table class="table table-condensed">
        <thead>
        <tr>
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
        </tr>
        <tr class="cart_menu badge-info">
            <td class="image">Item</td>
            <td class="description"></td>
            <td class="price">Price</td>
            <td class="quantity">Quantity</td>
            <td class="total">Total</td>
            <td></td>
        </tr>
        </thead>
        <?php $count =1;?>
        @foreach($cartItems as $cartItem)
            <tbody>
            <tr>
                <td class="cart_product">
                    <a href="{{url('/product_details')}}/{{$cartItem->id}}"><img src="{{url('images',$cartItem->options->img)}}" alt="" width="200px"></a>
                </td>
                <td class="cart_description">
                    <h4><a href="{{url('/product_details')}}/{{$cartItem->id}}" style="color:blue">{{$cartItem->name}}</a></h4>
                    <p>Product ID: {{$cartItem->id}}</p>
                    <p>Only {{$cartItem->options->quantity}} left</p>
                </td>
                <td class="cart_price">
                    <p>${{$cartItem->price}}</p>
                </td>
                <td class="cart_quantity">
                    <form action="{{url('cart/update',$cartItem->rowId)}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="proId" value="{{$cartItem->id}}"/>
                    <div class="cart_quantity_button">
                        <input type="hidden" id="rowId" value="{{$cartItem->rowId}}"/>
                        <input type="hidden" id="proId" value="{{$cartItem->id}}"/>
                        <input type="number" size="2" value="{{$cartItem->qty}}" name="qty" id="upCart" autocomplete="off" style="text-align:center; max-width:50px; "  MIN="1" MAX="30">
                        <input type="submit" class="btn btn-primary" value="Update" styel="margin:5px">
                    </div>
                    </form>
                </td>
                <td class="cart_total">
                    <p class="cart_total_price">${{$cartItem->subtotal}}</p>
                </td>
                <td class="cart_delete">
                    <a class="cart_quantity_delete" style="background-color:red"
                        href="{{url('/cart/remove')}}/{{$cartItem->rowId}}"><i class="fa fa-times"></i></a>
                </td>
            </tr>
            <?php $count++;?>
            </tbody>
        @endforeach
    </table>
</div>
</div>s

<?php  // form start here ?>
<section class="checkout">
    <br><br>
    <div class="container .position-relative py-3 bg-light">
        <div class="row">
            <div class="col-lg-8">
                <div class="tab-content float-left">
                    <div id="address" class="active tab-block">
                        <form action="{{ url('/addCheckOut') }}" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <h1>Shipping Address</h1>
                            <div class="row">
                                <!-- <div class="form-group col-md-6">
                                    <label for="firstname" class="form-label">Display Name</label>
                                    <input id="firstname" type="text" name="fullname" placeholder="Display Name" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('fullname') }}</span>
                                </div> -->
                                <div class="form-group col-md-6">
                                    <label for="lastname" class="form-label">Contact</label>
                                    <input id="lastname" type="text" name="contact" placeholder="Contact" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('contact') }}</span>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="lastname" class="form-label">Adress</label>
                                    <textarea name="address" id="address" cols="30" rows="10" class="form-control"></textarea>
                                    
                                    <br>
                                    <span style="color:red">{{ $errors->first('address') }}</span>
                                </div>
        
                                <span>
                                    <input type="radio" name="payment_type" value="COD" checked="checked"> COD
                                </span>
                                <input type="radio" name="payment_type" value="paypal"> PayPal
                                <div class="row" style="height: 34px; margin-left: 15px;">
                                    
                                <input type="submit" value="Continue" class="btn btn-primary btn-sm">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 py-5">
                <div class="block-body order-summary">
                    <h6 class="text-uppercase">Order Summary</h6>
                    <p>Shipping and additional costs are calculated based on values you have entered</p>
                    <ul class="order-menu list-unstyled">
                        <li class="d-flex justify-content-between"><span>Order Subtotal </span><strong>${{Cart::subtotal()}}</strong></li>
                        <li class="d-flex justify-content-between"><span>Shipping and handling</span><strong>Free</strong></li>
                        <li class="d-flex justify-content-between"><span>Tax</span><strong>${{Cart::tax()}}</strong></li>
                        <li class="d-flex justify-content-between"><span>Total</span><strong class="text-primary price-total">${{Cart::total()}}</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
@endsection