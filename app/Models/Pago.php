<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;
    protected $fillable = [
        'monto', 'owner', 'card_number', 'expiration', 'security_code'
    ];
    public function suscripcion(){
        return $this->hasOne(Suscripcion::class);
    }
    public function user(){
        return $this->hasOne(User::class);
    }

}
