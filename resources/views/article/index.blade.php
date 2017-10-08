@extends('layouts.default')

@section('title')
   peng app--小博客
@stop

@section('content')
    <div class="container">
       @include('shared._errors')
       <div class="col-md-8">
         <div class="panel panel-info">
         	<div class="panel-heading">
         		<h3 class="panel-title">最新的一些小文章</h3>
         	</div>
         	<div class="panel-body">
         	    @foreach($articles as $article)
         	      @include('article.layouts._article')
         	    @endforeach
         	</div>	
         </div>
       </div>

        <div class="col-md-3">
        	<div class="panel panel-success">
        		<div class="panel-heading">
        			<h3 class="panel-title">热门的小博客哦！</h3>
        		</div>
        		<div class="panel-body">
        			@foreach($data['hits'] as $da)
                        <a href="/article/{{ $da->id }}">{{ $da->title }}</a>
                    @endforeach
        		</div>
        	</div>
        </div>
   </div>
@stop