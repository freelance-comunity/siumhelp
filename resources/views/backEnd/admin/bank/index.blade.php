@extends('backLayout.app') @section('title') Bancos @stop @section('content') @if(session()->has('message'))
<div class="alert alert-success alert-dismissable">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session()->get('message') }}
</div>
@endif
<h1>Bancos
	<a href="{{ url('admin/bank/create') }}" class="btn btn-primary pull-right btn-sm">Agregar Nuevo Banco</a>
</h1>
<div class="table table-responsive">
	<table class="table table-bordered table-striped table-hover" id="bank">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Número de compañia</th>
				<th>Metodo de Pago</th>
				<th>Detalles</th>
			</tr>
		</thead>
		<tbody>
			@foreach($bank as $item)
			<tr>
				<td>{{ $item->id }}</td>
				<td>
					<a href="{{ url('admin/bank', $item->id) }}">{{ $item->name }}</a>
				</td>
				<td>{{ $item->company_number }}</td>
				<td>{{ $item->payment_form }}</td>
				<td>
					<div class="">
						<a href="{{ url('admin/bank/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Actualizar</a>
						{!! Form::open([ 'method'=>'DELETE', 'url' => ['admin/bank', $item->id], 'style' => 'display:inline' ]) !!} {!! Form::submit('Eliminar',
						['class' => 'btn btn-danger btn-xs', 'onClick'=>'return confirm("¿Estas seguro de eliminar este Banco?")']) !!} {!! Form::close() !!}
						<a href="{{ url('admin/bank', $item->id)}}" class="btn btn-warning btn-xs">Ver</a>
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection @section('scripts')
<script type="text/javascript">
	$(document).ready(function () {
		$('#bank').DataTable({
			columnDefs: [{
				targets: [0],
				visible: false,
				searchable: false
			}, ],
			order: [
				[0, "asc"]
			],
		});
	});
</script>
@endsection