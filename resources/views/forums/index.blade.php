@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container " style="background-color: #FFFCFC;">

            <div class="row">
                <div class="col-sm-1">
                    <img src="{{ asset('images/p1.png') }}" class="img-fluid" alt="..." width="80px">
                </div>
                <div class="col-sm section text-dark">
                    <br>
                    @if (Auth::check())
                        <a href="{{ route('forums.create') }}" type="button" class="btn btn-outline-primary" style="background-color: #EAF5FF;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Crear un foro.">REALIZAR PREGUNTA...</a>
                    @endif
                </div>
            </div>
        </div>

        <br>
        <br>
        <br>

        <ol class="list-group list-group-numbered ">
            @foreach ($forums as $forum)
                <li class="list-group-item h4 list-group-item-primary">

                    <div class="col-lg-3 col-md-4 mb-3">

                        <div class="card" style="width: 69rem;">
                            <div class="card-header">
                                <h6 class="text-muted">{{ $forum->user->name }} {{ $forum->user->lastname }}</h6>
                            </div>
                            <div class="card-body">
                              <blockquote class="blockquote mb-0">
                                <p class="card-text">
                                    {{ $forum->question }}
                                </p>
                                @if (Auth::check())
                                    <a href="{{ route('forums.show', $forum->id) }}" class="card-link">Ver foro</a>
                                @else
                                    <a href="{{ route('forum.info', $forum->id) }}" class="card-link">Ver foro</a>
                                @endif

                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">

                                    @if (Auth::check())
                                        @if (Auth::user()->type == 'admin')
                                            {{                                         Form::open(['route' => ['forums.destroy', $forum->id], 'method' => 'delete', 'onsubmit' => 'return confirm(\'¿Está seguro de que desea remover el foro?\n ¡Esta acción no se puede deshacer!\')']) }}
                                            <button type="submit" class="btn btn-danger mt-3"
                                                href="{{ route('forums.destroy', $forum->id) }}">Remover</button>
                                            {!! Form::close() !!}
                                        @endif
                                    @endif

                                </div>
                              </blockquote>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ol>
    </div>
@endsection
