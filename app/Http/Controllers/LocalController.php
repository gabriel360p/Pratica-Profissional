<?php

namespace App\Http\Controllers;

use App\Models\Local;
use Illuminate\Http\Request;

class LocalController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('locais.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Local::create($request->all());
        return back();
    }
}
