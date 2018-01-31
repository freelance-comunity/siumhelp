@extends('backLayout.app') @section('title') Crear nuevo Banco @stop @section('content')

<h1>Crear nuevo Banco</h1>
<hr/> {!! Form::open(['url' => 'admin/bank', 'class' => 'form-horizontal']) !!}

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Nombre: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!} {!! $errors->first('name', '
        <p
            class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('company_number') ? 'has-error' : ''}}">
    {!! Form::label('company_number', 'Número de compañia: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::textarea('company_number', null, ['class' => 'form-control', 'required' => 'required']) !!} {!! $errors->first('company_number',
        '
        <p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('payment_form_id') ? 'has-error' : ''}}">
    {!! Form::label('payment_form_id', 'Forma de Pago: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::select('payment_form_id', $payments_forms,null, ['class' => 'form-control', 'required' => 'required']) !!} {!! $errors->first('payment_form_id',
        '
        <p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('base_year') ? 'has-error' : ''}}">
    {!! Form::label('base_year', 'Año base: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('base_year', null, ['class' => 'form-control', 'required' => 'required']) !!} {!! $errors->first('base_year',
        '
        <p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('campus_id') ? 'has-error' : ''}}">
    {!! Form::label('campus_id', 'Plantel: ', ['class' => 'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! Form::select('campus_id', $campuses,null, ['class' => 'form-control', 'required' => 'required']) !!} {!! $errors->first('campus_id',
        '
        <p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-3 col-sm-3">
        {!! Form::submit('Crear', ['class' => 'btn btn-primary form-control']) !!}
    </div>
</div>
{!! Form::close() !!} @if ($errors->any())
<ul class="alert alert-danger">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif @endsection