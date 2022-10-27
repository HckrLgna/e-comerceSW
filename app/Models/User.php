<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //relaciones
    public function roles(){
        return $this->belongsToMany('App\Models\Role')->withTimestamps();
    }
    public function fotografo(){
        return $this->hasOne(Fotografo::class);
    }
    public function cliente(){
        return $this->hasOne(Cliente::class);
    }
    public function organizador(){
        return $this->hasOne(Organizador::class);
    }
    public function suscripcion(){
        return $this->hasOne(Suscripcion::class);
    }
    //almacenamiento
    public function has_any_role(array $roles): bool
    {
        foreach ($roles as $role){
            if ($this->has_role($role)) {
                return true;
            }
        }
        return false;
    }
    public function has_role($id)
    {
        $flag =false;
        foreach ($this->roles as $role){
            if ($role->id == $id || $role->slug == $id ){
                $flag = true;
            }
        }
        return $flag;
    }
}
