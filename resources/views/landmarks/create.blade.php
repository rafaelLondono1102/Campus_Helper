@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container section" style="background-color: #EAF5FF; font-family: 'Yanone Kaffeesatz', sans-serif;">
            <div class="row">
                <div class="col-sm-1">
                    <img src="{{ asset('images/p22.png') }}" class="img-fluid" alt="..." width="80px">
                </div>
                <div class="col-sm section">
                    <br>
                    <h3>PROPONER SITIO DE INTERÉS</h3>
                </div>
            </div>

        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif

        
        {{ Form::open(['route'=>'landmarks.store','method'=>'post','files' => 'true']) }}

            @include('landmarks.form_fields')


            {{Form::submit('Crear',['class'=>'btn btn-primary']);}}
            <a href="{{route('home')}}" class="btn btn-secondary">Cancelar</a>



        {!! Form::close()!!}



    </div>
@endsection
