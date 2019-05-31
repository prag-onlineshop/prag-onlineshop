@extends('layouts.app')
@section('content')
<div class="bg-overlay">
    <section id="cart_items">
        <div class="container d-flex justify-content-center">
            <div class="">
                <h3>Thanks For your Order :
                    <span style='color:green'>{{ucwords(Auth::user()->name)}}</span></h3>
            </div>
            <!--/breadcrums-->
        </div>
    </section>
</div>
@endsection