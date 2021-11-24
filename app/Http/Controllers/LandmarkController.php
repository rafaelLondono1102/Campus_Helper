<?php

namespace App\Http\Controllers;

use App\Models\Landmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreLandmarkRequest;

class LandmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $landmarks= Landmark::orderBy('name','asc')->get();
        return view('landmarks.index',compact('landmarks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->type != 'student')
        {
            Session::flash('failure','EL usuario no tiene permisos para crear restaurantes');

            return redirect(route('home'));

        }
        
        return view('landmarks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLandmarkRequest $request)
    {
        if(Auth::user()->type != 'student')
        {
            Session::flash('failure','EL usuario no tiene permisos para crear restaurantes');

            return redirect(route('home'));

        }
        
        $input = $request->all();
      
        $landmark=new Landmark();
        $landmark->fill($input);
        
        //guardamos el archivo/logo para poder recuperarlo y mostrarlo
        if($request->hasFile('picture')){
            $file=$request->file('picture');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('images',$filename);
            $landmark->picture=$filename;
        }
        else{
            $filename='landmark.png';
            $landmark->picture=$filename;
        }
        
        $landmark->save();

        Session::flash('success','Restaurante creado exitosamente');

        return redirect(route('home'))
        ->with('flash','Restaurante creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Landmark  $landmark
     * @return \Illuminate\Http\Response
     */
    public function show(Landmark $landmark)
    {
        
        return view('landmarks.show', compact('landmark'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Landmark  $landmark
     * @return \Illuminate\Http\Response
     */
    public function edit(Landmark $landmark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Landmark  $landmark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Landmark $landmark)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Landmark  $landmark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Landmark $landmark)
    {
        //
    }
}
