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
                <h2>Indirizzo di consegna: {{$order['address_client']}}</h2>
                <h4>Metodo di pagamento: {{$order['payment']}}</h4>
                <h2>Da Pagare: {{$order['total_price']}}€</h2>
            </div>
        </div>
       {{--  <div class="row">
            <div class="col">
              {{--   @foreach ($order->dishes as $dish)
                 
                @endforeach 
                
            </div>
        </div> --}}
    </div>
@endsection