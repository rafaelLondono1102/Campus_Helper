@extends('layouts.app')
@include('comments.index')

@section('content')
    <div class="container">
    
          <div class="jumbotron ">
            
                <h3 >
                    <small class="text-muted ">Restaurante</small>
                    <p class="text-center">
                        {{$restaurant->name}}
                    </p>
                </h3>
                
                <h6 class="text-muted text-center"> {{ $restaurant->category->name }} </h6>
                <h6 class="text-muted text-center"> {{ $restaurant->description }} </h6>

                <hr class="my-4">
                <div class="row">
                    <div class="col-5">
                        @if ($restaurant->logo != null)
                                 
                            <img src="{{asset('images/'.$restaurant->logo)}}"   class="img-thumbnail" alt="Image">
                   
                        @else
                            <img src="{{asset('images/restaurant.png')}}"   class="img-thumbnail" alt="Image">
                        @endif
                    </div>
                    <div class="col-7">
                        <p class="lead">
                            
                            Servimos en {{$restaurant->city}} en el horario de  {{$restaurant->schedule ?? "sin agenda definida"}} <br> 
                            

                            @if ($restaurant->delivery =='y')
                                Tenemos domicilios al número {{ $restaurant->phone}} <br>
                        
                            
                            @else
                
                                Para más información contáctenos al número {{ $restaurant->phone}} <br>
                        
                            @endif

                            

                            @if ($restaurant->twitter !=null || $restaurant->instagram !=null || $restaurant->facebook !=null || $restaurant->youtube !=null)
                                Nuestras redes sociales son: <br>
                                @if ($restaurant->twitter !=null)
                                    <a href="https://twitter.com/?lang=es">
                                        <i class="fab fa-twitter"></i>
                                        <span> Twitter: {{$restaurant->twitter}}</span>
                                        <br>
                                    </a>  
                                @endif
                                @if ($restaurant->facebook !=null)
                                    <a href="https://www.facebook.com/">
                                        <i class="fab fa-facebook"></i>
                                        <span> Facebook: {{$restaurant->facebook}}</span>
                                        <br>
                                    </a>  
                                @endif
                                @if ($restaurant->instagram !=null)
                                    <a href="https://www.instagram.com/?hl=es">
                                        <i class="fab fa-instagram"></i>
                                        <span> Instagram: {{$restaurant->instagram}}</span>
                                        <br>
                                    </a>  
                                @endif
                                @if ($restaurant->youtube !=null)
                                    <a href="https://www.youtube.com/">
                                        <i class="fab fa-youtube"></i>
                                        <span> Canal de Youtube: {{$restaurant->youtube}}</span>
                                        <br>
                                    </a>  
                                @endif

                            @endif
                            
                            
                            
                            
                                
                        </p>
                    </div>
                </div>
               

             
                
                <div class="btn-group mt-3" role="group" aria-label="Basic mixed styles example"> 
                    <a type="button" class="btn btn-warning mt-1" href="{{ route('restaurants.edit', $restaurant->id)}}">Editar</a>
                    
                    {{ Form::open(['route'=> 
                        ['restaurants.destroy',$restaurant->id],
                        'method'=>'delete',
                        'onsubmit'=> 'return confirm(\'¿Está seguro de que desea remover el restaurante?\n ¡Esta acción no se puede deshacer!\')']) }}
                        <button type="submit" class="btn btn-danger mt-1" href="{{ route('restaurants.destroy', $restaurant->id)}}">Remover</button>
                    {!! Form::close() !!}
                </div>
         
          </div>
        
        @yield('comments')
       
        
    </div>
@endsection