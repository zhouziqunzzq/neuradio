@extends('layouts.app')
@section('title','信息填写')
@section('content')
    <div class="container">
        <div class="row text-center">
            <h1>请填写下列信息</h1>
        </div>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="form-horizontal" action="/validate_apply" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">姓名</label>
                <div class="col-sm-10">
                    <input required type="text" class="form-control" name="inputName" id="inputName" placeholder="姓名" value="{{ old('inputName') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputStunum" class="col-sm-2 control-label">学号</label>
                <div class="col-sm-10">
                    <input required type="text" class="form-control" name="inputStunum" id="inputStunum" placeholder="学号" value="{{ old('inputStunum') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="campus" class="col-sm-2 control-label">校区</label>
                <div class="col-sm-10">
                    <select required class="form-control" name="campus" id="campus">
                        <option value="南湖校区">南湖校区</option>
                        <option value="浑南校区">浑南校区</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputTel" class="col-sm-2 control-label">手机</label>
                <div class="col-sm-10">
                    <input required type="text" class="form-control" name="inputTel" id="inputTel" placeholder="手机" value="{{ old('inputTel') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input required type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Email" value="{{ old('inputEmail') }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">性别</label>
                <div class="col-sm-10">
                    <label class="radio-inline">
                        <input required type="radio" name="genderRadioOptions" id="Male" value="Male"
                               @if (old('genderRadioOptions') == 'Male')
                                   checked
                               @endif
                        > 男
                    </label>
                    <label class="radio-inline">
                        <input required type="radio" name="genderRadioOptions" id="Female" value="Female"
                               @if (old('genderRadioOptions') == 'Female')
                                   checked
                               @endif
                        > 女
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="photoFile" class="col-sm-2 control-label">上传一张靓照</label>
                <div class="col-sm-10">
                    <input required type="file" id="photoFile" name="photoFile">
                    <p class="help-block">请选择一张照片...</p>
                </div>
            </div>
            <div class="form-group">
                <label for="applicant1" class="col-sm-2 control-label">第一志愿</label>
                <div class="col-sm-10">
                    <select required class="form-control" name="applicant1" id="applicant1">
                        <option value="播音">播音</option>
                        <option value="合成">合成</option>
                        <option value="采编">采编</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="applicant2" class="col-sm-2 control-label">第二志愿（可选）</label>
                <div class="col-sm-10">
                    <select class="form-control" name="applicant2" id="applicant2">
                        <option value="无">无</option>
                        <option value="播音">播音</option>
                        <option value="合成">合成</option>
                        <option value="采编">采编</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="applicant3" class="col-sm-2 control-label">第三志愿（可选）</label>
                <div class="col-sm-10">
                    <select class="form-control" name="applicant3" id="applicant3">
                        <option value="无">无</option>
                        <option value="播音">播音</option>
                        <option value="合成">合成</option>
                        <option value="采编">采编</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-6 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        提交申请
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection