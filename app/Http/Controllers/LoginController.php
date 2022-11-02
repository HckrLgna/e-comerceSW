<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        $email = $request->input('email');
        $pass = $request->input('password');
        $credentials = array(
            'email' => $email,
            'password' => $pass
        );
        $auth = Auth::attempt($credentials);
        if($auth){
            $user = Auth::user();
            $rol = $user->roles[0]->name;
            if ($rol == 'Fotografo') {
                return redirect()->route('fotografo.show');
            }else{
                if($rol == 'Organizador'){
                    return redirect()->route('evento.participantes',$user->organizador->eventos[0]);
                }elseif($rol  == 'Cliente'){
                    return redirect()->route('cliente.index');
                }else{
                    return view('theme.backoffice.pages.admin.show');
                }
            }
        }else{
            return back()->withErrors([
                'message' => 'El usuario o la contraseña son incorrectos'
            ]);

        }

    }

}
