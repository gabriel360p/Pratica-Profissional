<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Item;
use App\Models\Local;
use App\Models\Material;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        // $categorias = Categoria::all();
        $materiais = Material::all();

        return view(
            'itens.create',
            [
                'locais' => $locais,
                // 'categorias' => $categorias,
                'materiais' => $materiais,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Item::create($request->all());
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function rented()
    {
        return view('itens.rented');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('itens.edit');
    }
}
