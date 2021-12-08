@extends('layouts.app')

@section('content')

    {{-- Foro --}}
    <div class="container section" style="background-color: #EAF5FF; font-family: 'Yanone Kaffeesatz', sans-serif;">
        <div class="row">
            <div class="col-sm-1">
                <img src="{{ asset('images/pp1.png') }}" class="img-fluid" alt="..." width="80px">
            </div>
            <div class="col-sm section">
                <br>
                <h3>FOROS</h3>
            </div>
        </div>

    </div>
    <div class="container jumbotron" style="background-color: #FFFCFC;">

        <div class="row">
            @foreach ($forums as $forum)
                <div class="card text-dark bg-succes mb-8" style="max-width: 19rem; background-color: #EAF5FF;">

                    <div class="card-header">
                        <img src="{{ asset('images/pp11.png') }}" class="img-fluid" alt="..." width="20px">
                        {{ $forum->user->name }}
                    </div>
                    <div class="card-body">
                        <a class="card-title"
                            href="{{ route('forums.show', $forum->id) }}">{{ $forum->question }}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <br>

    {{-- Sitios de interés --}}
    <div class="container section" style="background-color: #EAF5FF; font-family: 'Yanone Kaffeesatz', sans-serif;">
        <div class="row">
            <div class="col-sm-1">
                <img src="{{ asset('images/location-pin.png') }}" class="img-fluid" alt="..." width="80px">
            </div>
            <div class="col-sm section">
                <br>
                <h3>SITIOS DE INTERÉS</h3>
            </div>
        </div>

    </div>
    <div class="container jumbotron" style="background-color: #FFFCFC;">
        <div class="row">
            @foreach ($landmarks as $landmark)
                <div class="card border-info mb-3" style="max-width: 18rem; ">
                    <img src="{{ asset('images/' . $landmark->picture) }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $landmark->name }}</h5>
                        <p class="card-text">{{ $landmark->description }}</p>
                        <a href="{{ route('landmarks.show', $landmark->id) }}">Más información.</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <br>

    {{-- Eventos --}}
    <div class="container section" style="background-color: #EAF5FF; font-family: 'Yanone Kaffeesatz', sans-serif;">
        <div class="row">
            <div class="col-sm-1">
                <img src="{{ asset('images/pp3.png') }}" class="img-fluid" alt="..." width="80px">
            </div>
            <div class="col-sm section">
                <br>
                <h3>EVENTOS</h3>
            </div>
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
    <br>


@endsection
