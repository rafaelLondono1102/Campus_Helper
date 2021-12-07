<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreForumRequest;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forums= Forum::orderBy('id','asc')->get();
        

        return view('forums.index',compact('forums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->type != 'admin' & Auth::user()->type != 'student')
        {
            Session::flash('failure','EL usuario no tiene permisos para crear foros');

            return redirect(route('home'));

        }
        return view('forums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreForumRequest $request)
    {
        if(Auth::user()->type != 'admin' & Auth::user()->type != 'student')
        {
            Session::flash('failure','EL usuario no tiene permisos para crear foros');

            return redirect(route('home'));

        }
        
        $input = $request->all();
      
        
        $forum=new Forum();
        $forum->fill($input);
        $forum->user_id=Auth::id();
        
        $forum->save();
        

        

        Session::flash('success','Foro creado exitosamente');

        return redirect(route('forums.index'))
        ->with('flash','Foro creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function show(Forum $forum)
    {
        $answers = $forum->answer()->get();
        return view('forums.show', compact('answers','forum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function edit(Forum $forum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forum $forum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forum $forum)
    {
        if(Auth::user()->type != 'admin')
        {
            Session::flash('failure','EL usuario no tiene permisos para eliminar foros');
            $forums= Forum::orderBy('name','asc')->get();
            return view('forums.index',compact('forums'));
        }
        $forum->delete();
        Session::flash('success','Foro removido exitosamente');

        return redirect(route('home'));
    }

    public function showInfo($forum_id)
    {
        //dd($forum_id);
       // $forum= DB::select()
 

       $forum= Forum::find($forum_id);
       //dd($forum);

       $answers = $forum->answer()->get();
        
        return view('forums.show_info', compact('answers','forum'));
    }
}
