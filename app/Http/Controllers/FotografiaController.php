<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Evento;
use App\Models\Fotografia;
use Aws\Rekognition\Exception\RekognitionException;
use Aws\Rekognition\RekognitionClient;
use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client;
use Illuminate\Http\Request;

class FotografiaController extends Controller
{
    public function create(){

    }
    public function store(Request $request,Evento $evento){
        $user = auth()->user();
        if ($request->hasFile('file')) {
            try {
                    $path = 'folderevento'.$evento->id.'/'. $request->file('file')->getClientOriginalName();
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

                    $rekoClient = new RekognitionClient([
                        'version' => 'latest',
                        'region'  => 'us-east-1'
                    ]);
                    $resultsRec = $rekoClient->indexFaces([
                        'CollectionId' => 'collection'.$evento->id,
                        'Image' => [
                            'S3Object' => [
                                'Bucket' => 'photograpy-bucket-s3',
                                'Name' => $path,
                            ]
                        ],
                    ]);
                try {
                    if (count($resultsRec->toArray()['FaceRecords'])){
                        $imageID = $resultsRec->toArray()['FaceRecords'][0]['Face']['ImageId'];
                    }
                    $fotografia = new Fotografia();
                    $fotografia->path_img = $result->toArray()['ObjectURL'];
                    $fotografia->code = $imageID;
                    $fotografia->nombre_propietario = "unknown";
                    $fotografia->descripcion=$request->input('descripcion');
                    $fotografia->evento_id = $evento->id;
                    $fotografia->save();
                }catch (ErrorException $e){
                    return $e;
                }
            }catch (\Exception $exception){
                return $exception;
            }
        }else{
            return redirect()->refresh();
        }
        return redirect()->route('evento.album',$evento);
    }
}
