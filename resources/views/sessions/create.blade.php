@extends('layouts.default')

@section('title')
     登录
@stop

@section('content')
<div class="col-md-offset-2 col-md-8">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5>
                登录
            </h5>
        </div>
        <div class="panel-body">
            @include('shared._errors')


        	{!! Form::open(['method' => 'POST', 'route' => 'login', 'class' => 'form-horizontal']) !!}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                {!! Form::label('email', '邮箱') !!}
        	        {!! Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
                <small class="text-danger">
                    {{ $errors->first('email') }}
                </small>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                {!! Form::label('password', '密码') !!}
                      {!! Form::text('password', null, ['class' => 'form-control', 'required' => 'required']) !!}
                <small class="text-danger">
                    {{ $errors->first('password') }}
                </small>
            </div>
            <div class="checkbox">
                <label>
                    <input name="remember" type="checkbox">
                        记住我
                    </input>
                </label>
            </div>
            <div class="btn-group pull-right">
                {!! Form::submit("登录", ['class' => 'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
            <hr>
                <p>
                    还没账号？
                    <a href="/signup">
                        现在注册！
                    </a>
                </p>
            </hr>
        </div>
    </div>
</div>
@stop
