@extends('layouts.default')
@section('title', '注册')

@section('content')
<div class="col-md-offset-2 col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5>
                注册
            </h5>
        </div>
            <div class="panel-body">
                {!! Form::open(['method' => 'POST', 'route' => 'users.store', 'class' => 'form-horizontal']) !!}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {!! Form::label('name', '账号名') !!}
              {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">
                        {{ $errors->first('name') }}
                    </small>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    {!! Form::label('password', '密码') !!}
              {!! Form::text('password', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">
                        {{ $errors->first('password') }}
                    </small>
                </div>
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    {!! Form::label('password_confirmation', '再输入一遍密码') !!}
                {!! Form::text('password_confirmation', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">
                        {{ $errors->first('password_confirmation') }}
                    </small>
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    {!! Form::label('email', '电子邮箱') !!}
                {!! Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">
                        {{ $errors->first('email') }}
                    </small>
                </div>
                <div class="btn-group pull-right">
                    {!! Form::reset("重置", ['class' => 'btn btn-warning']) !!}
              {!! Form::submit("提交", ['class' => 'btn btn-success']) !!}
                </div>
                {!! Form::close() !!}
            </div>
    </div>
</div>
@stop
