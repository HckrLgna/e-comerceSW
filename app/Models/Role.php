<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Role extends Model
{
    protected $fillable = [
        'name','slug','description'
    ];
    //relaciones

    public function permissions(){
        return $this->hasMany('App\Models\Permission');
    }
    public function users(){
        return $this->belongsToMany('App\Models\User')->withTimestamps();
    }
    //almacenamiento
    public function store($request){
        $slug = Str::slug($request->name,'-');
        return self::create($request->all() + [
                'slug'=>$slug,
            ]);
    }
}
