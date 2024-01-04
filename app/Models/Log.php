<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $table = 'log';

    protected $fillable = [
        'id_utente',
        'azione',
    ];

    public function utente(){
        return $this->belongsTo(User::class, 'id_utente', 'id');
    }
}
