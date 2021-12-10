@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="container jumbotron" style="background-color: #FFFCFC;">
            <div class="row" style="background-color: #EAF5FF;">
                <div class="col-sm-1">
                    <img src="{{ asset('images/p222.png') }}" class="img-fluid" alt="..." width="80px">
                </div>
                <div class="col-sm section" style="font-family: 'Yanone Kaffeesatz', sans-serif;">
                    <br>
                    <h1 class="text-uppercase">{{ $landmark->name }}</h1>
                </div>
            </div>


            <hr class="my-1">


            <div class="row">
                <div class="col-5">
                    @if ($landmark->picture != null)

                        <img src="{{ asset('images/' . $landmark->picture) }}" class="img-thumbnail" alt="Image">

                    @else
                        <img src="{{ asset('images/landmark.jpg') }}" class="img-thumbnail" alt="Image">
                    @endif
                </div>

                <div class="col-5">
                    <div class="col-5 bd-example">
                        <details>
                            <summary class="">Descripción.</summary>
                            <h6 class="text-muted text-center"> {{ $landmark->description }} </h6>
                        </details>
                    </div>


                    <div class="btn-group mt-3" role="group" aria-label="Basic mixed styles example">

                        @if (Auth::check())
                            @if (Auth::user()->type == 'admin')
                                <button type="btn btn-warning" class="btn btn-warning mt-1"
                                    href="{{ route('landmarks.edit', $landmark->id) }}">EDITAR</button>
                                {{ Form::open(['route' => ['landmarks.destroy', $landmark->id], 'method' => 'delete', 'onsubmit' => 'return confirm(\'¿Está seguro de que desea remover este punto de interés?\n ¡Esta acción no se puede deshacer!\')']) }}
                                <button type="submit" class="btn btn-danger mt-1"
                                    href="{{ route('landmarks.destroy', $landmark->id) }}">REMOVER</button>
                                {!! Form::close() !!}
                            @endif
                        @endif
                    </div>

                    @if (Auth::check())
                        <p>
                            <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button"
                                aria-expanded="false" aria-controls="multiCollapseExample1">¡Ingresa el próximo evento de
                                {{ $landmark->name }}!</a>
                        </p>
                        <div class="row">
                            <div class="col">
                                <div class="collapse multi-collapse" id="multiCollapseExample1">
                                    <div class="card card-body">
                                        {!! Form::open(['route' => ['event.store'], 'method' => 'post']) !!}
                                        <div class="mb-3">
                                            {{ Form::label('name', 'Nombre del evento', ['class' => 'form-label']) }}
                                            {{ Form::text('name', null, ['class' => 'form-control']) }}

                                            {{ Form::label('description', 'Descripción', ['class' => 'form-label']) }}
                                            {{ Form::textArea('description', null, ['class' => 'form-control']) }}

                                            <div class="col">
                                                {{ Form::label('start_date', 'Fecha de inicio', ['class' => 'form-label']) }}
                                                {{ Form::date('start_date', \Carbon\Carbon::now()) }}

                                                {{ Form::label('end_date', 'Fecha de finalizacion', ['class' => 'form-label']) }}
                                                {{ Form::date('end_date', \Carbon\Carbon::now()) }}
                                            </div>

                                            {{ Form::hidden('landmark_id', $landmark->id) }}
                                        </div>
                                        {{ Form::submit('CREAR EVENTO', ['class' => 'btn btn-success']) }}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif


                </div>
            </div>




            <div class="btn-group mt-3" role="group" aria-label="Basic mixed styles example">
                @if (Auth::check())
                    @if (Auth::user()->type == 'admin')

                        <a type="button" class="btn btn-warning mt-1"
                            href="{{ route('landmarks.edit', $landmark->id) }}">EDITAR</a>
                        {{ Form::open(['route' => ['landmarks.destroy', $landmark->id], 'method' => 'delete', 'onsubmit' => 'return confirm(\'¿Está seguro de que desea remover este punto de interés?\n ¡Esta acción no se puede deshacer!\')']) }}
                        <button type="submit" class="btn btn-danger mt-1"
                            href="{{ route('landmarks.destroy', $landmark->id) }}">REMOVER</button>
                        {!! Form::close() !!}

                    @endif
                @endif

            </div>

        </div>
       
        <div class="container jumbotron" style="background-color: #FFFCFC;">
            <div class="row">
                @foreach ($events as $event)
                <div class="card border-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header"><h5 class="card-title">{{ $event->name }}</h5></div>
                    <div class="card-body text-primary">
                      <h5 class="card-title"><p class="card-text">{{ $event->description }}</p></h5>
                      <p class="card-subtitle mb-2 text-muted">Empieza: {{ $event->start_date }}</a>
                        <p class="card-subtitle mb-2 text-muted">Termina: {{ $event->end_date }}</a>
                    </div>
                  </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
