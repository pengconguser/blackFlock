@extends('layouts.default')

@section('title')
   peng app--小博客
@stop

@section('content')
    <div class="container">
       <div class="col-md-8">
         <div class="panel panel-info">
         	<div class="panel-heading">
         		<h3 class="panel-title">最新的一些小文章</h3>
         	</div>
         	<div class="panel-body">
         	     数据还没添加，先写前端代码啦。。。
         	</div>	
         </div>
       </div>

        <div class="col-md-3">
        	<div class="panel panel-success">
        		<div class="panel-heading">
        			<h3 class="panel-title">热门的小博客哦！</h3>
        		</div>
        		<div class="panel-body">
        			这里会放置一些热门文章的标题
        		</div>
        	</div>
        </div>
   </div>
@stop