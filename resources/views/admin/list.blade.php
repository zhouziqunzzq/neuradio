@extends('layouts.app')
@section('title','查看所有申请')
@section('content')
    <style>
        .mycontainer{
            margin:5%;
        }
    </style>
    <div class="mycontainer container">
        <div class="text-center">
            <h1>申请列表</h1>
        </div>
        <div class="text-right">
            <a href="/auth/logout">注销</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <tr>
                    <td>姓名</td>
                    <td>性别</td>
                    <td>学号</td>
                    <td>Email</td>
                    <td>手机</td>
                    <td>第一志愿</td>
                    <td>第二志愿</td>
                    <td>第三志愿</td>
                    <td>第四志愿</td>
                    <td>照片</td>
                </tr>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        @if ($student->gender == 'Male')
                            <td>男</td>
                        @else
                            <td>女</td>
                        @endif
                        <td>{{ $student->stunum }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->tel }}</td>
                        <td>{{ $student->applicant1 }}</td>
                        <td>{{ $student->applicant2 }}</td>
                        <td>{{ $student->applicant3 }}</td>
                        <td>{{ $student->applicant4 }}</td>
                        <td><a href="/photo/{{ $student->stunum }}" target="_blank">查看照片</a> </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection