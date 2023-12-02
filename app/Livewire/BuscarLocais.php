<?php

namespace App\Livewire;

use App\Models\Local;
use Livewire\Component;

class BuscarLocais extends Component
{
    public $locals=[]; 
    public $local; 

    public function mount(){
        $this->locals = Local::orderBy('nome','asc')->get();
    }

    public function render()
    {
        $this->locals= \DB::table('locals')->where('nome','like',$this->local.'%')->orderBy('nome','asc')->get();    

        return view('livewire.buscar-locais',['locais'=>$this->locals]);
    }
}
