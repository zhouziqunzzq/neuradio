@extends('layouts.app')
@section('title','后台管理')
@section('content')
    <style>
        .mycontainer{
            margin:5%;
        }
    </style>
    <div class="mycontainer container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h1 class="panel-title text-center">东大之声网络招新后台管理</h1>
            </div>
            <div class="panel-body">
                <div class="text-center">
                    <a class="btn btn-primary" href="/admin/list/all" role="button">查看全部申请列表</a>
                    <br/><br/>
                    <a class="btn btn-primary" href="/admin/list/南湖校区" role="button">查看南湖校区申请列表</a>
                    <br/><br/>
                    <a class="btn btn-primary" href="/admin/list/浑南校区" role="button">查看浑南校区申请列表</a>
                    <br/><br/>
                    <a class="btn btn-danger" href="/auth/logout" role="button">注销</a>
                </div>
            </div>
        </div>
    </div>
@endsection