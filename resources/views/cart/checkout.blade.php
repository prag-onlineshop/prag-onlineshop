@extends('layouts.app')
@section('content')
<div class="bg-overlay py-4">
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
    <!-- Checout Forms-->
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                <div class="container .position-relative py-3 bg-light table-responsive cart_info ">
                    <table class="table table-condensed overflow-hidden">
                        <thead>
                            <tr>
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
                                <div class="alert alert-success">
                                    {{ session()->get('success_message') }}
                                </div>
                                @endif
                            </tr>
                            <tr class="cart_menu">
                                <td class="image">Image</td>
                                <td class="name">Product Name</td>
                                <td class="price">Price</td>
                                <td class="quantity">Quantity</td>
                                <td class="total">Total</td>
                            </tr>
                        </thead>
                        <?php $count = 1; ?>

                        <tbody>
                            @foreach($cartItems as $cartItem)
                            <tr>
                                <td class="cart_product">
                                    <a href="{{url('/productDetail')}}/{{$cartItem->id}}"><img src="{{url('images',$cartItem->options->img)}}" alt="" style="width:50px; height:50px"></a>
                                </td>
                                <td class="cart_description">
                                    <h5><a href="{{url('/productDetail')}}/{{$cartItem->id}}" style="color:blue">{{$cartItem->name}}</a></h5>
                                </td>
                                <td class="cart_price">
                                    <p>₱{{$cartItem->price}}</p>
                                </td>
                                <td class="cart_quantity">
                                    <p>{{$cartItem->qty}}</p>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">₱{{$cartItem->subtotal}}</p>
                                </td>
                            </tr>
                            <?php $count++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <br><br>
            <div class="col-sm-5">
                <div class="box block-body order-summary">
                    <h5 class="text-uppercase text-center">Order Summary</h5>
                    <hr>
                    <ul class="order-menu list-unstyled">
                        <li class="d-flex justify-content-between"><span>Order Subtotal
                            </span><strong>{{ Cart::subtotal() }}</strong></li>
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
                        <li class="d-flex justify-content-between"><span>Tax</span><strong>{{ Cart::tax() }}</strong>
                        </li>
                        <li class="d-flex justify-content-between"><span>Shipping cost</span><strong>Free</strong>
                        </li>
                        <li class="d-flex justify-content-between"><span>Total</span><strong class="text-primary price-total">{{ $newTotal }}</strong></li>
                    </ul>

                </div>
                <!--ORDER SUMMARY-->
                <hr>
                <div class="box py-2">
                    <form action="{{ url('/addCheckOut') }}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <h3>Shipping Address</h3>
                        <div class="py-2">
                            <div class="form-group">
                                <span>
                                    <label for="contact" class="form-label">Contact Number:</label>
                                    <input id="contact" type="text" name="contact" placeholder="Contact" class="form-control">
                                </span>
                                <span style="color:red">{{ $errors->first('contact') }}</span>
                            </div>
                            <div class="form-group" class="form-label">
                                <label for="ship_add">Address</label>
                                <textarea id="ship_add" name="address" cols="30" rows="4" class="form-control"></textarea>
                                <br>
                                <span style="color:red">{{ $errors->first('address') }}</span>
                            </div>
                            <div>
                                <span class="p-3">
                                    <strong>Mode of Payment: &nbsp</strong>
                                    <input type="radio" name="payment_type" value="COD" checked="checked"> COD
                                    <input type="radio" name="payment_type" value="paypal"> PayPal
                                    <div class="row" style="height: 34px; margin-left: 15px;">
                                </span>
                            </div>
                            <div class="float-right">
                                <input type="submit" value="Place Order" class="btn btn-primary btn-sm float-right">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection