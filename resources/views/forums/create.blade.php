@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear un nuevo foro</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
        
        {{ Form::open(['route'=>'forums.store','method'=>'post','files' => 'true']) }}
        
            @include('forums.form_fields')
            <br>
            
            {{Form::submit('Crear',['class'=>'btn btn-primary']);}}
            <a href="{{route('home')}}" class="btn btn-secondary">Cancelar</a>
            
            

        {!! Form::close()!!}



    </div>
@endsection