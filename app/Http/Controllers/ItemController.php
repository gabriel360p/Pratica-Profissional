<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Local;
use App\Models\Material;
use Illuminate\Http\Request;
use App\Http\Requests\ValidacaoItem;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Item::with(['local', 'material'])->orderBy('nome','asc')->get();
        return view("itens.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locais = Local::orderBy('nome','asc')->get();
        $materiais = Material::orderBy('nome','asc')->get();

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
    public function store(ValidacaoItem $request)
    {
        Item::create($request->all());
        return back();
    }

    public function edit(Item $item)
    {

        return view('itens.edit', ['item' => $item, 'materiais' => \App\Models\Material::orderBy('nome','asc')->get(), 'locais' => \App\Models\Local::orderBy('nome','asc')->get()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ValidacaoItem $request, Item $item)
    {
        $item->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return back();
    }
}
