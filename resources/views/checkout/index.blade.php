@extends('layouts.guest')

@section('content')


    <h1>Inserisci i tuoi dati e completa l'ordine </h1>

    <div class="mx-4 text-center">
        <form method="POST" action="{{ route('checkout.store') }}"
         class="text-center">
            @csrf


            {{-- Inizia inserimento dati  --}}

            {{-- NOME --}}
            <div class="row text-left mb-5">
                <label for="name_client" class="p-0 col-12"><h5>Inserisci il nome  <span class="small">*</span></h5></label>

                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8 px-0">

                    <input type="text" id="name_client" name="name_client" placeholder="Inserisci nome " class="form-control rounded-0 border  @error('name_client') is-invalid @enderror"
                    value="{{ old("name_client") }}" required autocomplete="name_client" autofocus>
                    
                    @error('name_client')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            {{-- COGNOME --}}
            <div class="row text-left mb-5">
                <label for="surname_client" class="p-0 col-12"><h5>Inserisci il tuo cognome  <span class="small">*</span></h5></label>

                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8 px-0">

                    <input type="text" id="surname_client" name="surname_client" placeholder="Inserisci il tuo cognome" class="form-control rounded-0 border  @error('surname_client') is-invalid @enderror"
                    value="{{ old("name") }}" required autocomplete="name" autofocus>
                    
                    @error('surname_client')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            {{-- EMAIL --}}
            <div class="row text-left mb-5">
                
                <div class="col-12 p-0">

                    <label for="email_client" class="p-0 col-12"><h5>Inserisci la tua email <span class="small">*</span></h5></label>
                    
                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8 px-0">
                        
                        <input type="email_client" id="email_client" name="email_client" placeholder="Inserisci la tua email" class="form-control rounded-0 border  @error('email_client') is-invalid @enderror"
                        value="{{ old("email_client") }}" required autocomplete="email_client">
                        
                        @error('email_client')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <hr>

              {{-- phone--}}
              <div class="row text-left mb-5">
                
                <div class="col-12 p-0">

                    <label for="phone_client" class="p-0 col-12"><h5>Il tuo numero di telefono <span class="small">*</span></h5></label>
                    
                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8 px-0">
                        
                        <input type="phone_client" id="phone_client" name="phone_client" placeholder="Inserisci il tuo cellullare" class="form-control rounded-0 border  @error('phone_client') is-invalid @enderror"
                        value="{{ old("phone_client") }}" required autocomplete="phone_client">
                        
                        @error('phone_client')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>


           

            <hr>

            {{-- INDIRIZZO --}}
            <div class="row text-left mb-5">
                
                <div class="col-12 p-0">

                    <label for="address_client" class="p-0 col-12"><h5>Inserisci l'indirizzo <span class="small">*</span></h5></label>
                    
                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8 px-0">
                        
                        <input type="text" id="address_client" name="address_client" placeholder="Inserisci il tuo indirizzo" class="form-control rounded-0 border  @error('address_client') is-invalid @enderror"
                        value="{{ old("address_client") }}" required autocomplete="address_client">
                        
                        @error('address_client')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            
           

            {{-- Submit --}}                      
            <div class="form-group row mb-0">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary rounded-0">
                        Invia 
                    </button>
                </div>
            </div>
        </form>
    </div>

    




@endsection