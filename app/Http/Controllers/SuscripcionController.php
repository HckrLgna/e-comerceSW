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
    public function store(Request $request)
    {
        $suscripcion = new Suscripcion();
        $suscripcion->nombre_plan = DB::table('planes')->where('id',1)->value('nombre_plan');
        $suscripcion->fecha_inicio = Carbon::now();
        $p = Carbon::now();
        $aux = DB::table('planes')->where('id',1)->value('duracion');
        $suscripcion->fecha_final = $p->addDay($aux);
        $suscripcion->user_id = auth()->user()->id;
        $suscripcion->plan_id = 1;
        $suscripcion->save();

        $pago = new Pago();
        $pago->monto = DB::table('planes')->where('id',1)->value('precio');
        $pago->owner = $request->input('nombre');
        $pago->card_number = $request->input('card_number');
        $pago->expiration = $request->input('year');
        $pago->security_code = $request->input('code');
        $pago->user_id = auth()->user()->id;
        $pago->suscripcion_id = DB::table('suscripciones')->max('id');
        $pago->save();
        return redirect()->route('home');
    }
}
