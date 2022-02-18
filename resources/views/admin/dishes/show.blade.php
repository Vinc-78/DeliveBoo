@extends('layouts.admin')

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-4">

            <h4><a href="{{route('admin.home')}}"> Torna alla Dashaboard</a></h4>
            <h4><a style="" href="{{route('admin.dishes.index')}}"> Tutti i piatti</a></h4>

        </div>
        
        <div class="col-8">
            <h1 style="color:grey">Aggiona il piatto:  </h1>
            <h1> {{$dish->name}} </h1>
                        <div class="row mt-4">
                            <div class="col-8">
                                <img style="height:250px; " src="{{asset('storage/' . $dish->image_url)}}" alt="{{$dish->name}}">
                                </div>
                            <div class="col-4">
                                <h5 style="font-weight: bold">Nome del piatto</h5>
                                <p>{{$dish->name}}</p>

                                <h5 style="font-weight: bold">Descrizione</h5>
                                <p>{{$dish->description}}</p>
        
                               
                                <p class="my-3" style="font-size:18px" >Price {{$dish->price}} €</p>

                                @if ($dish->visibility)
                                    <h6 style="font-size:18px"> Il piatto è disponibile </h6>    
                                @else
                                    <h6 style="font-size:18px"> Il piatto non è disponibile </h6>  
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group d-flex mt-4">
                            <a href="{{route('admin.dishes.edit', $dish->id)}}" class="btn btn-primary btn-lg mx-2">Modifica il tuo piatto</a>
                        {{-- Elimina il piatto --}} 

                        @include('partials.delete_btn_dish')

                        </div>
                    
                        {{-- <a href="{{route('admin.dishes.index')}}" class=""><i class="fas fa-arrow-left fa-sm fa-fw"></i> Torna alla lista dei piatti</a> --}}




            </div>        
        </div>           
    </div>
    {{--  <a href="{{route('admin.dishes.edit' , $dish->id)}}" class="btn btn-primary">Modifica</a> --}}
@endsection