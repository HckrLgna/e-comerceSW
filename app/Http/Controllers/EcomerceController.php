<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Fotografia;
use App\Models\Product;
use Aws\Rekognition\Exception\RekognitionException;
use Aws\Rekognition\RekognitionClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Sodium\add;

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
        if ($user->cliente){
            if($user->cliente->eventos){
                $eventos = $user->cliente->eventos;
                $fotografias=[];
                foreach($eventos as $evento){
                    $fotografias = $evento->fotografias;
                }
                return view('theme.frontoffice.pages.e-comerce.show',[
                    'fotografias' => $fotografias,
                    'eventos'=> $eventos
                ]);
            }else{
                //si fotografo no tiene eventos
            }
        }else{
            if ($user->fotografo){
                return view('theme.frontoffice.pages.e-comerce.show',[
                    'fotografias' => Fotografia::all(),
                    'eventos'=>$user->fotografo->eventos,
                ]);
            }elseif ($user->organizador){
                return view('theme.frontoffice.pages.e-comerce.show',[
                    'fotografias' => Fotografia::all(),
                    'eventos'=>$user->organizador->eventos
                ]);
            }
        }
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
        if (auth()->user() && auth()->user()->cliente){
            DB::table('cliente_fotografia')->insert([
                'cliente_id'=> auth()->user()->cliente->id,
                'fotografia_id'=>$fotografia->id,
            ]);
            $fotografia->code = true;
            $fotografia->save();
            return redirect()->route('cliente.index');
        }else{
            return redirect()->route('loggin');
        }
    }
    public function filtrarReconocimiento(Request $request){
        $user = auth()->user();
        $coleccionId = 'collection'.$request->input('evento_id');
        $cliente = $user->cliente;
        $evento =Evento::find($request->input('evento_id'));
        $fotosEvento = $evento->fotografias;
        $resultado = array();
        $id_image_list = array();
        try {
            $rekoClient = new RekognitionClient([
                'version' => 'latest',
                'region'  => 'us-east-1'
            ]);
            $results = $rekoClient->searchFacesByImage([
                'CollectionId' => $coleccionId,
                'FaceMatchThreshold' => 95,
                'Image' => [ 'Bytes' => file_get_contents($request->file('path_image')->getPathname()) ],
                //'MaxFaces' => 5,
            ]);
        } catch (RekognitionException $e) {
            return $e->getMessage() . "\n";
        }

        $faceMatches = $results->toArray()['FaceMatches'];
        foreach ($faceMatches as $faceMatch){
            array_push( $id_image_list, $faceMatch['Face']['ImageId']);
        }
        foreach ($fotosEvento as $fotografia){
            if ( in_array($fotografia->code,$id_image_list) ){
                array_push( $resultado , $fotografia);
            }
        }
        return view('theme.frontoffice.pages.e-comerce.show',[
            'fotografias' => $resultado,
            'eventos'=>$user->cliente->eventos
        ]);
    }
}
