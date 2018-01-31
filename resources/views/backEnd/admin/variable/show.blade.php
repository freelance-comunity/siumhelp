@extends('backLayout.app')
@section('title')
Variable
@stop

@section('content')

    <h1>Variable</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Bank Start</th><th>Bank Length</th><th>Date Start</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $variable->id }}</td> <td> {{ $variable->bank_start }} </td><td> {{ $variable->bank_length }} </td><td> {{ $variable->date_start }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection