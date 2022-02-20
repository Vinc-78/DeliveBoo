@extends('layouts.statistiche')

@section('content')
<div class="container">
    <div class="mb-3">
        <button class="btn btn-secondary"><a class="text-white" href={{ route('admin.home') }}>Torna alla dashboard</a></button>
    </div>
    
    <main>
        
        {{-- Inserisci i grafici --}}
        <div class="row mt-5">
            <div class="col-xs-12 col-md-6 mb-3">
                <canvas id="myChart" width="200px" height="200px"></canvas>
            </div>


            <div class="col-xs-12 col-md-6">
                <canvas id="myChart2" width="200px" height="200px"></canvas>

            </div>
        </div>

        {{-- Aggiungere lo stile dei grafici (script)--}}




    </main>

    

</div>
@endsection