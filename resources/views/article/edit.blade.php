@extends('layouts.article')

@section('title')
     编辑{{ $article->title }}
@stop

@section('content')
{{-- <script type="text/javascript" src="/js/jquery.js"></script> --}}
{{--
<link href="/css/summernote.css" rel="stylesheet"> --}}
<div class="container">
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    编辑小文章
                </h3>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                	 {!! Form::open(['method' => 'PUT', 'route' => ['article.update',$article->id], 'class' => 'form-horizontal','enctype'=>"multipart/form-data"]) !!}

                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        {!! Form::label('title', '文章标题') !!}
                        {!! Form::text('title', $article->title, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('title') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                        {!! Form::label('category_id', '选择分类') !!}
                        {!! Form::select('category_id', $categorys, $article->category_id, ['id' => 'category_id', 'class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('category_id') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                        {!! Form::label('content', '文章内容') !!}
                        {{-- {!! Form::textarea('content', $article->content, ['class' => 'form-control', 'required' => 'required','id'=>'editor']) !!} --}}
                        <textarea name="content" id="editor" class="form-control" required="required">{!! $article->content !!}</textarea>
                        <small class="text-danger">{{ $errors->first('content') }}</small>
                    </div>

                    <div class="btn-group pull-right">
                        {!! Form::submit("保存修改", ['class' => 'btn btn-success']) !!}
                    </div>

                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/simditor.css') }}">
@stop

@stop

@push('scripts')
  @include('parts.edit_js')
@endpush
