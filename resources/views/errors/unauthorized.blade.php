@extends('layouts.app')
@section('title','未授权的访问')
@section('content')
    <div class="container">
        <br/><br/>
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">访问未授权</h3>
            </div>
            <div class="panel-body">
                <p>未授权的访问。</p>
                <button class="btn btn-primary" onclick="history.go(-1)">返回</button>
            </div>
        </div>
    </div>
@endsection