<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    public $timestamps = false;
    protected $fillable = ['numero', 'assistido'];

    use HasFactory;

    public function temporada()
    {
        $this->belongsTo(Temporada::class);
    }
}
