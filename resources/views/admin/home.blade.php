@extends('layouts.admin')

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-3">
            <h2> Aside  </h2>

            <h4><a href="{{route('admin.dishes.index')}}"> A tutti i piatti</a></h4>

            <h4><a href="{{route('admin.orders.index')}}"> A tutti gli ordini</a></h4>
        </div>

        <div class="col-6">
            <div class="banner-restaurant">
            <img src="{{asset('storage/'. Auth::user()->cover_img)}}" alt="ristorante">  
            </div>
            <h2>Bentornato,  <span>{{Auth::user()->name}}</span></h2>

            <h3 style="color:red">Attività  <span>{{Auth::user()->name}}</span> </h3> 
            
            <h4>Partita I.V.A. {{Auth::user()->p_iva}}</h4>
            
        </div>
    
    </div>
@endsection
