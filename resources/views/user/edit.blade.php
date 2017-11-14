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
            <form action="{{ route('users.update', $users->id )}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
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

                <div class="form-group">
                    <label for="" class="avatar-label">用户头像</label>
                    <input type="file" name="avatar">

                    @if($users->avatar)
                        <br>
                        <img class="thumbnail img-responsive" src="{{ $users->avatar }}" width="200" />
                    @endif
                </div>
                <button class="btn btn-primary" type="submit">
                    更新
                </button>
            </form>
        </div>
    </div>
</div>
@stop
