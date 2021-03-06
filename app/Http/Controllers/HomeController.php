<?php

namespace App\Http\Controllers;

use App\Name;
use App\State;
use DB;
use Cache;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $amountTotal = DB::table('names')
            ->when($request->anyFilled('filter.name'), function($query) use ($request) {
                return $query->where('name', $request->input('filter.name'));
            })
            ->sum('amount');

        $select = ['*'];
        $table = 'names_summary';

        if ($request->anyFilled('filter.year')) {
            $table = 'names';
            if (!$request->anyFilled('filter.year')) {
                $select[] = DB::raw('SUM(amount) AS amount');
            }
        }
        if ($request->anyFilled('filter.state')) {
            $table = 'names_by_state';
            // if (!$request->anyFilled('filter.year')) {
                $select[] = DB::raw('SUM(amount) AS amount');
            // }
        }

        $names = DB::table($table)
            ->when($request->input('group_year', 0), function($query) {
                // return $query->groupBy('year');
            })
            ->when($request->input('group_state', 0), function($query) {
                // return $query->groupBy('state');
            })
            ->when($request->input('group_name', 0), function($query) {
                // return $query;
            })
            ->when($request->anyFilled('filter.name'), function($query) use ($request) {
                return $query->where('name', $request->input('filter.name'));
            })
            ->when($request->anyFilled('filter.state'), function($query) use ($request) {
                return $query->where('state', $request->input('filter.state'));
            })
            ->when($request->anyFilled('filter.year'), function($query) use ($request) {
                return $query->where('year', $request->input('filter.year'));
            })
            ->groupBy('name')
            ->orderByDesc('amount')
            ->select($select)
            ->paginate($request->input('limit', 10), ['*'], 'page');

        $compareNames = [];
        if ($request->input('compare_on', 0) == 1) {
            $select = ['*'];
            $table = 'names_summary';

            if ($request->anyFilled('compare.year')) {
                $table = 'names';
                if (!$request->anyFilled('compare.year')) {
                    $select[] = DB::raw('SUM(amount) AS amount');
                }
            }
            if ($request->anyFilled('compare.state')) {
                $table = 'names_by_state';
                if (!$request->anyFilled('compare.year')) {
                    $select[] = DB::raw('SUM(amount) AS amount');
                }
            }

            $compareNames = DB::table($table)
                ->when($request->anyFilled('compare.name'), function($query) use ($request) {
                    return $query->where('name', $request->input('compare.name'));
                })
                ->when($request->anyFilled('compare.state'), function($query) use ($request) {
                    return $query->where('state', $request->input('compare.state'));
                })
                ->when($request->anyFilled('compare.year'), function($query) use ($request) {
                    return $query->where('year', $request->input('compare.year'));
                })
                ->groupBy('name')
                ->orderByDesc('amount')
                ->select($select)
                ->paginate($request->input('limit', 10), ['*'], 'cpage');
        }

        return view('welcome')->with([
            'names' => $names,
            'compareNames' => $compareNames,
            'states' => State::all(),
            'amountTotal' => $amountTotal,
        ]);
    }

    public function top100()
    {
        $names =  Cache::rememberForever('top_100', function() {
            return DB::table('names')
                ->groupBy('name')
                ->orderByDesc('total')
                ->select(['name', DB::raw('SUM(amount) as total')])
                ->take(100)
                ->get();
        });
        return view('top_100')->with(['names' => $names]);
    }

    public function mostGivenName()
    {
        $data =  Cache::rememberForever('most_given_name', function() {
            return DB::table('names')
                ->groupBy('name')
                ->orderByDesc('total')
                ->select(['name', DB::raw('SUM(amount) as total')])
                ->first();
        });
        return view('most_given_name')->with(['data' => $data]);
    }
}
