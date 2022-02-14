@extends('layouts.admin')

@section('content')
    <div class="container">

        <a href="{{route('admin.home')}}"> Torna alla Dashaboard</a>

        <a style="margin-left: 50px" href="{{route('admin.dishes.index')}}"> Tutti i piatti</a>

        <h1> Il tuto menu</h1>

                    <div class="card" style="width: 18rem;">
                        <img style="height:250px; weight:250px" src="{{asset('storage/' . $dish->image_url)}}" alt="{{$dish->name}}">
                        <div class="card-body">
                        <h5 class="card-title">{{$dish->name}}</h5>
                        
                        <h5>Descrizione</h5>
                        <p>{{$dish->description}}</p>

                        @if ($dish->visibility)
                            <h6 class="card-title"> Il piatto è disponibile </h6>    
                            @else
                                <h6 class="card-title"> Il piatto non è disponibile </h6>  
                         @endif

                        
                        <p>Price {{$dish->price}} $</p>
                        
                        
                       {{--  <a href="{{route('admin.dishes.edit' , $dish->id)}}" class="btn btn-primary">Modifica</a> --}}
                        
                        
                            <div class="form-group d-flex ">
                                <a href="{{route('admin.dishes.edit', $dish->id)}}" class="btn btn-primary btn-sm mr-3">Modifica il tuo piatto</a>
                             {{-- Elimina il piatto --}} 

                                <form action="{{route('admin.dishes.destroy', $dish->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Elimina piatto
                                    </button>
                              
                                </form>
                                
                            </div>
                        
                            <a href="{{route('admin.dishes.index')}}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left fa-sm fa-fw"></i> Tutti</a>

                        </div>
                    </div>
                
    </div>
@endsection