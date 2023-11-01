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
    public function devolver()
    {
        // TODO: Renomear para `devolver`.
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(ValidacaoCategoria $request)
    {
        Item::create($request->all());
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function rented(Item $item)
    {
        return view('itens.rented');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('itens.edit');
    }
}
