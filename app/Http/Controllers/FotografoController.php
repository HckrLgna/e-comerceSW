<?php

namespace App\Http\Controllers;

use App\Models\Fotografo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FotografoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fotografo = Auth::user()->fotografo;
        return view('theme.frontoffice.pages.user.fotografo.show',[
            'fotografo' => $fotografo,
            'eventos' => $fotografo->eventos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('theme.frontoffice.pages.user.fotografo.create');
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
            $fotografo = new Fotografo();
            $fotografo->ciudad = $request->input('ciudad');
            $fotografo->celular = $request->input('celular');
            if ($request->input('estudio_fotografico')=="Si") {$fotografo->estudio_fotografico = true;}
            else{
                $fotografo->estudio_fotografico=false;
            }

            $fotografo->user_id = DB::table('users')->max('id');
            $fotografo->save();
            $email = $request->input('email');
            $pass = $request->input('password');
            $credentials = array(
                'email' => $email,
                'password' => $pass
            );
            DB::table('role_user')->insert([
                'role_id'=>2,
                'user_id'=>$user->id,
            ]);
        }catch (\Exception $exception){
            return $exception;
        }

        return view('theme.frontoffice.pages.admin.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fotografo  $fotografo
     * @return \Illuminate\Http\Response
     */
    public function show(Fotografo $fotografo)
    {
        return view('theme.frontoffice.pages.user.fotografo.show',[
            'fotografo'=>$fotografo,
            'eventos' => $fotografo->eventos,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fotografo  $fotografo
     * @return \Illuminate\Http\Response
     */
    public function edit(Fotografo $fotografo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fotografo  $fotografo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fotografo $fotografo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fotografo  $fotografo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fotografo $fotografo)
    {
        //
    }
    public function showProfile(Fotografo $fotografo)
    {
        return view('theme.frontoffice.pages.user.fotografo.showProfile',[
            'fotografo'=>$fotografo,
            'eventos' => $fotografo->eventos,

        ]);
    }
}
