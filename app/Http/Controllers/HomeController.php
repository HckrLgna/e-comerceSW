<?php

namespace App\Http\Controllers;

use App\Models\Fotografo;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**public function __construct()
    {
        $this->middleware('auth');
    }
    * /
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::all();
        return view('theme.frontoffice.pages.landingpage.landingpage',[
            'users'=> User::all(),
        ]);
    }
    public function about(){
        return view('theme.frontoffice.pages.about.about');
    }
}
