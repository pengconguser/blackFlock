@extends('layouts.article')

@section('title')
    搜索到的内容
@stop

@section('content')
    <div class="col-lg-9 col-md-9 topic-list">
        <div class="panel panel-default">
            <div class="panel-body">
                {{-- 搜索到的话题列表 --}}
                @include('article.layouts._article_list', ['articles' => $articles,'search'=>true])
                {{-- 分页 --}}
                {!! $articles->render() !!}
            </div>
        </div>
    </div>
@stop