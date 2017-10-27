@extends('layouts.default')

@section('title')
     创建小文章
@stop

@section('content')


<script type="text/javascript" src="/js/jquery.js"></script>
<!-- include libraries(jQuery, bootstrap) -->
{{-- <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css" />
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script> --}}

<!-- include summernote css/js-->
<link href="/css/summernote.css" rel="stylesheet">

{{-- <script src="/js/summernote.js"></script> --}}


<div class="container">
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    添加小文章
                </h3>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    {!! Form::open(['method' => 'POST', 'route' => 'article.store', 'class' => 'form-horizontal']) !!}
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        {!! Form::label('title', '小文章标题') !!}
                    {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">
                            {{ $errors->first('title') }}
                        </small>
                    </div>

                    {{-- 获取创建用户的名字和id --}}
                    <input type="hidden" name="author" value="{{ Auth::user()->name }}">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >

                    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                        {!! Form::label('content', '小文章内容') !!}
                    {!! Form::hidden('content', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <div class="editable"></div>
                        <small class="text-danger">
                            {{ $errors->first('content') }}
                        </small>
                    </div>


                    <div class="btn-group pull-right">
                    {!! Form::submit("提交", ['class' => 'btn btn-success']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        var editor = $('.editable').summernote({
            lang: 'zh-CN', // default: 'en-US',
            height: 500,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ["insert", ["link","hr"]],
                ['misc',['codeview', 'undo','redo','fullscreen']]
              ],
            focus:true
          });

        $('.editable').summernote('code',$('input[name="content"]').val());

        $('.editable').on('summernote.change', function(we, contents, $editable) {
          $('input[name="content"]').val(contents);
        });
    });
</script>
@stop
