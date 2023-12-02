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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('emprestimos.create', [
            'materiais' => Material::orderBy('nome', 'asc')->get(),
            'itens' => Item::all(),
        ]);
    }


    /**
     * Listar empréstimos.
     */
    public function index()
    {   
        return 'chegou aqui';
        return view('emprestimos.index', ['emprestimos' => Emprestimo::all()]);
    }


    public function itens(Emprestimo $emprestimo)
    {
        return view('emprestimos.itens', [
            'emprestimo' => $emprestimo,
        ]);
    }

    public function devolver(Request $request,Emprestimo $emprestimo)
    {
        $itens = $request->itens;

        if(sizeof($itens)==sizeof($emprestimo->itens)){
            //esta comparando se a quantidade de itens, se for a mesma quantidade significa que todos os itens do empréstimo foram devolvido, portanto posso apagar o empréstimo de uma vez
            $emprestimo->delete();  
        }else{
            //se a quantidade não for igual, então nem todos os itens foram devolvidos, logo eu apago apenas os itens que foram devolvidos
            for ($i=0; $i < sizeof($itens) ; $i++) { 
                Item::find($itens[$i])->delete();
            }    
        }
        
        return redirect(route('emprestimos.index'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $emprestimo = Emprestimo::create([
            'usuario_que_emprestou' => \App\Models\Session::first()->identificacao,
            'usuario_que_recebeu' => $request->usuario_que_recebeu,
        ]);

        $itens = $request->itens;

        for ($i = 0; $i < sizeof($itens); $i++) {
            
            $emprestimo->itens()->attach($itens[$i]);   
        }

        return redirect(route('emprestimos.index'));
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
