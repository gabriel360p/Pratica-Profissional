<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\Emprestimo;
use App\Models\Material;
use Livewire\Component;

class TelaEmprestimos extends Component
{
    public $itens = [];
    public $materiais = [];
    public $carrinho = [];
    public $remove = [];
    public $responsavel = null;
    public $filtro_material = null;

    public function mount()
    {
        $this->itens = Item::all();
    }

    public function emprestar()
    {

        if (!$this->carrinho || !$this->responsavel) {
        } else {
            $emprestimo = Emprestimo::create([
                'usuario_que_emprestou' => \App\Models\Session::first()->identificacao,
                'usuario_que_recebeu' => $this->responsavel,
            ]);

            $itens = $this->carrinho;
            for ($i = 0; $i < sizeof($itens); $i++) {
                $emprestimo->itens()->attach($itens[$i]);
            }

            $this->carrinho = [];
            $this->responsavel = "";
        }
    }

    public function adicionar(Item $item)
    {
        $this->carrinho[] = $item;
    }

    public function remover(Item $item)
    {
        $num = array_search($item, $this->carrinho);
        unset($this->carrinho[$num]);
       }

    public function render()
    {
        $this->materiais = Material::orderBy('nome', 'asc')->get();
        if (!$this->filtro_material == 0) {
            $this->itens = Item::where('material_id', $this->filtro_material)->get();
        }else{
            $this->mount();
        }
        return view('livewire.tela-emprestimos', ['carrinho_itens' => $this->carrinho]);
    }
}
