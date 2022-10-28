<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre','fecha','lugar'
    ];
    public function fotografo(){
        return $this->belongsTo(Fotografo::class);
    }
    public function organizador(){
        return $this->belongsTo(Organizador::class) ;
    }
    public function clientes(){
        return $this->belongsToMany(Cliente::class); //revisar la relacion que existe
    }
    public function fotografias(){
        return $this->hasMany(Fotografia::class);
    }
}
