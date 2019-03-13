<?php

namespace App\Http\Controllers;

use App\State;
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
        return view('welcome')->with([
            'states' => State::all(),
        ]);
    }
}
