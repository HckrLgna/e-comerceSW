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
                try {
                    $s3Client = new S3Client([
                        'version' => 'latest',
                        'region'  => 'us-east-1'
                    ]);
                    $result = $s3Client->putObject([
                        'Bucket' => 'photograpy-bucket-s3',
                        'Key' => 'eventos/'.$evento->id.'/'. $request->file('file')->getClientOriginalName(),
                        'Body'   => file_get_contents($request->file('file')->getPathName()),
                        'ACL'    => 'public-read',
                    ]);
                } catch ( S3Exception $e ) {
                    return $e->getMessage() . "\n";
                }
                try {
                    $rekoClient = new RekognitionClient([
                        'version' => 'latest',
                        'region'  => 'us-east-1'
                    ]);
                    $resultsRec = $rekoClient->indexFaces([
                        'CollectionId' => 'evento'.$evento->id,
                        'Image' => [
                            'S3Object' => [
                                'Bucket' => 'photograpy-bucket-s3',
                                'Name' => $result->toArray()['ObjectURL'],
                            ]
                        ],
                    ]);
                } catch (RekognitionException $e) {
                    return $e->getMessage() . "\n";
                }
                try {
                    if (count($resultsRec->toArray()['FaceRecords'])){
                        $imageID = $resultsRec->toArray()['FaceRecords'][0]['Face']['ImageId'];
                    }
                    $fotografia = new Fotografia();
                    $fotografia->path_img = $result->toArray()['ObjectURL'];
                    $fotografia->code = $imageID;
                    $fotografia->nombre_propietario = "unknown";
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
