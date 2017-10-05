@extends('layouts.default')

@section('title')
     创建
@stop

@section('content')
     <div class="container">
        <div class="col-md-11">
            {!! Form::open(['method' => 'POST', 'route' => 'article.store', 'class' => 'form-horizontal']) !!}
            
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    {!! Form::label('title', '小博客标题') !!}
                    {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                </div>

                <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                    {!! Form::label('content', '小博客内容') !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('content') }}</small>
                </div>
            
                <div class="btn-group pull-right">
                    {!! Form::reset("重置", ['class' => 'btn btn-warning']) !!}
                    {!! Form::submit("提交", ['class' => 'btn btn-success']) !!}
                </div>
            
            {!! Form::close() !!}
        </div>
     </div>
@stop