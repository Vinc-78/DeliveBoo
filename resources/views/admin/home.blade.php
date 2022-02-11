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
    <h1>DashBoard</h1>

    <div class="row">
        <div class="col-3">
            <h2> Aside  </h2>

        </div>

        <div class="col-6">
            <h2>Dati Utente</h2>

            <h3 style="color:red">Attività  <span>{{Auth::user()->name}}</span> </h3> 
            <img style="width: 450px" src="{{asset('storage/img/restaurant/'. Auth::user()->cover_img)}}" alt="ristorante">
            <h4>Partita I.V.A. {{Auth::user()->p_iva}}</h4>
            
        </div>
    
    </div>
@endsection
