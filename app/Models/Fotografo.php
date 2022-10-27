<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Fotografo extends Model
{
    use HasFactory;
    protected $fillable = ['celular','estudio_fotografico','ciudad'];
    //relaciones
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function eventos(){
        return $this->hasMany(Evento::class); //revisar esta relacion
    }
}
