@extends('layouts.app')
@section('title','欢迎加入东大之声')
@section('content')
    <style>
        .mycontainer{
            background-image: url({{ URL::asset('img/4.png') }});
            background-size: 100%;
        }
    </style>
    <div class="container mycontainer">
        <div style="margin:20px;">
            <div style="background-color: rgba(219,127,8, 0.7); border-radius:10px;
                padding-left:10px; padding-right:10px;">
                <br/>
                <div class="text-center" style="font-family: 微软雅黑; color:#ffffff;">
                   <h1>采编部简介</h1>
                </div>
                <hr/>
                <div class="row" style="font-family: 微软雅黑; font-size: 16px; padding:20px; color:#ffffff;">
                    <p>
                        以笔为舟，记录校园生活，以梦为马，传承中华文化。
                        东大之声广播电台采编部<strong style="color:#0000C2">承担着校园广播所有新闻节目的文字素材的搜集、编辑，
                        同期声新闻的策划、采访，专题节目的策划与采写等工作</strong>，
                        作为为电台节目提供文字材料的部门，
                        采编部具备着扎实的文字功底和高超的构思策划能力。
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