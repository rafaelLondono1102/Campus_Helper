<?php

namespace App\Http\Controllers;

use App\Models\Report_answers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Report_answersController extends Controller
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

    public function createcaseAnswer($answer_id)
    {
        
        return view('reports_answers.create',compact('answer_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
      
        
        $report=new Report_answers();
        $report->fill($input);
        
        $report->user_id=Auth::id();
        //dd($input);
            
        $report->answer_id=$input['answer_id'];
            

        $report->save();

        
        
        Session::flash('success','Reporte creado exitosamente');

        return redirect(route('home'))
        ->with('flash','Reporte creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report_answers  $report_answers
     * @return \Illuminate\Http\Response
     */
    public function show(Report_answers $report_answers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report_answers  $report_answers
     * @return \Illuminate\Http\Response
     */
    public function edit(Report_answers $report_answers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report_answers  $report_answers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report_answers $report_answers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report_answers  $report_answers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report_answers $report_answers)
    {
        $report_answers->delete();
        Session::flash('success','Reporte eliminado exitosamente');

        return redirect(route('home'));
    }
}
