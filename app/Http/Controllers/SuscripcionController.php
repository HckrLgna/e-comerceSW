<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Suscripcion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SuscripcionController extends Controller
{
    public function index(){
        if(auth()->user()){
            return view('theme.frontoffice.pages.plan.index',[
                'user'=>Auth::user(),
            ]);
        }else{
            return redirect()->route('login');
        }

    }
    public function store(Request $request, $id)
    {
        $suscripcion = new Suscripcion();
        $suscripcion->nombre_plan = DB::table('planes')->where('plan_id',$id)->value('nombre_plan');
        $suscripcion->fecha_inicio = Carbon::now();
        $p = Carbon::now();
        $aux = DB::table('planes')->where('plan_id',$id)->value('duracion');
        $suscripcion->fecha_final = $p->addDay($aux);
        $suscripcion->id_user = auth()->user()->id;
        $suscripcion->id_plan = $id;
        $suscripcion->save();

        $pago = new Pago();
        $pago->monto = DB::table('planes')->where('id_Plan',$id)->value('Precio');
        $pago->owner = $request->input('nombre');
        $pago->card_number = $request->input('card_number');
        $pago->expiration_month = $_POST['month'];
        $pago->expiration_year = $_POST['year'];
        $pago->security_code = $request->input('code');
        $pago->user_id = auth()->user()->id;
        $pago->suscripcion_id = DB::table('suscripciones')->max('id_suscrip');
        $pago->save();


        return redirect()->route('home');
    }
}
