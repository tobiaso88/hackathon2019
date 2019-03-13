@extends('layout')

@section('content')
<h1>Top 100 names</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <td>Namn</td>
            <td>Antal</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($names as $name)
        <tr>
            <td>{{ $name->name }}</td>
            <td>{{ $name->total }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop
