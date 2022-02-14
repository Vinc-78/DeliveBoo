@extends('layouts.admin')

@section('content')
    <div class="container">

        <a href="{{route('admin.home')}}"> Torna alla Dashaboard</a>

        <h1> Il tuo menù</h1>
        <div class="my-4">
            <a href="{{route('admin.dishes.create')}}" class="btn btn-primary">Nuovo Piatto</a>
        </div>

        @if (session('status'))
        <div class="alert alert-success" role="alert"  class="mt-4">
        {{ session('status') }}
        </div>
        @endif

        <div class="row">

            @foreach ($dishes as $dish)

               {{--  @if($dish->visibility) --}} {{-- Da usare solo per il lato cliente Se disponibile (true) lo vede --}}
                    <div class="col">

                        <div class="card" style="width: 18rem;">
                            <img style="height:250px; weight:250px" src="{{asset('storage/' . $dish->image_url)}}" alt="{{$dish->name}}">
                            <div class="card-body">
                            <h5 class="card-title">{{$dish->name}}</h5>
                            <h6 class="card-title">Price: {{$dish->price}} $</h6>

                            @if ($dish->visibility)
                                <h6 class="card-title"> Il piatto è disponibile </h6>    
                                 @else
                                     <h6 class="card-title"> Il piatto non è disponibile </h6>  
                            @endif
                            
                            
                            <a href="{{route('admin.dishes.show' , $dish->id)}}" class="btn btn-primary">Vai al piatto</a>

                            </div>
                        </div>
                    </div>
                {{-- @endif --}}

            @endforeach

        </div>

    </div>
@endsection
