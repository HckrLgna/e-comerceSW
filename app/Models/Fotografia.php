<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fotografia extends Model
{
    use HasFactory;
    protected $fillable = ['path_img','comprado','nombre_propietario'];
    //relaciones
    public function evento(){
        return $this->belongsTo(Evento::class);
    }
    public function clientes(){
        return $this->belongsToMany(Cliente::class);
    }

}
