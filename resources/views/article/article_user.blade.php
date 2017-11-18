@extends('layouts.article')

@section('title')
   {{ $user->name }}的个人中心
@stop

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-3 hidden-sm hidden-xs user-info">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="media">
                    <div align="center">
                        <img class="thumbnail img-responsive" height="300px" src="{{ $user->avatar }}" width="300px">
                        </img>
                    </div>
                    <div class="media-body">
                        <hr>
                            <h4>
                                <strong>
                                    个人简介
                                </strong>
                            </h4>
                            <p>
                                {{ $user->introduction }}
                            </p>
                            <hr>
                                <h4>
                                    <strong>
                                        注册于
                                    </strong>
                                </h4>
                                <p>
                                    {{ $user->created_at->diffForHumans() }}
                                </p>
                            </hr>
                        </hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <span>
                    <h1 class="panel-title pull-left" style="font-size:30px;">
                        {{ $user->name }}
                        <small>
                            {{ $user->email }}
                        </small>
                    </h1>
                </span>
            </div>
        </div>
        <hr>
                  {{-- 用户发布的内容 --}}
        <div class="panel panel-default">
            <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li class="{{ active_class(if_query('tab', null)) }}"> <a href="{{ route('user.article', $user->id) }}">Ta 的话题</a></li>
                    <li class="{{ active_class(if_query('tab', 'articles')) }}"> <a href="{{ route('user.article', [$user->id, 'tab' => 'articles']) }}">Ta 的回复</a></li>
                </ul>
                @if (if_query('tab', 'articles'))
                    @include('user._comments', ['comments' => $user->comments()->with('article')->paginate(5)])
                @else
                    @include('user._article', ['articles' => $user->articles()->paginate(5)])
                @endif
            </div>
        </div>
        </hr>
    </div>
</div>
@stop
