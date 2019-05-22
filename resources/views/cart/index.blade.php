@extends('layouts.app')
@section('content')

<div class="bg-overlay pt-3">
    <div class="container bg-white">

        <?php if ($cartItems->isEmpty()) { ?>
        <br>
        <br>
        <br>
        <section id="cart_items">
            <div class="container">
                <div align="center"> <img src="{{asset('dist/img/empty-cart.png')}}" /></div>
            </div>
        </section>
        <!--/#cart_items-->
        <?php } else { ?>
        <br>
        <br>
        <section id="cart_items">
            <div class="container">
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="{{url('/')}}"></a></li>
                        <li class="active">Shopping Cart</li>
                    </ol>
                </div>
                <div id="updateDiv">

                    <div class="table-responsive cart_info">
                        <table class="table table-condensed">
                            <thead>
                                <tr class="cart_menu">
                                    <td class="image">Image</td>
                                    <td class="description">Product</td>
                                    <td class="price">Price</td>
                                    <td class="quantity">Quantity</td>
                                    <td class="total">Total</td>
                                    <td></td>
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
                            <?php $count =1;?>
                            @foreach($cartItems as $cartItem)
                            <tbody>
                                <tr>
                                    <td class="cart_product">
                                        <p><img src="{{url('img',$cartItem->options->img)}}" class="img-responsive"
                                                width="250"></p>
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href="{{url('/product_detail')}}/{{$cartItem->id}}"
                                                style="color:blue">{{$cartItem->name}}</a></h4>
                                        <p>Product ID: {{$cartItem->id}}</p>
                                        <p>Only {{$cartItem->options->quantity}} left</p>
                                    </td>
                                    <td class="cart_price">
                                        <p>{{$cartItem->price}}</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <form action="{{url('cart/update',$cartItem->rowId)}}" method="post"
                                            role="form">

                                            <input type="hidden" name="_method" value="PUT">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <input type="hidden" name="proId" value="{{$cartItem->id}}" />
                                            <input type="number" size="2" value="{{$cartItem->qty}}" name="qty"
                                                id="upCart<?php echo $count;?>" autocomplete="off"
                                                style="text-align:center; max-width:50px; " MIN="1" MAX="1000">
                                            <input type="submit" class="btn btn-primary" value="Update"
                                                styel="margin:5px">
                                        </form>

                                        <!--</div>-->
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price">{{$cartItem->subtotal}}</p>
                                    </td>
                                    <td class="cart_delete">
                                        <button class="btn ">
                                            <a class="cart_quantity_delete" style="background-color:red"
                                                href="{{url('/cart/remove')}}/{{$cartItem->rowId}}"><span
                                                    class=" btn btn-danger">Remove Item</span></a>
                                        </button>
                                    </td>
                                </tr>
                                <?php $count++;?>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!--/#cart_items-->
        <section id="do_action">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="total_area">
                            <ul>
                                <li>Cart Sub Total <span>{{Cart::subtotal()}}</span></li>
                                <li>Eco Tax <span>{{Cart::tax()}}</span></li>
                                <li>Shipping Cost <span>Free</span></li>
                                <li>Total <span>{{Cart::total()}}</span></li>
                            </ul>
                            <a class="btn btn-default check_out" href="{{url('/')}}/checkout">Check Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/#do_action-->
        <?php } ?>
    </div>

</div>


@endsection