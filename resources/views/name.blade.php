@extends('layout')

@section('content')
<section class="search">
    <form action="" method="get">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="filter[name]" value="{{ request()->input('filter.name', '') }}" class="form-control">
        </div>
        <input type="submit" class="btn btn-default">
    </form>
</section>

@if (request()->has('filter.name'))
<section>
    Totalt antal med namnet {{ request()->input('filter.name') }}: {{ $names->sum('amount') }}
</section>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <td>Namn</td>
            <td>Antal</td>
            <td>År</td>
            @if (request()->input('include_state', 1) == 1)
            <td>Stat</td>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($names as $name)
        <tr>
            <td>{{ $name->name }}</td>
            <td>{{ $name->amount }}</td>
            <td>{{ $name->year }}</td>
            @if (request()->input('include_state', 1) == 1)
            <td>{{ $name->stateRelation->name }}</td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
{{ $names->links() }}
@stop
