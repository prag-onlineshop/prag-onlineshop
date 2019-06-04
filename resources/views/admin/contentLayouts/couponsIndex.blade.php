@extends('layouts.adminLayout')

@section('title')
Coupons List
@endsection

@section('coupons')
<link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
    <div id="app">
        <coupon-crud/>
    </div>
<script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
@endsection