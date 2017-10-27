@extends('layouts.default')

@section('title')
     小文章
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
        			<h3 class="panel-title">热门的小文章哦！</h3>
        		</div>
        		<div class="panel-body">
        			@foreach($data['hits'] as $da)
                         <div class="list-group">
                             <a href="/article/{{ $da->id }}" class="list-group-item active">
                                 <h4 class="list-group-item-heading">{{ $da->title }}</h4>
                                 <p class="list-group-item-text">{{ str_limit(strip_tags($da->content),50) }}</p>
                             </a>
                         </div>
                    <hr>
                    @endforeach
        		</div>
        	</div>
        </div>
   </div>
@stop