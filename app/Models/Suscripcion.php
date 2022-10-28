<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscripcion extends Model
{
    use HasFactory;
    protected $table = 'suscripciones';
    protected $fillable = [
        'nombre_plan', 'fecha_inicio', 'fecha_final'
    ];
    public function user(){
        return $this->hasOne(User::class);
    }
    public function plan(){
        return $this->hasOne(Plan::class);
    }
    public function pago(){
        return $this->belongsTo(Pago::class);
    }
}
