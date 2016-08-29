@extends('layouts.app')
@section('title','欢迎加入东大之声')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>This is a test.</h1>
            </div>
            <div class="col-md-4">
                <h2>{{ $str }}</h2>
            </div>
        </div>
    </div>
@endsection