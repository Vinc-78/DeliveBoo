@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">

            <a href="{{route('admin.home')}}" class="btn btn-info text-white rounded-0"> Torna alla Dashaboard</a>
        
                <div class="my-4">
                    <a href="{{route('admin.dishes.create')}}" class="btn btn-info text-white rounded-0">Nuovo Piatto</a>
                </div>
        </div>

        <div class="col-6">
        <h1 class="text-center mb-3"> I tuoi  piatti</h1>

        @if (session('status'))
        <div class="alert alert-success" role="alert"  class="mt-4">
        {{ session('status') }}
        </div>
        @endif

        <div class="row row-cols-lg-3  row-cols-sm-2  row-cols-md-3  mt-mb-4">

            @foreach ($dishes as $dish)

               {{--  @if($dish->visibility) --}} {{-- Da usare solo per il lato cliente Se disponibile (true) lo vede --}}
                    <div class="col text-center mb-3">

                        <img style="object-fit: cover; height: 150px;" class="img-dish w-75"
                        src="{{asset('storage/' . $dish->image_url)}}" alt="{{$dish->name}}">
                            
                        <div class="piatto">
                            <p class="mt-3 mb-4 border-bottom border-dark font-weight-bold">{{$dish->name}}</p>
                            
                            <p style="" class="mb-4">Price: {{$dish->price}}€</p>
                             
                            @if ($dish->visibility)
                            <h6 class="card-title"> Il piatto è disponibile </h6>    
                             @else
                            <h6 class="card-title"> Il piatto non è disponibile </h6>  
                             @endif
            
                        </div>
                        
                        <a href="{{route('admin.dishes.show' , $dish->id)}}" class="btn btn-info text-white rounded-0">Vai al piatto</a>

                    </div>
                @endforeach          
        </div>
                {{-- @endif --}}

        </div>    
        </div>
    </div>


@endsection



{{-- <div class="row row-cols-lg-4  row-cols-sm-2  row-cols-md-3  mt-mb-4" >

    <div class="col text-center mb-3" v-for="dishChoose in MyMenu.dishes" :key="dishChoose.id" >

        <div class="piatto"  v-if="dishChoose.visibility">
            <!-- Lo stile dell'immagine funziona in line -->
            <img style="object-fit: cover; height: 150px;" :src="'/storage/' + dishChoose.image_url" class="img-dish w-75" alt="">

            <div class="piatto">
                <p class="mt-3 mb-4 border-bottom border-dark font-weight-bold"> {{dishChoose.name}}</p>
                
                <p style="height:80px" class="mb-3">{{dishChoose.description}}</p>

            </div>

            <div>
                <p class="mb-4">{{dishChoose.price}} € </p>
            </div>
            
            <div class="cart">

            <button @click="updateCart(dishChoose, 'subtract')" class="cart-button"> - </button>
            <span class="cart__quantity">{{ product.quantity }}</span>
            <button @click="updateCart(dishChoose, 'add')" class="cart-button">  + </button>
            
            </div>
        </div>

        

    </div>

     <!-- dishChoose è il piatto -->

</div> --}}