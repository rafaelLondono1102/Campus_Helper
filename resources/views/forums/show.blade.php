@extends('layouts.app')


@section('content')
    <div class="container">
    
          <div class="jumbotron ">
            
                <h3 >
                    <small class="text-muted ">Foro</small>
                    <h6 class="text-muted">{{ $forum ->user->name}} {{ $forum ->user->lastname}}</h6>
                    <h2 class="text-center">
                        {{$forum->question}}
                    </h2>
                </h3>
                
                <div class="btn-group mt-3" role="group" aria-label="Basic mixed styles example"> 
                   
                    {{ Form::open(['route'=> 
                        ['forums.destroy',$forum->id],
                        'method'=>'delete',
                        'onsubmit'=> 'return confirm(\'¿Está seguro de que desea remover el foro?\n ¡Esta acción no se puede deshacer!\')']) }}

                        <button type="submit" class="btn btn-danger mt-1" href="{{ route('forums.destroy', $forum->id)}}">Remover</button>

                        <a href="{{ route("reports.create", $forum->id)}}" class="btn btn-warning mt-1"> Reportar </a>
                        
                    {!! Form::close() !!}

                    
                    
                    

                    

                </div>
                
         
          </div>
        
        
       
        
    </div>
@endsection