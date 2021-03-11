<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MascotasModel extends Model
{
    protected $table = "tabmascotas";
    protected $fillable = ['nombre', 'raza', 'edad'];

    //Scope
    public function scopeSearch($query, $nombre)
    {
        if ($nombre)
            return $query->where('nombre', 'LIKE', "%$nombre%");
    }


    use HasFactory;
}
