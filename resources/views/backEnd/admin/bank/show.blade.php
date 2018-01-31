@extends('backLayout.app') @section('title') Banco @stop @section('content')
@if(session()->has('message'))
<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session()->get('message') }}
</div>
@endif
<h1>Banco</h1>
<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>ID.</th>
                <th>Nombre</th>
                <th>Número de compañia</th>
                <th>Forma de pago</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $bank->id }}</td>
                <td> {{ $bank->name }} </td>
                <td> {{ $bank->company_number }} </td>
                <td> {{ $bank->payment_form }} </td>
            </tr>
        </tbody>
    </table>
</div>
@if($variable)
<h1>Variables</h1>
<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>#Banco Inicio</th>
                <th>#Banco Fin</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Monto Inicio</th>
                <th>Monto Fin</th>
                <th>Detalles</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $variable->bank_start }}</td>
                <td> {{ $variable->bank_length }} </td>
                <td> {{ $variable->date_start }} </td>
                <td> {{ $variable->date_length }} </td>
                <td> {{ $variable->amount_start }} </td>
                <td> {{ $variable->amount_length }} </td>
                <td>
                    <a href="{{ url('admin/variable/' . $variable->id . '/edit') }}" class="btn btn-primary btn-xs">Actualizar</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@else
<div class="well text-center">Este Banco aún no cuenta con variables. <a href="{{url('admin/bank/addVar')}}/{{$bank->id}}" class="btn btn-success btn-xs">Agregar variables</a></div>
@endif @endsection