@extends('layout')

@section('content')
<h1>Most given name</h1>
<h2>{{ $data->name }} ({{ number_format($data->total, 0, '.', ' ') }})</h2>
@stop
