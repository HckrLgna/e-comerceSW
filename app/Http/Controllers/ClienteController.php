<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Fotografia;
use Aws\Rekognition\Exception\RekognitionException;
use Aws\Rekognition\RekognitionClient;
use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        return view('theme.frontoffice.pages.user.cliente.show',[
            'cliente'=>$user->cliente,
            'fotografias' => $user->cliente->fotografias,
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
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
    public function subirFotoPerfil(Request $request){
        $cliente = auth()->user()->cliente;
        if ($request->hasFile('file')) {
            $path = 'profiles/' . $request->file('file')->getClientOriginalName();
            try {
                $s3Client = new S3Client([
                    'version' => 'latest',
                    'region'  => 'us-east-1'
                ]);
                $result = $s3Client->putObject([
                    'Bucket' => 'photograpy-bucket-s3',
                    'Key' => $path,
                    'Body'   => file_get_contents($request->file('file')->getPathName()),
                    'ACL'    => 'public-read',
                ]);
                //Cargar la url a la bd

                $rekoClient = new RekognitionClient([
                    'version' => 'latest',
                    'region'  => 'us-east-1'
                ]);

                    $coleccionId = 'collectionProfile'.$cliente->id;
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

                $resultsRec = $rekoClient->indexFaces([
                    'CollectionId' => $coleccionId,
                    'Image' => [
                        'S3Object' => [
                            'Bucket' => 'photograpy-bucket-s3',
                            'Name' => $path,
                        ]
                    ],
                ]);

                if (count($resultsRec->toArray()['FaceRecords'])){
                    $imageID = $resultsRec->toArray()['FaceRecords'][0]['Face']['ImageId'];
                }
                $clienten = Cliente::all()->find($cliente);
                $clienten->profile_photo_path= $result->toArray()['ObjectURL'];
                $clienten->code = $imageID;
                $clienten->save();

            }catch (\Exception $exception){
                return $exception;
            }
        }else{
            return redirect()->refresh()->with('info','No se logro');
        }
        return redirect()->route('cliente.index')->with('info', 'LA IMAGEN SE CARGO A S3');
    }

}
