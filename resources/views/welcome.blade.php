@extends('layouts.app')
@section('title','欢迎加入东大之声')
@section('content')
    <style>
        .myjumbo{
            padding:5%;
        }
    </style>
    <div class="jumbotron myjumbo">
        <h1 class="text-center">欢迎加入东大之声</h1>
        <img src="{{ URL::asset('img/icon.png') }}" class="img-responsive center-block" alt="Responsive image">
        <br/>
        <h4 class="text-right">聚焦天下万事，臧否校园点滴。</h4>
        <p><a class="btn btn-warning btn-lg btn-block" href="/show" role="button">了解更多</a></p>
        <p><a class="btn btn-primary btn-lg btn-block" href="/apply" role="button">立即报名</a></p>
    </div>
@endsection