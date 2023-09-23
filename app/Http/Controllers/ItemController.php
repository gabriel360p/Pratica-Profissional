<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function refund()
    {
        return view('itens.refund');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('itens.create');
    }

    public function rent()
    {
        return view('itens.rent');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    /**
     * 
     * Show the form for editing the specified resource.
     */
    public function rented()
    {   
        return view('itens.rented');
    }



    /**
     * 
     * 
     * Show the form for editing the specified resource.
     */
    public function edit()
    {   
        return view('itens.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
