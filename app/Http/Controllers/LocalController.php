<?php

namespace App\Http\Controllers;

use App\Models\Local;
use Illuminate\Http\Request;
use App\Http\Requests\ValidacaoLocal;

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
    public function store(ValidacaoLocal $request)
    {
        Local::create($request->all());
        return back();
    }
}
