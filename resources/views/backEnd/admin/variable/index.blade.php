@extends('backLayout.app')
@section('title')
Variable
@stop

@section('content')

    <h1>Variable <a href="{{ url('admin/variable/create') }}" class="btn btn-primary pull-right btn-sm">Add New Variable</a></h1>
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tbladmin/variable">
            <thead>
                <tr>
                    <th>ID</th><th>Bank Start</th><th>Bank Length</th><th>Date Start</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($variable as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><a href="{{ url('admin/variable', $item->id) }}">{{ $item->bank_start }}</a></td><td>{{ $item->bank_length }}</td><td>{{ $item->date_start }}</td>
                    <td>
                        <a href="{{ url('admin/variable/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/variable', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('#tbladmin/variable').DataTable({
            columnDefs: [{
                targets: [0],
                visible: false,
                searchable: false
                },
            ],
            order: [[0, "asc"]],
        });
    });
</script>
@endsection