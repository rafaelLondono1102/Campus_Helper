@extends('layouts.app')


@section('content')
    <div class="container">
    
          <div class="jumbotron ">
            
                <h3 >
                    <small class="text-muted ">Foro</small>
                    <p class="text-center">
                        {{$forum->question}}
                    </p>
                </h3>
                
                <div class="btn-group mt-3" role="group" aria-label="Basic mixed styles example"> 
                   
                    {{ Form::open(['route'=> 
                        ['forums.destroy',$forum->id],
                        'method'=>'delete',
                        'onsubmit'=> 'return confirm(\'¿Está seguro de que desea remover el foro?\n ¡Esta acción no se puede deshacer!\')']) }}
                        <button type="submit" class="btn btn-danger mt-1" href="{{ route('forums.destroy', $forum->id)}}">Remover</button>
                    {!! Form::close() !!}
                </div>
         
          </div>
        
        
       
        
    </div>
@endsection