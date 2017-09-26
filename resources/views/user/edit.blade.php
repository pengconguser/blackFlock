@extends('layouts.default')
@section('title', '更新个人资料')

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
            <form action="{{ route('users.update', $users->id )}}" method="POST">
                {{ method_field('PATCH') }}
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">
                        名称：
                    </label>
                    <input class="form-control" name="name" type="text" value="{{ $users->name }}">
                    </input>
                </div>
                <div class="form-group">
                    <label for="email">
                        邮箱：
                    </label>
                    <input class="form-control" disabled="" name="email" type="text" value="{{ $users->email }}">
                    </input>
                </div>
                <div class="form-group">
                    <label for="password">
                        密码：
                    </label>
                    <input class="form-control" name="password" type="password" value="{{ old('password') }}">
                    </input>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">
                        确认密码：
                    </label>
                    <input class="form-control" name="password_confirmation" type="password" value="{{ old('password_confirmation') }}">
                    </input>
                </div>
                <button class="btn btn-primary" type="submit">
                    更新
                </button>
            </form>
        </div>
    </div>
</div>
@stop
