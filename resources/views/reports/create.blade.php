@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Realizar un reporte</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
        
        {{ Form::open(['route'=>'reports.store','method'=>'post','files' => 'true']) }}
            <div class="mb">
                {{Form::label('description', 'Descripción',['class'=>'form-label'])}} 
                {{ Form::textarea('description',null,['class'=>'form-control','rows'=>'4'])}}
                @php
                    if (isset($answer_id)){
                        echo '<input type="hidden" name="answer_id" value='.$answer_id.'>';
                    }
                    else{
                        echo '<input type="hidden" name="forum_id" value='.$forum_id.'>';
                    }
                @endphp
                
            </div>
            
            <br>
            
            {{Form::submit('Crear',['class'=>'btn btn-primary']);}}
            <a href="{{route('home')}}" class="btn btn-secondary">Cancelar</a>
            
            

        {!! Form::close()!!}



    </div>
@endsection