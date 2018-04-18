@extends('layouts.default')
 
@section('content')
    <div class="container">
        <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">Send message</div>
                    <div class="col-md-12">
                    {!! Form::open(['method' => 'POST', 'route' => 'sendMassage', 'class' => 'form-horizontal']) !!}
                    
                    
                        <div class="form-group{{ $errors->has('massage') ? ' has-error' : '' }}">
                            {!! Form::label('massage', 'massag') !!}
                            {!! Form::text('massage', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('massage') }}</small>
                        </div>
                    
                        <div class="btn-group pull-right">
                            {!! Form::submit("send", ['class' => 'btn btn-success']) !!}
                        </div>
                    
                    {!! Form::close() !!}
                    </div>
                </div>
        </div>
    </div>
 
@endsection