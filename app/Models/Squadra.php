<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Squadra extends Model
{
    use HasFactory;

    protected $table = 'squadre';
    protected $primaryKey = 'id_squadra';

    protected $fillable = [
        'nome',
        'citta',
        'punteggio',
        'id_girone'
    ];

    public function girone()
    {
        return $this->belongsTo(Girone::class, 'id_girone', 'id_girone');
    }
}
