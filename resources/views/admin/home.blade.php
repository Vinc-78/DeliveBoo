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
    <div class="row justify-content-center">
        <div class="col-3 aside" >
            <h2 class="title"> Gestisci i tuoi dati</h2>

            <h4><a href="{{route('admin.dishes.index')}}"> A tutti i piatti</a></h4>

            <h4><a href="{{route('admin.orders.index')}}"> A tutti gli ordini</a></h4>

            <h4><a href="{{route('admin.chart')}}"> Le tue statistiche</a></h4>
        </div>

        <div class="col-6 page-admin">
            <div class="banner-restaurant">
            <img src="{{asset('storage/'. Auth::user()->cover_img)}}" alt="ristorante">  
            </div>
            <div class="mt-3">
            <h2 class="text-center">Bentornato,  <span>{{Auth::user()->name}}</span></h2>
            <p class="text-center">Tieni sempre aggiornato il tuo menù e controlla i tuoi dati, basta un click per aggiornare.</p>
            <h4 class="pb-2 text-center">I tuoi dati di registrazione</h4> 
            <div class="box-info">
            <h4>Nome del ristorante: {{Auth::user()->name}}</h4>
            <h4>Il tuo indirizzo: {{Auth::user()->address}}</h4>
            <h4>Partita I.V.A.: {{Auth::user()->p_iva}}</h4>
            <h4>La tua e-mail: {{Auth::user()->email}}</h4>
            </div>
            </div>
        </div>
    
    </div>
@endsection
