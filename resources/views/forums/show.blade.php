@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="jumbotron" style="background-color: #FFFCFC;">

            <div class="container section" style="font-family: 'Yanone Kaffeesatz', sans-serif;">
                <div class="row">
                    <div class="col-sm-1">
                        <img src="{{ asset('images/pp11.png') }}" class="img-fluid" alt="..." width="80px">
                    </div>
                    <div class="col-sm section">
                        <br>
                        <h3>FORO ESPECÍFICO</h3>
                    </div>
                </div>

            </div>

            <div class="card bg-info " style="width: 69rem; ">
                <div class="card-header">
                    <h6 class="text-muted text-black">{{ $forum->user->name }} {{ $forum->user->lastname }} comenta... </h6>
                </div>

                <div class="card-body">
                    <h2 class="fw-bolder">
                        {{ $forum->question }}
                    </h2>
                </div>

            </div>

            {{-- Tanto eliminar como reportar un foro. --}}
            <div class="btn-group mt-3" role="group" aria-label="Basic mixed styles example">
                @if (Auth::check())
                    @if (Auth::user()->type == 'admin')

                        {{Form::open(['route' => ['forums.destroy', $forum->id], 'method' => 'delete', 'onsubmit' => 'return confirm(\'¿Está seguro de que desea remover el foro?\n ¡Esta acción no se puede deshacer!\')']) }}
                        <button type="submit" class="btn btn-danger mt-1"
                            href="{{ route('forums.destroy', $forum->id) }}">Remover</button>
                        {!! Form::close() !!}
                    @endif
                    <a href="{{ route('reports.createcaseforum', $forum->id) }}" class="btn btn-danger mt-1 "> Reportar
                    </a>
                @endif

            </div>
        </div>

        {{-- Comentario del usuario --}}
        <div class="jumbotron" style="background-color: #FFFCFC;">
            <div class="container section" style="font-family: 'Yanone Kaffeesatz', sans-serif;">
                <div class="row">
                    <div class="col-sm-1">
                        <img src="{{ asset('images/pp111.png') }}" class="img-fluid" alt="..." width="80px">
                    </div>
                    <div class="col-sm section">
                        <br>
                        <h3>¡PARTICIPA DE ÉSTE FORO!</h3>
                    </div>
                </div>

            </div>
            {!! Form::open(['route' => ['answer.store'], 'method' => 'post']) !!}
            <div class="mb-3">
                {{ Form::label('', '', ['class' => 'form-label']) }}
                {{ Form::textArea('answer', null, ['class' => 'form-control ' ]) }}
                {{ Form::hidden('forum_id', $forum->id) }}
            </div>
            {{ Form::submit('ENVIAR', ['class' => 'btn btn-primary']) }}
            {!! Form::close() !!}
        </div>

        {{-- Comentario del resto de los participantes --}}
        <div class="jumbotron" style="background-color: #FFFCFC;">
            @foreach ($answers as $answer)
            <div class="row mt-3">
                <div class="col">
                    <div class="container section" style="font-family: 'Yanone Kaffeesatz', sans-serif;">
                        <div class="row">
                            <div class="col-sm-1">
                                <img src="{{ asset('images/pp1111.png') }}" class="img-fluid" alt="..." width="80px">
                            </div>
                            <div class="col-sm section">
                                <br>
                                <h3>COMENTARIOS</h3>
                            </div>
                        </div>

                    </div>


                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item d-flex justify-content-between align-items-start">

                            <div class="card" style="width: 69rem;">
                                <div class="card-header">
                                    <b>{{ $answer->user->name }}</b>
                                </div>
                                <div class="card-body">
                                  <blockquote class="blockquote mb-0">
                                    <p class="card-text">
                                        {{ $answer->answer }}
                                    </p>
                                  </blockquote>
                                </div>
                            </div>

                            @if (Auth::check())
                                @if (Auth::user()->type == 'admin')
                                    {!! Form::open(['route' => ['answer.destroy', $answer->id], 'method' => 'delete', 'onsubmit' => 'return confirm(\'Esta segura que desea remover la respuesta\nEsta acción no se puede deshacer\')']) !!}
                                    <button type="submit" class="btn btn-danger mt-3" onsubmit="">Remover</button>

                                    <a href="{{ route('report_answer.createcaseAnswer', $answer->id) }}"
                                        class="btn btn-warning mt-1"> Reportar </a>

                                    {!! Form::close() !!}
                                @endif
                            @endif


                        </li>
                    </ol>
                </div>
            </div>
        @endforeach
        </div>


    </div>
@endsection
