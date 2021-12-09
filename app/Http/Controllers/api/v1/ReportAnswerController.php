<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Http\Request;
use App\Models\Report_answers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ReportAnswerResource;

class ReportAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reported_answers = report_answers::orderBy('id','asc')->get();
        return ReportAnswerResource::collection($reported_answers);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reported_answer = new Report_answers();
        $reported_answer->fill($request->all());
        $reported_answer->user_id=Auth::user()->id;
        $reported_answer->save();
        return (new ReportAnswerResource($reported_answer))
                ->response()
                ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report_answers  $report_answers
     * @return \Illuminate\Http\Response
     */
    public function show(Report_answers $reported_answers)
    {
        return (new ReportAnswerResource($reported_answers))
                ->response()
                ->setStatusCode(200);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report_answers  $report_answers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report_answers $reported_answers)
    {
        $reported_answers->update($request->all());
        return (new ReportAnswerResource($reported_answers))
                ->response()
                ->setStatusCode(200);
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
        return response(null,204);
    }
}
