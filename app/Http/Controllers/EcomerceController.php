<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Fotografia;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EcomerceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        return view('theme.frontoffice.pages.e-comerce.show',[
            'fotografias' => Fotografia::all(),
            'eventos'=>$user->cliente->eventos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function mostrar(Request $request){
        $user = auth()->user();
        $evento = Evento::all()->find($request->input('evento_id'));
        return view('theme.frontoffice.pages.e-comerce.show',[
            'fotografias' => $evento->fotografias,
            'eventos'=>$user->cliente->eventos
        ]);
    }
    public function guardarFotografia(Fotografia $fotografia){
        DB::table('cliente_fotografia')->insert([
            'cliente_id'=> auth()->user()->cliente->id,
            'fotografia_id'=>$fotografia->id,
        ]);
        return redirect()->route('cliente.index');
    }
}