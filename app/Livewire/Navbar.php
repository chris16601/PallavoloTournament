<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models;
use App\Models\Girone;
use App\Models\Log;
use App\Models\Squadra;
use Carbon\Carbon;

class Navbar extends Component
{
    public $check_creazione;


    public function logout()
    {
        Auth::logout();
        Session::flush();

        // Esegui altre azioni se necessario
        return redirect()->to('/');
    }

    public function mount()
    {
        $this->check_creazione = DB::table('squadre')
            ->select(DB::raw('CASE WHEN COUNT(*) = SUM(CASE WHEN id_girone IS NULL THEN 1 ELSE 0 END) THEN "true" ELSE "false" END AS risultato'))
            ->first();
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
        return view('livewire.navbar');
    }
}
