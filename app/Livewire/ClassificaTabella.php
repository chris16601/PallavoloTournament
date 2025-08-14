<?php

namespace App\Livewire;

use App\Models\Log;
use Illuminate\Support\Facades\Auth;
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

    public function creaGironi()
    {
        $gironi = Girone::all();
        $numero_gironi = $gironi->count();
        $squadre = Squadra::all();
        $numero_squadre = $squadre->count();

        $squadre_per_girone = floor($numero_squadre / $numero_gironi);
        $squadre_extra = $numero_squadre % $numero_gironi;

        $gironi = $gironi->shuffle(); // Mescola l'ordine dei gironi

        $index = 0;
        foreach ($squadre as $squadra) {
            $girone_corrente = $gironi[$index % $numero_gironi];
            $squadra->id_girone = $girone_corrente->id_girone;
            $squadra->save();

            $index++;

            // Distribuisci le squadre extra su tutti i gironi
            if ($index >= $squadre_per_girone && $squadre_extra > 0) {
                $squadre_extra--;
            }
        }

        // Adesso, aggiungi la squadra di riposo solo nei gironi con numero dispari di squadre
        foreach ($gironi as $girone) {
            $squadreInGirone = Squadra::where('id_girone', $girone->id_girone)->count();

            if ($squadreInGirone % 2 != 0) {
                $fakeTeam = new Squadra();

                $fakeTeam->id_girone = $girone->id_girone;
                $fakeTeam->nome = 'Team Riposo';
                $fakeTeam->citta = 'Unknown';
                $fakeTeam->punteggio = 0;

                $fakeTeam->save();
            }
        }
        $log = new Log();
        $log->id_utente = Auth::id();
        $log->azione = 'Creazione gironi campionato';
        $log->save();

        return redirect('/classifica');
    }



    public function render()
    {
        return view('livewire.classifica-tabella');
    }
}
