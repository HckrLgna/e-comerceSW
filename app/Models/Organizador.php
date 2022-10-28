<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizador extends Model
{
    use HasFactory;
    protected $fillable = ['name','last_name','address'];

    //relaciones
    public function eventos(){
        return $this->hasMany(Evento::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
