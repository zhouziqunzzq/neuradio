@extends('layouts.app')
@section('title','欢迎加入东大之声')
@section('content')
    <style>
        .mycontainer{
            background-image: url({{ URL::asset('img/2.png') }});
            background-size: 100%;
        }
    </style>
    <div class="container mycontainer">
        <div style="margin:20px;">
            <div style="background-color: rgba(219,127,8, 0.7); border-radius:10px;
                padding-left:10px; padding-right:10px;">
                <br/>
                <div class="text-center" style="font-family: 微软雅黑; color:#ffffff;">
                   <h1>播音部简介</h1>
                </div>
                <hr/>
                <div class="row" style="font-family: 微软雅黑; font-size: 16px; padding:20px; color:#ffffff;">
                    <p>
                        传播东大好声音，传递东大正能量。
                        东大之声广播电台播音部<strong style="color:#0000C2">负责校园广播每日新闻、专题等栏目的音频录制工作</strong>。
                        作为学校“声音最动听”的学生组织，播音部经常与校电视台及主持团合作，
                        参加各类大型比赛与文艺演出。
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