@extends('layouts.app')
@section('title','欢迎加入东大之声')
@section('content')
    <style>
        .mycontainer{
            background-image: url({{ URL::asset('img/1.png') }});
            background-size: 100%;
        }
    </style>
    <div class="container mycontainer">
        <div style="margin:20px;">
            <div style="background-color: rgba(219,127,8, 0.7); border-radius:10px;
                padding-left:10px; padding-right:10px;">
                <br/>
                <div class="text-center" style="font-family: 微软雅黑; color:#ffffff;">
                   <h1>东大之声简介</h1>
                </div>
                <hr/>
                <div class="row" style="font-family: 微软雅黑; font-size: 16px; padding:20px; color:#ffffff;">
                    <p>
                        东大之声广播电台始建于1988年，直属于东北大学党委宣传部，
                        建站28年来，广播电台秉承“传播好声音、传递正能量”的工作理念，
                        以宣传思想工作为中心，以文化引领为使命，不断推出有思想、有温度、有品质的作品，
                        为推进校园文化建设、营造良好校园文化氛围、丰富学生课余生活发挥了重要的作用。
                        广播电台播音范围涵盖南湖、浑南两个校区，每周制作节目六期，每天时长两小时，
                        现下设学生记者团一个，机构包括播音部、采编部与合成部。
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