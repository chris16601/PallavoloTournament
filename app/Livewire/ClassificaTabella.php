<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models;
use App\Models\Girone;
use App\Models\Squadra;

class ClassificaTabella extends Component
{
    public $squadre;
    public $gironi;
    public $gironeScelto;
    public $nomeGirone;
    public $squadra;


    public function mount()
    {
        $this->squadre = Squadra::select('*')->where('id_girone', 1)->orderBy('punteggio', 'desc')->get();
        $this->squadra = Squadra::select('*')->where('id_girone', 1)->orderBy('punteggio', 'desc')->first();
        $this->gironi = Girone::all();
        $this->gironeScelto = 'A';
    }

    public function updateGirone()
    {
        $this->squadre = Squadra::select('*')->where('id_girone', $this->gironeScelto)->orderBy('punteggio', 'desc')->get();
        $first_squadre = Squadra::select('*')->where('id_girone', $this->gironeScelto)->orderBy('punteggio', 'desc')->first();
        $this->gironeScelto = 1;
        $this->nomeGirone = $first_squadre->girone->nome;
    }


    public function render()
    {
        return view('livewire.classifica-tabella');
    }
}
