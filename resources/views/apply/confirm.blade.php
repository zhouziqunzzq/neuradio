@extends('layouts.app')
@section('title','欢迎加入东大之声')
@section('content')
    <div class="container">
        <div class="row text-center">
            <h1>请核对下列信息</h1>
        </div>
        <form class="form-horizontal" action="/save_apply" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">姓名</label>
                <div class="col-sm-10">
                    <input required readonly type="text" class="form-control" name="inputName" id="inputName" placeholder="姓名" value="{{ old('inputName') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputStunum" class="col-sm-2 control-label">学号</label>
                <div class="col-sm-10">
                    <input required readonly type="text" class="form-control" name="inputStunum" id="inputStunum" placeholder="学号" value="{{ old('inputStunum') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputTel" class="col-sm-2 control-label">手机</label>
                <div class="col-sm-10">
                    <input required readonly type="text" class="form-control" name="inputTel" id="inputTel" placeholder="手机" value="{{ old('inputTel') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input required readonly type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Email" value="{{ old('inputEmail') }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">性别</label>
                <div class="col-sm-10">
                    <input required readonly type="text" class="form-control" name="genderRadioOptions" id="genderRadioOptions"
                           @if (old('genderRadioOptions') == 'Male')
                               value="男"
                           @else
                               value="女"
                           @endif
                    >
                </div>
            </div>
            <div class="form-group">
                <label for="applicant1" class="col-sm-2 control-label">第一志愿</label>
                <div class="col-sm-10">
                    <input required readonly type="text" class="form-control" name="applicant1" id="applicant1" value="{{ old('applicant1') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="applicant2" class="col-sm-2 control-label">第二志愿（可选）</label>
                <div class="col-sm-10">
                    <input required readonly type="text" class="form-control" name="applicant2" id="applicant2" value="{{ old('applicant2') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="applicant3" class="col-sm-2 control-label">第三志愿（可选）</label>
                <div class="col-sm-10">
                    <input required readonly type="text" class="form-control" name="applicant3" id="applicant3" value="{{ old('applicant3') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="applicant4" class="col-sm-2 control-label">第四志愿（可选）</label>
                <div class="col-sm-10">
                    <input required readonly type="text" class="form-control" name="applicant4" id="applicant4" value="{{ old('applicant4') }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-offset-3 col-xs-3">
                    <button type="button" class="btn btn-warning" onclick="history.go(-1)">
                        返回修改
                    </button>
                </div>
                <div class="col-xs-6">
                    <button type="submit" class="btn btn-success">
                        提交申请
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection