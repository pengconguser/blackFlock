@extends('layouts.default')

@section('title')
  修改资料
@stop

@section('content')
<div class="col-md-offset-2 col-md-8">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5>
                更新个人资料
            </h5>
        </div>
        <div class="panel-body">
            @include('shared._errors')
            <div class="gravatar_edit">
                <a href="http://gravatar.com/emails" target="_blank">
                    <img alt="{{ $users->name }}" class="gravatar" src="{{ $users->gravatar('200') }}"/>
                </a>
            </div>
            {!! Form::open(['method' => 'POST', 'route' => ['users.update','$user->id'], 'class' => 'form-horizontal']) !!}
            
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {!! Form::label('name', '用户名字') !!}
                    {!! Form::text('name', $users->name, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    {!! Form::label('email', '邮箱') !!}
                    {!! Form::text('email', $users->email, ['class' => 'form-control', 'required' => 'required','disabled']) !!}
                    <small class="text-danger">{{ $errors->first('email') }}</small>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    {!! Form::label('password', '密码') !!}
                    {!! Form::text('password', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('password') }}</small>
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    {!! Form::label('password_confirmation', '确认密码') !!}
                    {!! Form::text('password_confirmation', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                </div>

            
                <div class="btn-group pull-right">
                    {!! Form::submit("确认修改", ['class' => 'btn btn-success']) !!}
                </div>
            
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop
