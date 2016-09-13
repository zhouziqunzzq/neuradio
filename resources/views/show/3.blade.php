@extends('layouts.app')
@section('title','欢迎加入东大之声')
@section('content')
    <style>
        .mycontainer{
            background-image: url({{ URL::asset('img/3.png') }});
            background-size: 100%;
            background-repeat: no-repeat;
        }
    </style>
    <div class="container mycontainer">
        <div style="margin:20px;">
            <div style="background-color: rgba(219,127,8, 0.7); border-radius:10px;
                padding-left:10px; padding-right:10px;">
                <br/>
                <div class="text-center" style="font-family: 微软雅黑; color:#ffffff;">
                   <h1>合成部简介</h1>
                </div>
                <hr/>
                <div class="row" style="font-family: 微软雅黑; font-size: 16px; padding:20px; color:#ffffff;">
                    <p>
                        技术引领时代，创新驱动发展。
                        东大之声广播电台合成部<strong style="color:#0000C2">负责校园广播节目的后期剪辑、制作，
                        广播发射设备的管理、维护，校园网络广播电台的更新、栏目制作</strong>。
                        作为广播栏目最终制作成品并得以传播的核心部门，
                        合成部技术全面、创新能力强，制作出了大量的优秀作品。
                    </p>
                </div>
                <br/>
                <br/>
            </div>
            <br/><br/>
            <p><a class="btn btn-primary btn-lg btn-block" href="/show" role="button">返回</a></p>
        </div>
    </div>
@endsection