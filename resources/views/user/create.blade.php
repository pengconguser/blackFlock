<!DOCTYPE html>
<html>
    <head>
        <title>
            用户创建
        </title>
    </head>
    <body>
        <div class="container">
            <div class="col-md-12">
                <div class="btn-group-lg">
                    {!! Form::open(['method' => 'POST', 'route' => 'user.store', 'class' => 'form-horizontal']) !!}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        {!! Form::label('name', 'Input label') !!}
                  {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">
                            {{ $errors->first('name') }}
                        </small>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        {!! Form::label('password', 'Input label') !!}
                  {!! Form::text('password', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">
                            {{ $errors->first('password') }}
                        </small>
                    </div>
                    <div class="form-group{{ $errors->has('emil') ? ' has-error' : '' }}">
                        {!! Form::label('emil', 'Input label') !!}
                  {!! Form::text('emil', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">
                            {{ $errors->first('emil') }}
                        </small>
                    </div>

                    <div class="btn-group pull-right">
                        {!! Form::reset("重置", ['class' => 'btn btn-warning']) !!}
                  {!! Form::submit("提交", ['class' => 'btn btn-success']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </body>
</html>