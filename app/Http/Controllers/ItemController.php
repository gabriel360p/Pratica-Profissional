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
    public function devolver()
    {
        return view("itens.index", ['itens' => Item::with(['local', 'material'])->get()]);
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(ValidacaoItem $request)
    {
        Item::create($request->all());
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    # TODO: Traduzir para `alugados`.
    public function rented(Item $item)
    {
        return view('itens.rented');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {

        return view('itens.edit', ['item' => $item, 'materiais' => Material::all(), 'locais' => Local::all()]);
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
