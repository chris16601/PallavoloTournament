<?php

namespace App\Livewire;

use App\Models\Squadra;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ModificaSquadre extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $sortBy = 'nome';
    public $sortDirection = 'asc';

    public function sortByField($field)
    {
        if ($field == 'team') {
            $this->sortBy = 'nome';
        } elseif ($field == 'girone') {
            $this->sortBy = 'id_girone';
        } elseif ($field == '') {
            $this->sortBy = $field;
        }

        if ($this->sortDirection == 'asc') {
            $this->sortDirection = 'desc';
        } elseif ($this->sortDirection == 'desc') {
            $this->sortDirection = 'asc';
        }
    }

    public function deleteSquad($id_squadra)
    {
        $teamExists = DB::table('squadre')
            ->whereNotNull('id_girone')
            ->where('id_squadra', $id_squadra)
            ->exists();

        if ($teamExists) {
            // Se la squadra esiste nel girone
            return redirect()->back()->with('error', 'La squadra appartiene ad un girone. Non può essere eliminata');
        } else {
            // Se la squadra non esiste nel girone
            DB::table('squadre')
                ->where('id_squadra', $id_squadra)
                ->delete();

            return redirect()->back()->with('success', 'Squadra eliminata correttamente.');
        }
    }

    public function render()
    {
        $squadre = Squadra::orderBy($this->sortBy, $this->sortDirection)->get();

        return view('livewire.modifica-squadre', [
            'squadre' => $squadre
        ]);
    }
}
