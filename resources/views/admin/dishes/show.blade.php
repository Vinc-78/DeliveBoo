@extends('layouts.admin')

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-3">
            <div class="mb-3">
                <button class="btn btn-secondary"><a class="text-white" href={{ route('admin.home') }}>Torna alla dashboard</a></button>
            </div>

            <div class="mb-3">
                <button class="btn btn-secondary"><a class="text-white" href={{route('admin.dishes.index') }}>Tutti i piatti</a></button>
            </div>
            
        </div>
        
        <div class="col-9">
            <h1 class="card-title mt-3 bg-light font-weight-bold my-3 py-3 rounded text-center">Aggiona il piatto:  </h1>
            <h1 class="font-weight-bold"> {{$dish->name}} </h1>
                        <div class="row mt-4">
                            <div class="col-6">
                                <img style="height:250px; " src="{{asset('storage/' . $dish->image_url)}}" alt="{{$dish->name}}">
                                </div>
                            <div class="col-6 py-4 rounded" style="background-color: #fff;">
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
                        </div>
                        
                        <div class="form-group d-flex mt-4">
                            <a href="{{route('admin.dishes.edit', $dish->id)}}" class="btn btn-secondary btn-lg mx-2">Modifica il tuo piatto</a>
                        {{-- Elimina il piatto --}} 

                        @include('partials.delete_btn_dish')

                        </div>
                    
                        {{-- <a href="{{route('admin.dishes.index')}}" class=""><i class="fas fa-arrow-left fa-sm fa-fw"></i> Torna alla lista dei piatti</a> --}}




            </div>        
        </div>           
    </div>
    {{--  <a href="{{route('admin.dishes.edit' , $dish->id)}}" class="btn btn-primary">Modifica</a> --}}
@endsection