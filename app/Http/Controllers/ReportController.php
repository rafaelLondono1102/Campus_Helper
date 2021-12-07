<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Forum $forum)
    {
        
        return view('reports.create',compact('forum'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->type != 'admin' & Auth::user()->type != 'student')
        {
            Session::flash('failure','EL usuario no tiene permisos para crear reportes');

            return redirect(route('home'));

        }
        
        $input = $request->all();
      
        
        $report=new Report();
        $report->fill($input);
        
        $report->user_id=Auth::id();
        $report->forum_id=$input['forum_id'];
        //$report->answer_id=$input['answer_id'];
        //TODO: pasarle el id del foro o del comentario que se quiere reportar
        $report->save();    
        Session::flash('success','Reporte creado exitosamente');
        return redirect(route('home'))
        ->with('flash','Reporte creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        return view('reports.show', compact('report'));
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        $report->delete();
        Session::flash('success','Reporte eliminado exitosamente');

        return redirect(route('home'));
    }
}
