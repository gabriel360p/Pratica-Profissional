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
        Material::with('categorias')->orderBy('nome', 'asc')->get();
        return view('materiais.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::orderBy('nome', 'asc')->get();
        return view('materiais.create', ['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ValidacaoMaterial $request)
    {
        $material = Material::create($request->all());

        $categorias = $request->categorias;

        if ($categorias) {
            for ($i = 0; $i < sizeof($categorias); $i++) {
                $material->categorias()->attach($categorias[$i]);
            }
            return back();
        }else{
            return back()->withErrors(['categoria-erro'=>"Nenhuma categoria foi fornecida"]);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material)
    {
        return view('materiais.edit', ['material' => $material, 'categorias' => \App\Models\Categoria::orderBy('nome', 'asc')->get()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ValidacaoMaterial $request, Material $material)
    {
        //capturando os ids das categorias que foram marcadas para serem removidas
        $categorias_remover = $request->categorias_remover;
        //capturando os ids das categorias que foram marcadas para serem associadas/adicionadas
        $categorias_adicionar = $request->categorias_adicionar;
        if ($categorias_remover) { //verificando se existe alguma a ser removida
            //removendo as categorias
            for ($i = 0; $i < sizeof($categorias_remover); $i++) {
                $material->categorias()->detach($categorias_remover[$i]);
            }
        }
        if ($categorias_adicionar) { //verificando se alguma categoria precisa ser adicionada
            $indisponivel = []; //array que vai conter possíveis erros de categorias repetidas
            for ($i = 0; $i < sizeof($categorias_adicionar); $i++) { //for para passar pela arra
                foreach ($material->categorias as $categorias) { //foreach para acessar as categorias anexadas anteriormente a esse material
                    //aqui estou fazendo uma verificação, estou verificando se as novas categorias estão repetidas/já tinham sido associadas anteriormente
                    if ($categorias_adicionar[$i] == $categorias->id) {
                        //se alguma condição for verdadeira, ele gera a string abaixo:
                        $indisponivel[] = "Categoria '$categorias->nome' já está associada a esse material";
                    }
                }
            }
            if ($indisponivel) { //verificando se existe algum erro de tentativa de incluir uma categoria já anexada
                //retornando para a página anterior junto com a variável que contém as mensagens de erro
                return back()->withErrors(['error' => $indisponivel]);
            } else {
                //caso não exista categorias repetidas, ele anexa as novas categorias
                for ($i = 0; $i < sizeof($categorias_adicionar); $i++) {
                    $material->categorias()->attach($categorias_adicionar[$i]);
                }
            }
        }
        //atualizando o nome do campo se for necessário
        $material->update(['nome' => $request->nome]);
        return back();
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
