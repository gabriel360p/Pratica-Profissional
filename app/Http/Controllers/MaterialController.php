<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use App\Http\Requests\ValidacaoMaterial;
use App\Models\Categoria;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('materials.index',['materiais'=> Material::with('categorias')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('materials.create', ['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ValidacaoMaterial $request)
    {
        $material = Material::create($request->all());

        $categorias = $request->categorias;

        for ($i = 0; $i < sizeof($categorias); $i++) {
            $material->categorias()->attach($categorias[$i]);
        }

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material)
    {
        // dd($material->categorias);
        return view('materials.edit',['material'=> $material,'categorias'=>\App\Models\Categoria::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ValidacaoMaterial $request, Material $material)
    {
        $material;
        dd($material->categorias,$request->categorias);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        $material->delete();
        return back();
    }
}
