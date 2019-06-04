@extends('layouts.adminLayout')

@section('title')
Admin Settings
@endsection

@section('settings')
@foreach($settings as $setting)
<p>{{$setting->title}}-</p>
@endforeach
@endsection