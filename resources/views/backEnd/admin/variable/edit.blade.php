@extends('backLayout.app') @section('title') Edit Variable @stop @section('content')

<h1>Editar Variables</h1>
<hr/> {!! Form::model($variable, [ 'method' => 'PATCH', 'url' => ['admin/variable', $variable->id], 'class' => 'form-horizontal'
]) !!}

<div class="form-group {{ $errors->has('bank_start') ? 'has-error' : ''}}">
    {!! Form::label('bank_start', '#Banco Inicio: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::number('bank_start', null, ['class' => 'form-control', 'required' => 'required']) !!} {!! $errors->first('bank_start',
        '
        <p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('bank_length') ? 'has-error' : ''}}">
    {!! Form::label('bank_length', '#Banco Fin: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::number('bank_length', null, ['class' => 'form-control', 'required' => 'required']) !!} {!! $errors->first('bank_length',
        '
        <p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('date_start') ? 'has-error' : ''}}">
    {!! Form::label('date_start', 'Fecha Inicio: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::number('date_start', null, ['class' => 'form-control', 'required' => 'required']) !!} {!! $errors->first('date_start',
        '
        <p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('bank_length') ? 'has-error' : ''}}">
    {!! Form::label('date_length', 'Fecha Fin: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::number('date_length', null, ['class' => 'form-control', 'required' => 'required']) !!} {!! $errors->first('date_length',
        '
        <p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('amount_start') ? 'has-error' : ''}}">
    {!! Form::label('amount_start', 'Monto Inicio: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::number('amount_start', null, ['class' => 'form-control', 'required' => 'required']) !!} {!! $errors->first('amount_start',
        '
        <p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('amount_length') ? 'has-error' : ''}}">
    {!! Form::label('amount_length', 'Monto Fin: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::number('amount_length', null, ['class' => 'form-control', 'required' => 'required']) !!} {!! $errors->first('amount_length',
        '
        <p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('payment_start') ? 'has-error' : ''}}">
    {!! Form::label('payment_start', 'Pago Inicio: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::number('payment_start', null, ['class' => 'form-control', 'required' => 'required']) !!} {!! $errors->first('payment_start',
        '
        <p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('payment_length') ? 'has-error' : ''}}">
    {!! Form::label('payment_length', 'Pago Fin: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::number('payment_length', null, ['class' => 'form-control', 'required' => 'required']) !!} {!! $errors->first('payment_length',
        '
        <p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('cycle_start') ? 'has-error' : ''}}">
    {!! Form::label('cycle_start', 'Ciclo Inicio: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::number('cycle_start', null, ['class' => 'form-control', 'required' => 'required']) !!} {!! $errors->first('cycle_start',
        '
        <p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('cycle_length') ? 'has-error' : ''}}">
    {!! Form::label('cycle_length', 'Ciclo Inicio: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::number('cycle_length', null, ['class' => 'form-control', 'required' => 'required']) !!} {!! $errors->first('cycle_length',
        '
        <p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-3 col-sm-3">
        {!! Form::submit('Actualizar', ['class' => 'btn btn-primary form-control']) !!}
    </div>
</div>
{!! Form::close() !!} @if ($errors->any())
<ul class="alert alert-danger">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif @endsection