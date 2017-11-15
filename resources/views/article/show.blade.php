@extends('layouts.article')

@section('title', $article->title)

@section('content')

<div class="row">

    <div class="col-lg-3 col-md-3 hidden-sm hidden-xs author-info">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="text-center">
                    作者：{{ $article->user->name }}
                </div>
                <hr>
                <div class="media">
                    <div align="center">
                        <a href="{{ route('users.show', $article->user->id) }}">
                            <img class="thumbnail img-responsive" src="{{ $article->user->gravatar($article->user->id) }}" width="300px" height="300px">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 article-content">
        <div class="panel panel-default">
            <div class="panel-body">
                <h1 class="text-center">
                    {{ $article->title }}
                </h1>

                <div class="article-meta text-center">
                    {{ $article->created_at->diffForHumans() }}
                    ⋅
                    <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                    {{ $article->hits }}
                </div>

                <div class="article-body">
                    {!! $article->content !!}
                </div>

                <div class="operate">
                    <hr>
                    <a href="{{ route('article.edit', $article->id) }}" class="btn btn-default btn-xs" role="button">
                        <i class="glyphicon glyphicon-edit"></i> 编辑
                    </a>
                    <a href="#" class="btn btn-default btn-xs" role="button">
                        <i class="glyphicon glyphicon-trash"></i> 删除
                    </a>
                </div>

            </div>
        </div>

                {{-- 用户回复列表 --}}
        <div class="panel panel-default article-reply">
            <div class="panel-body">
                @includeWhen(Auth::check(), 'article.layouts._comment_box', ['article' => $article])
                @include('article.layouts._comment_list', ['comments' => $comments])
            </div>
        </div>
    </div>
</div>
@stop