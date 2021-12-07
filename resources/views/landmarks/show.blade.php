@extends('layouts.app')

@section('content')
    <div class="container">
    
        <div class="jumbotron ">
        
            <h3 >
                <small class="text-muted ">Sitio de interes</small>
                <p class="text-center">
                    {{$landmark->name}}
                </p>
            </h3>
            
            <h6 class="text-muted text-center"> {{ $landmark->description }} </h6>

            <hr class="my-4">
            <div class="row">
                <div class="col-5">
                    @if ($landmark->picture != null)
                                
                        <img src="{{asset('images/'.$landmark->picture)}}"   class="img-thumbnail" alt="Image">
                
                    @else
                        <img src="{{asset('images/landmark.jpg')}}"   class="img-thumbnail" alt="Image">
                    @endif
                </div>
            </div>
            

            
            
            <div class="btn-group mt-3" role="group" aria-label="Basic mixed styles example"> 
                @if (Auth::check())
                  @if (Auth::user()->type == 'admin')

                    <a type="button" class="btn btn-warning mt-1" href="{{ route('landmarks.edit', $landmark->id)}}">Editar</a>
                    {{ Form::open(['route'=> 
                        ['landmarks.destroy',$landmark->id],
                        'method'=>'delete',
                        'onsubmit'=> 'return confirm(\'¿Está seguro de que desea remover este punto de interes?\n ¡Esta acción no se puede deshacer!\')']) }}
                        <button type="submit" class="btn btn-danger mt-1" href="{{ route('landmarks.destroy', $landmark->id)}}">Remover</button>
                    {!! Form::close() !!}
                  
                  @endif
              @endif
                
            </div>
        
        </div>
    </div>
@endsection