@extends('layouts.guest')

@section('content')

 {{--    <div class="container">

        <div class="saluti text-center">
            <h1>Stiamo preparando il tuo ordine </h1>

            <h2> Grazie per essere venuti da noi  </h2>

        </div>


    </div>
 --}}

 <div class="container">
    <div class="row">
        <div id="email-box" class="col-6 offset-3">

          
            <h1>Congratulazioni ({{$data['name_client']}}) </h1>
            <h3>Grazie per aver usato il nostro servizio di DeliverBoo!</h3>
            <h4>Il tuo ordine è stato effettuato con successo.</h4>
            
           
                
            <h3 class="font-weight-bolder mt-3">Totale pagato: ({{$data['total_price']}} €) </h3>
                
           
            
          

        </div>
    </div>
</div>


<style>
#email-box {
    text-align: center;
    width: 50vw;
    margin: auto;
    height: 50vh;
    border: 1px solid rgb(126, 123, 123);
    box-shadow: 3px 2px 2px rgba(0,0,0,0.7)
}
ul li {
    list-style-type: none;
}
</style>




@endsection