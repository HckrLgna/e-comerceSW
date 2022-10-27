<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $table='planes';
    protected $fillable = [
        'nombre_plan', 'descripcion', 'precio', 'duracion'
    ];
    //relaciones
    public function suscripcion(){
        return $this->belongsTo(Suscripcion::class);
    }
}
