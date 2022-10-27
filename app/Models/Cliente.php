<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = ['cantidad_eventos','profile_photo_path'];

    //relaciones
    public function eventos(){
        return $this->belongsToMany(Evento::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function fotografias(){
        return $this->belongsToMany(Fotografia::class);
    }
}
