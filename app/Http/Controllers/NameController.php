<?php

namespace App\Http\Controllers;

use App\Name;
use Illuminate\Http\Request;

class NameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Name::when($request->has('filter'), function($query) use ($request) {
                collect($request->input('filter'))
                    ->each(function($value, $column) use ($query) {
                        $query->where($column, 'LIKE', $value);
                    });
            })
            ->paginate();
    }
}
