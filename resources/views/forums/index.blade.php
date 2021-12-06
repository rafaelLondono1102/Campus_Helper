@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Foros</h1>
        <br>

        @if (Auth::check())
            <a href="{{ route('forums.create') }}" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="bottom"
                title="Crear un foro">Crear</a>
       @endif 
        <br>
        <br>

        <ol class="list-group list-group-numbered">
            @foreach ($forums as $forum)
                <li class="list-group-item h4">

                    <div class="col-lg-3 col-md-4 mb-3">

                        <div class="card">

                            <div class="card-body">
                                <h6 class="text-muted">{{ $forum->user->name }} {{ $forum->user->lastname }}</h6>

                                <p class="card-text">
                                    {{ $forum->question }}
                                </p>
                                @if (Auth::check())
                                    <a href="{{ route('forums.show', $forum->id) }}" class="card-link">Ver foro</a>
                                @else
                                    <a href="{{ route('forum.info', $forum->id) }}" class="card-link">Ver foro</a>
                                @endif
                                
                            </div>

                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">

                                @if (Auth::check())
                                    @if (Auth::user()->type == 'admin')
                                        {{ Form::open(['route' => ['forums.destroy', $forum->id], 
                                        'method' => 'delete', 'onsubmit' => 'return confirm(\'¿Está seguro de que desea remover el foro?\n ¡Esta acción no se puede deshacer!\')']) }}
                                        <button type="submit" class="btn btn-danger mt-3"
                                            href="{{ route('forums.destroy', $forum->id) }}">Remover</button>
                                        {!! Form::close() !!}
                                    @endif
                                @endif

                            </div>

                        </div>

                    </div>






                </li>
            @endforeach
        </ol>


    </div>
@endsection
