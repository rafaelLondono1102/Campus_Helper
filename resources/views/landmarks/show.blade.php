@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="jumbotron ">

            <h3>
                <small class="text-muted ">Sitio de interes</small>
                <p class="text-center">
                    {{ $landmark->name }}
                </p>
            </h3>

            <h6 class="text-muted text-center"> {{ $landmark->description }} </h6>

            <hr class="my-4">
            <div class="row">
                <div class="col-5">
                    @if ($landmark->picture != null)

                        <img src="{{ asset('images/' . $landmark->picture) }}" class="img-thumbnail" alt="Image">

                    @else
                        <img src="{{ asset('images/landmark.jpg') }}" class="img-thumbnail" alt="Image">
                    @endif
                </div>
                <div class="col-5">
                    <div class="btn-group mt-3" role="group" aria-label="Basic mixed styles example">

                        @if (Auth::check())
                            @if (Auth::user()->type == 'admin')
                                <button type="btn btn-warning" class="btn btn-warning mt-1"
                                    href="{{ route('landmarks.edit', $landmark->id) }}">Editar</button>
                                {{                                 Form::open(['route' => ['landmarks.destroy', $landmark->id], 'method' => 'delete', 'onsubmit' => 'return confirm(\'¿Está seguro de que desea remover este punto de interes?\n ¡Esta acción no se puede deshacer!\')']) }}
                                <button type="submit" class="btn btn-danger mt-1"
                                    href="{{ route('landmarks.destroy', $landmark->id) }}">Remover</button>
                                {!! Form::close() !!}
                            @endif
                        @endif
                    </div>
                    @if (Auth::check())
                        <p>
                            <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button"
                                aria-expanded="false" aria-controls="multiCollapseExample1">Ingresa eventos próximos en
                                {{ $landmark->name }}!</a>
                        </p>
                        <div class="row">
                            <div class="col">
                                <div class="collapse multi-collapse" id="multiCollapseExample1">
                                    <div class="card card-body">
                                        {!! Form::open(['route' => ['event.store'], 'method' => 'post']) !!}
                                        <div class="mb-3">
                                            {{ Form::label('name', 'Nombre', ['class' => 'form-label']) }}
                                            {{ Form::text('name', null, ['class' => 'form-control']) }}

                                            {{ Form::label('description', 'Descripcion', ['class' => 'form-label']) }}
                                            {{ Form::textArea('description', null, ['class' => 'form-control']) }}

                                            {{ Form::label('start_date', 'Fecha de inicio', ['class' => 'form-label']) }}
                                            {{ Form::date('start_date', \Carbon\Carbon::now()) }}

                                            {{ Form::label('end_date', 'Fecha de finalizacion', ['class' => 'form-label']) }}
                                            {{ Form::date('end_date', \Carbon\Carbon::now()) }}

                                            {{ Form::hidden('landmark_id', $landmark->id) }}
                                        </div>
                                        {{ Form::submit('Crear', ['class' => 'btn btn-primary']) }}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div> 
                    @endif
                    

                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($events as $event)
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                    <h5 class="card-title">{{$event->name}}</h5>
                    <p class="card-text">{{$event->description}}</p>
                    <p class="card-subtitle mb-2 text-muted">empieza: {{$event->start_date}}</a>
                    <p class="card-subtitle mb-2 text-muted">termina: {{$event->end_date}}</a>
                    </div>
                </div>
        @endforeach
        </div>
        
    </div>
@endsection
