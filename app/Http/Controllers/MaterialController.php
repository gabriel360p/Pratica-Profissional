<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use App\Http\Requests\ValidacaoMaterial;
use App\Models\Categoria;

class MaterialController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('materiais.create', ['categorias' => $categorias]);
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
}
