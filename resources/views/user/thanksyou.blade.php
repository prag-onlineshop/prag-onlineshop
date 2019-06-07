@extends('layouts.app')
@section('content')
<div class="bg-overlay">
    <section id="cart_items">
        <div class="container d-flex justify-content-center">
            <div class="">
                <div class="d-flex justify-content-center align-item-center">
                    <div class="h2">Thank you for purchasing..
                        <span style='color:green'>{{ucwords(Auth::user()->name)}}</span>
                    </div>
                </div>
            </div>
            <!--/breadcrums-->
        </div>
    </section>
</div>
@endsection