@extends('layouts.admin')

@section('content')
    
    <div class="container">
        <h1>Riepilogo Ordine</h1>
        <div class="row">
            <div class="col">
                <h2>Nome: {{ $order['name_client']}}</h2>
                <h2>Cognome: {{$order['surname_client']}}</h2>
                <h3>Email Cliente: {{$order['email_client']}}</h3>
                <h3>Numero di telefono: {{$order['phone_client']}}</h3>
            </div>
        </div>
    </div>
@endsection