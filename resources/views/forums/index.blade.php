@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Foros</h1>
    <br>


    <a href="{{route('forums.create')}}" class="btn btn-primary" 
    data-bs-toggle="tooltip" data-bs-placement="bottom" 
    title="Crear un foro">Crear</a>
    
    <br>
    <br>

    <ol class="list-group list-group-numbered">
        @foreach ($forums as $forum)
        <li class="list-group-item h4">
            <a href=" {{ route("forums.show", $forum->id)}}" title="Consultar este foro"> {{$forum->question}} </a>
           
            <div class="btn-group" role="group" aria-label="Basic mixed styles example"> 
                
                {{ Form::open(['route'=> 
                ['forums.destroy',$forum->id],
                'method'=>'delete',
                'onsubmit'=> 'return confirm(\'¿Está seguro de que desea remover el foro?\n ¡Esta acción no se puede deshacer!\')']) }}
                  <button type="submit" class="btn btn-danger mt-3" href="{{ route('forums.destroy', $forum->id)}}">Remover</button>
                {!! Form::close() !!}
            </div>
        </li>  
        @endforeach
        
        
      </ol>
</div>
@endsection