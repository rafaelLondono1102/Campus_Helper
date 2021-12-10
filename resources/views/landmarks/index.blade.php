@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="container " style="background-color: #FFFCFC;">

            <div class="row">
                <div class="col-sm-1">
                    <img src="{{ asset('images/p2.png') }}" class="img-fluid" alt="..." width="80px">
                </div>
                <div class="col-sm-2 section text-dark " style="font-family: 'Yanone Kaffeesatz', sans-serif;">
                    <br>
                    <h2>SITIOS DE INTERÉS</h2>
                </div>
                <div class="col-sm">
                    <br>
                    <a href="{{ route('landmarks.create') }}" class="btn btn-info" data-bs-toggle="tooltip"
                        data-bs-placement="bottom" title="Crear un landmarke">CREAR</a>
                </div>
            </div>
        </div>

        <br>
        <br>

        <div class="container jumbotron" style="background-color: #FFFCFC;">
            <ol class="list-group list-group-numbered">
                <div class="row">
                    @foreach ($landmarks as $landmark)
                        <div class="card border-info mb-3" style="max-width: 18rem; ">
                            <img src="{{ asset('images/' . $landmark->picture) }}" class="card-img-top">
                            <div class="card-body">
                                <a href=" {{ route('landmarks.show', $landmark->id) }}" title="Visitar a este landmarke">
                                    {{ $landmark->name }}
                                </a>
                                <p class="card-text">{{ $landmark->description }}</p>
                                <p class="card-text">{{ $landmark->address }}</p>

                            </div>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">

                                @if (Auth::check())
                                    @if (Auth::user()->type == 'admin')

                                        <a type="button" class="btn btn-warning mt-3"
                                            href="{{ route('landmarks.edit', $landmark->id) }}">Editar</a>
                                        {{ Form::open(['route' => ['landmarks.destroy', $landmark->id], 'method' => 'delete', 'onsubmit' => 'return confirm(\'¿Está seguro de que desea remover el landmarke?\n ¡Esta acción no se puede deshacer!\')']) }}
                                        <button type="submit" class="btn btn-danger mt-3"
                                            href="{{ route('landmarks.destroy', $landmark->id) }}">Remover</button>
                                        {!! Form::close() !!}

                                    @endif
                                @endif


                            </div>
                        </div>
                    @endforeach
                </div>
            </ol>
        </div>


    </div>
@endsection
