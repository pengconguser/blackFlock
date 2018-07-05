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
            <div class="col-md-12">
                {!! Form::open(['method' => 'POST', 'route' => 'login', 'class' => 'form-horizontal']) !!}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    {!! Form::label('email', '邮箱') !!}
                    {!! Form::text('email', null, ['class' => 'form-control', 'required' => 'required','id'=>'name']) !!}
                    <small class="text-danger">
                        {{ $errors->first('email') }}
                    </small>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    {!! Form::label('password', '密码') !!}
                {!! Form::password('password', ['class' => 'form-control', 'required' => 'required','id'=>'password']) !!}
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
            </div>
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


@push('scripts')
    {{-- 为登录用户生成access_token --}}
    <script type="text/javascript">
       $('.form-horizontal').submit(function(e){
            if(!$.cookie('access_token')){
                 $.ajax({
                    type:'POST',
                    contentType: "application/json",
                    url:"/oauth/token",

                    data: JSON.stringify(
                          {
                             "username": $('#name').val(),
                             'password':$('#password').val(),
                             // "platform": "app",
                             "grant_type": "password",
                             "client_id": 2,
                             "client_secret": "8CSszE7wmvBhB2q5tmCxbyYFwqSf6F3xsub3DFPB",
                          }
                    ),

                    success(response) {                  
                       $.cookie('access_token',response.access_token);
                    },

                    error(error){
                       console.log(error);
                    }
                 })
            }
            e.preventDefault();
       });
    </script>
@endpush


