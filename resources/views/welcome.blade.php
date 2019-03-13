@extends('layout')

@section('content')
<section class="search">
    <form action="" method="get">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Namn</label>
                    <input type="text" name="filter[name]" value="{{ request()->input('filter.name', '') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Filtrera på år</label>
                    <select name="filter[year]" class="form-control">
                        <option value="">Alla</option>
                        @foreach (range(1910, 2017) as $year)
                        <option value="{{ $year }}" {{ request()->input('filter.year', '') == $year ? 'selected':''}}>
                            {{ $year }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Filtrera på delstat</label>
                    <select name="filter[state]" class="form-control">
                        <option value="">Alla</option>
                        @foreach ($states as $state)
                        <option value="{{ $state->abbreviation }}" {{ request()->input('filter.state', '') == $state->abbreviation ? 'selected':''}}>
                            {{ $state->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Jämför</label>
                    <input type="hidden" name="compare_on" value="0">
                    <input type="checkbox" name="compare_on" value="1" class="form-control" {{ request()->input('compare_on', 0) == 1 ? 'checked':''}}>
                </div>
                <div class="form-group">
                    <label>Namn</label>
                    <input type="text" name="compare[name]" value="{{ request()->input('compare.name', '') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Filtrera på år</label>
                    <select name="compare[year]" class="form-control">
                        <option value="">Alla</option>
                        @foreach (range(1910, 2017) as $year)
                        <option value="{{ $year }}" {{ request()->input('compare.year', '') == $year ? 'selected':''}}>
                            {{ $year }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Filtrera på delstat</label>
                    <select name="compare[state]" class="form-control">
                        <option value="">Alla</option>
                        @foreach ($states as $state)
                        <option value="{{ $state->abbreviation }}" {{ request()->input('compare.state', '') == $state->abbreviation ? 'selected':''}}>
                            {{ $state->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Filtrera</button>
        </div>
    </form>
</section>

<section>
    @if (request()->anyFilled('filter.name'))
    Totalt antal med namnet {{ request()->input('filter.name') }}: {{ number_format($amountTotal, 2, '.', ' ') }}
    @else
    Totalt antal namn: {{ number_format($amountTotal, 2, '.', ' ') }}
    @endif
</section>

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
            <td>{{ $name->amount }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $names->appends(request()->input())->links() }}
@stop
