@extends('layouts.admin')

@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-3 aside">
            <h2 class="title-aside"> Gestisci i tuoi dati</h2>
               
            <h4><a href="{{route('admin.home')}}">Torna alla dashboard</a></h4>
            <h4><a href="{{route('admin.dishes.index')}}">Tutti i piatti</a></h4>
            
        </div>
        
        <div class="col-6 page-admin">
            <h1 class="text-center my-3">Aggiona il piatto: {{$dish->name}} </h1>
            
                        <div class="mt-4">
                            <div class="container-img">
                                <img src="{{asset('storage/' . $dish->image_url)}}" alt="{{$dish->name}}">
                            </div>
                        </div>
                            <div class="py-4">
                                <h5 class="font-weight-bold">Nome del piatto</h5>
                                <p style="font-size: 18px">{{$dish->name}}</p>

                                <h5 class="font-weight-bold">Descrizione</h5>
                                <p style="font-size: 18px">{{$dish->description}}</p>
        
                               
                                <p class="my-3 font-weight-bold" style="font-size:18px" >Price {{$dish->price}} €</p>

                                @if ($dish->visibility)
                                    <h6 style="font-size:18px"> Il piatto è disponibile </h6>    
                                @else
                                    <h6 style="font-size:18px"> Il piatto non è disponibile </h6>  
                                @endif
                            </div>
                        
                        
                        <div class="form-group d-flex mt-4">
                            <a href="{{route('admin.dishes.edit', $dish->id)}}" class="button2">Modifica il tuo piatto</a>
                        {{-- Elimina il piatto --}} 

                        @include('partials.delete_btn_dish')

                        </div>
                    
                        {{-- <a href="{{route('admin.dishes.index')}}" class=""><i class="fas fa-arrow-left fa-sm fa-fw"></i> Torna alla lista dei piatti</a> --}}




            </div>        
        </div>           
    </div>
    {{--  <a href="{{route('admin.dishes.edit' , $dish->id)}}" class="btn btn-primary">Modifica</a> --}}
@endsection