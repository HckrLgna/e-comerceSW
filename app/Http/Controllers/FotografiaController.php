<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Fotografia;
use Illuminate\Http\Request;

class FotografiaController extends Controller
{
    public function create(){

    }
    public function store(Request $request,Evento $evento){
        $user = auth()->user();
        $comprado = false;
        if (auth()->user()->suscripcion){
            $comprado = true;
        }
        $fotografia = new Fotografia();
        $fotografia->path_img = $request->input('path_img');
        $fotografia->comprado = $comprado;
        $fotografia->nombre_propietario = "unknown";
        $fotografia->evento_id = $evento->id;
        $fotografia->save();
        return redirect()->route('evento.album',$evento);
    }
}
