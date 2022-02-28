@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-4  aside">
                <h2 class="title-aside"> Gestisci i tuoi dati</h2>
               
                <h4><a href="{{route('admin.home')}}">Torna alla dashboard</a></h4>
                <h4><a href="{{route('admin.dishes.create')}}">Nuovo piatto</a></h4>
        
             </div>

        <div class="col-8 page-admin">
        <h1 class="text-center my-3"> I tuoi  piatti</h1>

        @if (session('status'))
        <div class="alert alert-success" role="alert"  class="mt-4">
        {{ session('status') }}
        </div>
        @endif

        <div class="row row-cols-lg-3  row-cols-sm-1  row-cols-md-1  row-cols-1 mt-mb-4">

            @foreach ($dishes as $dish)

               {{--  @if($dish->visibility) --}} {{-- Da usare solo per il lato cliente Se disponibile (true) lo vede --}}
                    <div class="col text-center my-3 border g-3 ">

                        <img style="object-fit: cover; height:150px" class="img-dish w-100 mt-3"
                        src="{{asset('storage/' . $dish->image_url)}}" alt="{{$dish->name}}">
                            
                        <div class="piatto">
                            <p class="mt-3 mb-4 border-bottom border-dark font-weight-bold">{{$dish->name}}</p>
                            
                            <p style="" class="mb-4 font-weight-bold">Price: {{$dish->price}}€</p>
                             
                            @if ($dish->visibility)
                            <h6 class="card-title font-weight-bold"> Il piatto è disponibile </h6>    
                             @else
                            <h6 class="card-title font-weight-bold"> Il piatto non è disponibile </h6>  
                             @endif
            
                        </div>
                        
                        <a href="{{route('admin.dishes.show' , $dish->id)}}" class="button2 mb-2">Vai al piatto</a>

                    </div>
                @endforeach          
        </div>
                {{-- @endif --}}

        </div>    
        </div>
    </div>


@endsection


