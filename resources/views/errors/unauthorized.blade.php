@extends('layouts.app')
@section('title','未授权的访问')
@section('content')
    <style>
        .myalert{
            padding:10px;
            margin:100px;
        }
    </style>
    <div class=myalert alert-danger text-center">
        <h1>啊哦，访问未授权，请重试QAQ</h1>
    </div>
@endsection