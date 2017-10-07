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
                     {{ $article->content }}
                   </div>
                </div>
    	     </div>
    </div>
@stop