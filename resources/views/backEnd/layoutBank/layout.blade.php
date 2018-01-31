@extends('backLayout.app') @section('title') Crear nuevo Banco @stop @section('content')

<h1>Procesar layout del Banco </h1>
<hr/> {!! Form::open(['url' => 'admin/layout', 'class' => 'form-horizontal', 'files'=>'true']) !!}
<div class="form-group {{ $errors->has('layout') ? 'has-error' : ''}}">
    {!! Form::label('layout', 'Subir archivo: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::file('layout',null, ['class' => 'form-control', 'required' => 'required']) !!} {!! $errors->first('layout', '
        <p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('name_bank') ? 'has-error' : ''}}">
    {!! Form::label('name_bank', 'Selecciona Banco: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::select('name_bank', ['1'=>'SANTANDER', '2'=>'BANORTE'],null, ['class' => 'form-control', 'required' => 'required'])
        !!} {!! $errors->first('name_bank', '
        <p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('bank') ? 'has-error' : ''}}">
    {!! Form::label('bank', 'Selecciona cuenta: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::select('bank', $banks,null, ['class' => 'form-control', 'required' => 'required']) !!} {!! $errors->first('bank',
        '
        <p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-3">
        {!! Form::submit('Procesar', ['class' => 'btn btn-primary form-control']) !!}
    </div>
</div>
{!! Form::close() !!} @if ($errors->any())
<ul class="alert alert-danger alert-dismissable">
    @foreach ($errors->all() as $error)
    <button type="button" class="close" data-dismiss="alert">×</button>
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif @endsection