<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\Emprestimo;
use Livewire\Component;

class TelaEmprestimos extends Component
{
    public $itens = [];
    public $carrinho = [];
    public $responsavel = null;

    public function mount()
    {
        $this->itens = Item::all();
    }

    public function emprestar()
    {

        if (!$this->carrinho && !$this->responsavel) {
            // return back()->withErrors(['nenhum-item-erro' => "Escolha um ou mais itens a serem emprestados"]);
        } else {
            $emprestimo = Emprestimo::create([
                'usuario_que_emprestou' => \App\Models\Session::first()->identificacao,
                'usuario_que_recebeu' => $this->responsavel,
            ]);

            $itens = $this->carrinho;
            for ($i = 0; $i < sizeof($itens); $i++) {
                $emprestimo->itens()->attach($itens[$i]);
            }

            $this->carrinho=[];
            $this->responsavel="";

        }
    }

    public function adicionar(Item $item)
    {
        $this->carrinho[] = $item;
    }
    public function remover(Item $item)
    {
        // $this->carrinho[] = $item;

        // $num = array_search($item, $this->carrinho);
        // dd(
        //     $this->carrinho,$num
        // );
    }

    public function render()
    {
        return view('livewire.tela-emprestimos', ['itens' => $this->itens, 'carrinho_itens' => $this->carrinho]);
    }
}
