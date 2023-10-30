<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Local;
use App\Models\Material;
use Illuminate\Http\Request;
use App\Http\Requests\ValidacaoCategoria;

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
        $locais = Local::all();
        $materiais = Material::all();

        return view(
            'itens.create',
            [
                'locais' => $locais,
                'materiais' => $materiais,
            ]
        );
    }

    public function rent()
    {
        return view('itens.rent');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ValidacaoCategoria $request)
    {
        Item::create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }
    /**
     * 
     * Show the form for editing the specified resource.
     */
    public function rented(Item $item)
    {
        return view('itens.rented');
    }


    /**
     * 
     * 
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('itens.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ValidacaoCategoria $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }
}
