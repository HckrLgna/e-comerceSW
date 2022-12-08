<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Evento;
use App\Models\Fotografo;
use App\Models\Organizador;
use App\Models\User;
use Aws\Rekognition\Exception\RekognitionException;
use Aws\Rekognition\RekognitionClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Whoops\Exception\ErrorException;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evento = auth()->user()->organizador->eventos[0];
        $qr_svg = QrCode::generate('http://44.203.139.176/registrar/'.$evento->id.'/usuario', '../public/qrcodes/evento'.$evento->id.'.svg');
        return view('theme.frontoffice.pages.evento.index',[
            'evento' => $evento
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('theme.frontoffice.pages.evento.create',[
            'fotografos'=>Fotografo::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->save();

            $organizador = new Organizador();
            $organizador->name = $request->input('name');
            $organizador->last_name = $request->input('last_name');
            $organizador->address = $request->input('address');
            $organizador->user_id = $user->id;
            $organizador->save();

            DB::table('role_user')->insert([
                'role_id'=>3,
                'user_id'=>$user->id,
            ]);

            $evento = new Evento();
            $evento->nombre = $request->input('nombre');
            $evento->fecha = $request->input('fecha');
            $evento->lugar = $request->input('event_address');
            $evento->fotografo_id = $request->input('id_fotografo');
            $evento->organizador_id = $organizador->id;
            $evento->save();
                $rekoClient = new RekognitionClient([
                    'version' => 'latest',
                    'region'  => 'us-east-1'
                ]);
                $coleccionId = 'collection'.$evento->id;
                $colecciones = $rekoClient->listCollections(['CollectionId']);
                $listaColleciones = $colecciones->toArray()['CollectionIds'];
                foreach ($listaColleciones as $collecion){
                    if ($collecion == $coleccionId){
                        $results = $rekoClient->deleteCollection([
                            'CollectionId' => $coleccionId,
                        ]);
                    }
                }
                $results = $rekoClient->createCollection([
                    'CollectionId' =>$coleccionId ,
                ]);
        } catch ( ErrorException $e) {
            return $e;
        }

        return redirect()->route('evento.participantes',$evento);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        return view('theme.frontoffice.pages.evento.participantes',[
            'evento'=>$evento,
            'clientes'=> $evento->clientes,
            'fotografo'=>$evento->fotografo
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        //
    }
    public function participantes(Evento $evento){
        return view('theme.frontoffice.pages.evento.participantes',[
            'evento'=>$evento,
            'clientes'=> $evento->clientes,
            'fotografo'=>$evento->fotografo
        ]);
    }
    public function album(Evento $evento){
        return view('theme.frontoffice.pages.evento.photos.show',[
                'evento' => $evento,
                'fotografias'=> $evento->fotografias,
            ]);
    }
    public function registrarUsuario(Evento $evento){
        $user=auth()->user();
        if ($user){
            if ($user->cliente){
                DB::table('cliente_evento')->insert([
                    'qr_photo_path'=> auth()->user()->cliente->id,
                    'cliente_id'=>$user->cliente->id,
                    'evento_id'=> $evento->id
                ]);
                return redirect()->route('ecomerce.index');
            }elseif ($user->fotografo){
                if ($user->fotografo->id == $evento->fotografo_id){
                    return redirect()->route('evento.album',$evento);
                }else{
                    return redirect()->route('evento.index');
                }
            }
        }else{
            return redirect()->route('loggin');
        }
    }
}
