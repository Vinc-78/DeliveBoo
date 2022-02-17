@extends('layouts.admin')

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-3">

        <h3><a href="{{route('admin.home')}}"> Torna alla Dashaboard</a></h3>
        <h3><a style="" href="{{route('admin.dishes.index')}}"> Tutti i piatti</a></h3>

        </div>
        
        <div class="col-6">
        <h1>Aggiona il piatto:  {{$dish->name}}</h1>
                    <div class="row mt-4">
                        <div class="col-5">
                        <img style="height:250px; " src="{{asset('storage/' . $dish->image_url)}}" alt="{{$dish->name}}">
                        </div>
                        <div class="col-7">
                            <h5>Nome del piatto</h5>
                             <p>{{$dish->name}}</p>

                            <h5>Descrizione</h5>
                            <p>{{$dish->description}}</p>
    
                            @if ($dish->visibility)
                                <h6 class="card-title"> Il piatto è disponibile </h6>    
                                @else
                                    <h6 class="card-title"> Il piatto non è disponibile </h6>  
                             @endif
    
                            
                            <p>Price {{$dish->price}} €</p>
                        </div>
                    </div>
                     
                    <div class="form-group d-flex mt-4">
                        <a href="{{route('admin.dishes.edit', $dish->id)}}" class="">Modifica il tuo piatto</a>
                     {{-- Elimina il piatto --}} 

                     @include('partials.delete_btn_dish')

                    </div>
                
                    <a href="{{route('admin.dishes.index')}}" class=""><i class="fas fa-arrow-left fa-sm fa-fw"></i> Torna alla lista dei piatti</a>




        </div>        
    </div>           
    </div>
    {{--  <a href="{{route('admin.dishes.edit' , $dish->id)}}" class="btn btn-primary">Modifica</a> --}}
@endsection