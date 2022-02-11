@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <h1>questa è la index di Ordini</h1>
        <ul class="list-group">
            <li class="list-group-item">
                @foreach ($orderList as $order)

                <a href="{{ asset("admin.orders.show", $order->id) }}">
                    <h5>{{ $order->name_client . " " . $order->surname_client }}</h5>
                </a>
                <p class="small">{{ $order->phone_client }}</p>
                @endforeach
            </li>
        </ul>
    </div>

</div>
@endsection