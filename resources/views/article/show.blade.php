@extends('layouts.default')

@section('title')
    小博客
@stop

@section('content')
<hr>
    <div class="container">
    	<div class="col-md-9">
    		<div class="panel panel-default">
    			<!-- Default panel contents -->

    			<div class="panel-heading text-center">
    		      <h3>
	                 {{$article->title  }}
    			  </h3>
    		    </div>

    			<div class="panel-body">
    				作者：{{ $article->author }}
    			</div>

    			<!-- content -->
    			<div class="table">
                   <div class="panel-heading">
                    <p>
                     {!! $article->content !!}
                    </p>
                   </div>
                </div>
    	     </div>
                  {!! Form::open(['method' => 'GET', 'route' => ['article.edit',$article->id], 'class' => 'form-horizontal']) !!}
      <div class="btn-group pull-right">
              {!! Form::submit("编辑", ['class' => 'btn btn-info']) !!}
          </div>

      {!! Form::close() !!}
      {!! Form::open(['method' => 'DELETE', 'route' => ['article.destroy',$article->id], 'class' => 'form-horizontal']) !!}

          <div class="btn-group pull-right">
              {!! Form::submit("删除", ['class' => 'btn btn-success']) !!}&nbsp;
          </div>

      {!! Form::close() !!}
        </div>
    </div>
@stop