@extends('layouts.app')
@section('title','欢迎加入东大之声')
@section('content')
    <link href={{ URL::asset('css/style_common.css') }} rel="stylesheet">
    <link href={{ URL::asset('css/style1.css') }} rel="stylesheet">
    <div class="container">
        <div class="jumbotron">
            <div class="text-center">
                <h1>关于我们</h1>
            </div>
            <div class="visible-xs text-center">
                <small style="color:#0000C2">提示：长按图片以查看详情...</small>
            </div>
            <div class="main row">
                <div class="view view-first col-xs-3">
                    <img src="{{ URL::asset('img/icon.png') }}" />
                    <div class="mask">
                        <h2>东大之声简介</h2>
                        <p>梦想带你遇见东大
                            我们让你成为东大之声
                        </p>
                        <a href="/show/1" class="info">更多</a>
                    </div>
                </div>
                <div class="view view-first col-xs-3">
                    <img src="{{ URL::asset('img/boyin.jpg') }}" />
                    <div class="mask">
                        <h2>播音部</h2>
                        <p>负责广播节目的音频录制，参与校内大型文艺演出或担任主持。</p>
                        <a href="/show/2" class="info">更多</a>
                    </div>
                </div>
                <div class="view view-first  col-xs-3">
                    <img src="{{ URL::asset('img/hecheng.jpg') }}" />
                    <div class="mask">
                        <h2>合成部</h2>
                        <p>负责节目的录制、音频制作及广播设备的管理。</p>
                        <a href="/show/3" class="info">更多</a>
                    </div>
                </div>
                <div class="view view-first  col-xs-3">
                    <img src="{{ URL::asset('img/caibian.jpg') }}" />
                    <div class="mask">
                        <h2>采编部</h2>
                        <p>负责日常的新闻编辑、同期声的采访与写稿。</p>
                        <a href="/show/4" class="info">更多</a>
                    </div>
                </div>
            </div>
            <br/><br/>
            <p><a class="btn btn-primary btn-lg btn-block" href="/" role="button">返回</a></p>
        </div>
    </div>
@endsection