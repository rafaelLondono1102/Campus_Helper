@extends('layouts.app')

@section('content')
    <h1><center>Campus Helper</h1>
        <i class="fas fa-axe-battle"></i>
    <br>
    <div class="container jumbotron">
        <h1 ><center>Sitios de Interes!</h1>
        <div class="row">
            @foreach ($landmarks as $landmark)
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('images/' . $landmark->picture) }}" class="card-img-top">
                    <div class="card-body">
                    <h5 class="card-title">{{$landmark->name}}</h5>
                    <p class="card-text">{{$landmark->description}}</p>
                    <a href="{{route("landmarks.show",$landmark->id)}}">Más información</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <br>
    <div class="container jumbotron">
        <h1 ><center>Eventos!</h1>
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
    <br>
    <div class="container jumbotron">
        <h1 ><center>Foros!</h1>
        <div class="row">
            @foreach ($forums as $forum)
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                    <a class="card-title" href="{{route("forums.show",$forum->id)}}"><big>{{$forum->question}}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
