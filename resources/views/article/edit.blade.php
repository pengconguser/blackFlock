@extends('layouts.default')

@section('title')
     编辑{{ $article->title }}
@stop

@section('content')
<div class="container">
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    编辑小博客
                </h3>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                	 {!! Form::open(['method' => 'PUT', 'route' => ['article.update',$article->id], 'class' => 'form-horizontal']) !!}
                
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        {!! Form::label('title', '小博客标题') !!}
                        {!! Form::text('title', $article->title, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('title') }}</small>
                    </div>

                    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                        {!! Form::label('content', '小博客内容') !!}
                        {!! Form::textarea('content', $article->content, ['class' => 'form-control', 'required' => 'required']) !!}
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
@stop
