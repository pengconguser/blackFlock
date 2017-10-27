@extends('layouts.default')

@section('title')
      五子棋
@stop

@section('content')
     <link rel="stylesheet" type="text/css" href="/css/five.css">

      <div class="container">
      	  <div class="col-md-9">
      	 <canvas id="chess" width="450px" height="450px"></canvas>
          <script type="text/javascript" src="/js/five.js"></script>
      	  </div>
      	  <div class="co-md-3">
      	  	   <div class="panel panel-default">
      	  	   	<div class="panel-body">
      	  	   		您目前的得分:{{ $user->mark }}
      	  	   	</div>
      	  	   </div>
      	  </div>
            {!! Form::open(['method' => 'POST', 'route' => 'game.store', 'class' => 'form-horizontal','id'=>'winner']) !!}

                {!! Form::hidden('winner', '1') !!}

                <div class="btn-group pull-right" style="display: none;">
                    {!! Form::submit("提交", ['class' => 'btn btn-success',]) !!}
                </div>
            {!! Form::close() !!}
      </div>
@stop
