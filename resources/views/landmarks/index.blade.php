@extends('layouts.app')

@section('content')
<div class="container">
 <h1>Sitios de interes</h1> <br>


    <a href="{{route('landmarks.create')}}" class="btn btn-primary" 
    data-bs-toggle="tooltip" data-bs-placement="bottom" 
    title="Crear un landmarke"
     >Crear</a>
    
    <br>
    <br>


    <ol class="list-group list-group-numbered">
        @foreach ($landmarks as $landmark)
        <li class="list-group-item h4">
            <a href=" {{ route("landmarks.show", $landmark->id)}}" title="Visitar a este landmarke"> {{$landmark->name}} </a>
           
            <div class="btn-group" role="group" aria-label="Basic mixed styles example"> 
                <a type="button" class="btn btn-warning mt-3" href="{{ route('landmarks.edit', $landmark->id)}}">Editar</a>
              

                {{ Form::open(['route'=> 
                ['landmarks.destroy',$landmark->id],
                'method'=>'delete',
                'onsubmit'=> 'return confirm(\'¿Está seguro de que desea remover el landmarke?\n ¡Esta acción no se puede deshacer!\')']) }}
                  <button type="submit" class="btn btn-danger mt-3" href="{{ route('landmarks.destroy', $landmark->id)}}">Remover</button>
                {!! Form::close() !!}
            </div>
        </li>  
        @endforeach
        
        
      </ol>
</div>
@endsection