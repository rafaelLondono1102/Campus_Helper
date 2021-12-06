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
                    @if (Auth::check())
                   {{ Form::open(['route'=> 
                   ['forums.destroy',$forum->id],
                   'method'=>'delete',
                   'onsubmit'=> 'return confirm(\'¿Está seguro de que desea remover el foro?\n ¡Esta acción no se puede deshacer!\')']) }}

                   <button type="submit" class="btn btn-danger mt-1" href="{{ route('forums.destroy', $forum->id)}}">Remover</button>

                   <a href="{{ route("reports.createcaseforum", $forum->id)}}" class="btn btn-warning mt-1"> Reportar </a>
                   
               {!! Form::close() !!}
                   @endif
                    
                </div>
          </div>

          <div class="jumbotron">
            <h3>Participa de este foro!</h3>
             {!! Form::open(['route' => ['answer.store'],'method' => 'post']) !!}
                 <div class="mb-3">
                     {{ Form::label('answer','Respuesta',['class' => 'form-label']) }}
                     {{ Form::textArea('answer',null,['class' => 'form-control']) }}
                     {{ Form::hidden('forum_id', $forum->id) }}
                 </div>
                 {{ Form::submit('Crear',['class' => 'btn btn-primary']) }}
             {!! Form::close() !!}
        </div>

        @foreach ($answers as $answer)
            <div class="row mt-3">
                <div class="col">
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2">
                                <div class="fw-bold">
                                    <div class="row">
                                        <b>{{ $answer->user->name}}</b>
                                    </div>
                                </div>
                                {{ $answer->answer }}
                            </div>
                            @if (Auth::check())
                                @if (Auth::user()->type == 'admin')
                                    {!! Form::open(['route' => ['answer.destroy',$answer->id],'method' => 'delete',
                                    'onsubmit' => 'return confirm(\'Esta segura que desea remover la respuesta\nEsta acción no se puede deshacer\')']) !!}
                                        <button type="submit" class="btn btn-danger mt-3" onsubmit="">Remover</button>

                                        <a href="{{ route("report_answer.createcaseAnswer", $answer->id)}}" class="btn btn-warning mt-1"> Reportar </a>
                                         
                                    {!! Form::close() !!}
                                @endif
                            @endif
                            
                            
                        </li>
                    </ol>
                </div>
            </div>
        @endforeach
         
    </div>
@endsection