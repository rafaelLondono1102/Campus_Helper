@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar un landmarke</h1>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error )
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{ Form::model($landmark,['route'=>['landmarks.update',$landmark->id], 'method'=>'put']) }}
            
            @include('landmarks.form_fields')

            {{Form::submit('Editar',['class'=>'btn btn-primary']);}}
            <a href="{{route('home')}}" class="btn btn-secondary">Cancelar</a>
            

        {!! Form::close()!!}



    </div>
@endsection
