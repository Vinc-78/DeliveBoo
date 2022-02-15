@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="mb-3">
        <button class="btn btn-secondary"><a class="text-white" href={{ route('admin.home') }}>Torna alla dashboard</a></button>
    </div>
    <div class="row">
        <div class="col">

            <h1>Lista Ordini </h1>
            <ul class="list-group">
                @foreach ($order_dishes as $order)
                <li class="list-group-item border border-dark">
                    
                    {{-- nome del cliente --}}
                    <h5 class="mt-4 mb-3">Nome Cliente: {{ $order['name_client'] . " " . $order['surname_client'] }}</h5>
                    {{-- Email cliente --}}
                    <h5 class="mb-3">Email Cliente: {{ $order['email_client'] }}</h5>
                    {{-- indirizzo cliente --}}
                    <h5 class="mb-3">Indirizzo Consegna: {{ $order['address_client'] }}</h5>
                    {{-- numero di telefono --}}
                    <h6 class="mb-3">Telefono: {{ $order['phone_client'] }}</h6>
                    {{-- importo da pagare --}}
                    <h3 class="mb-3">Importo da pagare: {{ $order['total_price']}}$</h3>
                    <h4>Piatti Ordinati</h4>
                    <ul>
                       @foreach ($order['dishes'] as $dish)
                       <li>
                            <h6>{{$dish}}</h6>
                        </li>
                       @endforeach
                        
                       
                    </ul>


                  
                @endforeach
            </ul>
        </div>
    </div>
    

</div>
@endsection