<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Forum;
use App\Models\Landmark;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /*  public function __construct()
    {
        $this->middleware('auth');
    } */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $forums= Forum::orderBy('id','asc')->get();
        $landmarks = Landmark::orderBy('id','asc')->get(); 
        $events = Event::orderBy('id','asc')->get();
        return view('pagina_principal',compact('forums','landmarks','events'));
    }

    public function home(){
        return view('home'); 
    }
}
