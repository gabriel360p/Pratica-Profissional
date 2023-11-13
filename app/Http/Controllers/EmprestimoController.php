<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use App\Models\Material;
use App\Models\Categoria;
use App\Models\Item;
use App\Models\Local;
use Illuminate\Http\Request;

class EmprestimoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('emprestimos.index',['emprestimos'=>\App\Models\Emprestimo::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('emprestimos.create', [
            'materials' => Material::orderBy('nome', 'asc')->get(),
            'itens' => Item::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $emprestimo = Emprestimo::create([
            'usuario_que_emprestou' => \App\Models\Session::fisrt()->identificacao,
            'usuario_que_recebeu' => $request->usuario_que_recebeu,
        ]);

        $itens = $request->itens;


        for ($i = 0; $i < sizeof($itens); $i++) {
            
            $emprestimo->itens()->attach($itens[$i]);   
        }

        return redirect(route('emprestimos.emprestados'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Emprestimo $emprestimo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Emprestimo $emprestimo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Emprestimo $emprestimo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emprestimo $emprestimo)
    {
        //
    }
}
