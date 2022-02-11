@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">

            <h1>questa è la index di Ordini</h1>
            <ul class="list-group">
                @foreach ($orderList as $order)
                <li class="list-group-item border border-dark">
                    
                    {{-- nome del cliente --}}
                    <a href="{{ route("admin.orders.show", $order->id) }}">

                        <h5 class="mt-4">{{ $order->name_client . " " . $order->surname_client }}</h5>
                        
                    </a>

                    {{-- numero di telefono --}}
                    <p class="small">{{ $order->phone_client }}</p>

                    <ul>
                        @foreach ($order->dishes as $singleDish)    

                            {{-- piatti acquistati --}}
                            <li class="small">{{ $singleDish->name }}</li>

                        @endforeach
                    </ul>
                    {{-- <ul>
                        @foreach ($order-> as $item)
                            
                        @endforeach
                        <li>

                        </li>
                    </ul> --}}
                </li>
                @endforeach
            </ul>
        </div>
    </div>

</div>
@endsection