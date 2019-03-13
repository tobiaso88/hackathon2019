<?php

namespace App\Http\Controllers;

use App\Http\Resources\NameResource;
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
        return NameResource::collection(
            Name::when($request->has('filter'), function($query) use ($request) {
                    collect($request->input('filter'))
                        ->each(function($value, $column) use ($query) {
                            $query->where($column, 'LIKE', $value);
                        });
                })
                ->with('stateRelation')
                ->paginate($request->input('limit', 25))
        );
    }
}
