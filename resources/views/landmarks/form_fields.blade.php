
    
            <div class="mb">

            {{Form::label('name', 'Nombre',['class'=>'form-label'])}} 
            {{ Form::text('name',null,['class'=>'form-control','maxlength'=>50])}}
            </div>

            <div class="mb">

                {{Form::label('address', 'Dirección',['class'=>'form-label'])}} 
                {{ Form::text('address',null,['class'=>'form-control','maxlength'=>30])}}
            </div>

            <div class="mb">

                {{Form::label('description', 'Descripción',['class'=>'form-label'])}} 
                {{ Form::textarea('description',null,['class'=>'form-control','rows'=>'4'])}}
            </div>

            <div class="mt-2">
                {{Form::label('picture', 'Logo',['class'=>'form-label'])}} 
                <br>
                {{ Form::file('picture')}}
            </div>

