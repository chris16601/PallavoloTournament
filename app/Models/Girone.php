<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Girone extends Model
{
    use HasFactory;

    protected $table = 'gironi';
    protected $primaryKey = 'id_girone';

    protected $fillable = [
        'nome',
    ];
}
