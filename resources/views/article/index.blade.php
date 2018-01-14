@extends('layouts.article')

@section('title', isset($category) ? $category->name : '话题列表')

@section('content')

<div class="row">
    <div class="col-lg-9 col-md-9 topic-list">

        @if (isset($category))
            <div class="alert alert-info" role="alert">
                {{ $category->name }} ：{{ $category->description }}
            </div>
        @endif

        <div class="panel panel-default">
            <div class="panel-heading">
                <search></search>
                <ul class="nav nav-pills">
                   <li class="{{ active_class(( ! if_query('order', 'recent') )) }}"><a href="{{ Request::url() }}?order=default">最后回复</a></li>
                    <li class="{{ active_class(if_query('order', 'recent')) }}"><a href="{{ Request::url() }}?order=recent">最新发布</a></li>
                </ul>
            </div>

            <div class="panel-body">
                {{-- 话题列表 --}}
                @include('article.layouts._article_list', ['articles' => $articles])
                {{-- 分页 --}}
                {!! $articles->render() !!}
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 sidebar">
        @include('article.layouts._article')
        
        <article-commend></article-commend>
    </div>
</div>

@endsection