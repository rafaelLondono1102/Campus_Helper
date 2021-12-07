<div class="mb">
    {{Form::label('name', 'Nombre',['class'=>'form-label'])}} 
    {{ Form::text('name',null,['class'=>'form-control','maxlength'=>60])}}
</div>

<div class="mb">
    {{Form::label('start_date', 'Fecha de inicio',['class'=>'form-label'])}} 
    {{Form::date('start_date', \Carbon\Carbon::now())}}  
</div>

<div class="mb">
    {{Form::label('end_date', 'Fecha de fin',['class'=>'form-label'])}} 
    {{Form::date('end_date', \Carbon\Carbon::now())}}    
</div>

<div class="mb">

    {{Form::label('description', 'Descripción',['class'=>'form-label'])}} 
    {{ Form::textarea('description',null,['class'=>'form-control','rows'=>'4'])}}
</div>



    
    
    
  
    


