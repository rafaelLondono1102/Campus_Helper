@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="" style="font-family: 'Yanone Kaffeesatz'">
            <h1>CREAR PREGUNTA PARA MOSTRAR EN EL FORO.</h1>
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
        <div class="row">
            <div class="col-sm-1">
                <img src="{{ asset('images/p11.png') }}" class="img-fluid" alt="..." width="100px">
            </div>
            <div class="col-sm section text-dark">
                <br>
                {{ Form::open(['route' => 'forums.store', 'method' => 'post', 'files' => 'true']) }}

                @include('forums.form_fields')
                <br>

                {{ Form::submit('Crear pregunta', ['class' => 'btn btn-primary']) }}
                <a href="{{ route('home') }}" class="btn btn-danger">Cancelar</a>



                {!! Form::close() !!}
            </div>
        </div>




    </div>
@endsection
