@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12">
            <div class="col-12 mb-5 text-center">
                <h1>{{ __('Register') }}</h1>
            </div>

            <div class="col-12">
                <h3>Crea il tuo account ristorante</h3>
                <hr>
            </div>

            <div class="mx-4">
                <form method="POST" action="{{ route('register') }}"
                enctype="multipart/form-data" class="text-center">
                    @csrf


                    {{-- Inizia inserimento dati  --}}

                    {{-- NOME --}}
                    <div class="row text-left mb-5">
                        <label for="name" class="p-0 col-12"><h5>Inserisci il nome del ristorante *</h5></label>

                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8 px-0">

                            <input type="text" id="name" name="name" placeholder="Inserisci nome dell'attività" class="form-control rounded-0 border  @error('name') is-invalid @enderror"
                            value="{{ old("name") }}" required autocomplete="name" autofocus>
                            
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    {{-- EMAIL --}}
                    <div class="row text-left mb-5">
                        
                        <div class="col-12 p-0">

                            <label for="email" class="p-0 col-12"><h5>Inserisci la e-mail del ristorante *</h5></label>
                            
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8 px-0">
                                
                                <input type="email" id="email" name="email" placeholder="Inserisci email dell'attività" class="form-control rounded-0 border  @error('email') is-invalid @enderror"
                                value="{{ old("email") }}" required autocomplete="email">
                                
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr>

                    {{-- PASSWORD --}}
                    <div class="row text-left">
                        
                        {{-- password --}}
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 p-0 mb-5">

                            <label for="password" class="p-0 col-12"><h5>Inserisci la password del profilo *</h5></label>
                            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-8 px-0">
                                
                                <input type="password" id="password" name="password" placeholder="Inserisci password" class="form-control rounded-0 border  @error('password') is-invalid @enderror"
                                value="{{ old("password") }}" required autocomplete="new-password">
                                
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <p class="small p-0 m-0">la password deve essere di almeno 6 caratteri</p>

                        </div>

                        {{-- conferma password --}}
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 p-0 mb-5">

                            <label for="password-confirm" class="p-0 col-12"><h5>Coferma password *</h5></label>
                            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-8 px-0">
                                
                                <input type="password" id="password-confirm" name="password_confirmation" placeholder="Conferma password" class="form-control rounded-0 border" required autocomplete="new-password">
                            </div>
                        </div>
                    </div>

                    <hr>

                    {{-- INDIRIZZO --}}
                    <div class="row text-left mb-5">
                        
                        <div class="col-12 p-0">

                            <label for="address" class="p-0 col-12"><h5>Inserisci l'indirizzo del ristorante *</h5></label>
                            
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8 px-0">
                                
                                <input type="text" id="address" name="address" placeholder="Inserisci l'indirizzo dell'attività" class="form-control rounded-0 border  @error('address') is-invalid @enderror"
                                value="{{ old("address") }}" required autocomplete="address">
                                
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    {{-- PARTITA IVA --}}
                    <div class="row text-left mb-5">
                        
                        <div class="col-12 p-0">

                            <label for="p_iva" class="p-0 col-12"><h5>Inserisci la partita IVA dell'attività *</h5></label>
                            
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8 px-0">
                                
                                <input type="string" id="p_iva" name="p_iva" placeholder="Inserisci la partita IVA dell'attività" class="form-control rounded-0 border  @error('p_iva') is-invalid @enderror"
                                value="{{ old("p_iva") }}" required minlength="11" maxlength="11">
                                
                                @error('p_iva')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- IMMAGINE --}}
                    <div class="row text-left mb-5">
                        
                        <div class="col-12 p-0">

                            <label for="cover_img" class="p-0 col-12"><h5>Inserisci l'immagine di profilo dell'attività</h5></label>
                            
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8 px-0">
                                <input type="file" id="cover_img" name="cover_img" class="rounded-0 border">
                            </div>
                        </div>
                    </div>

                    {{-- CATEGORIE --}}
                    <div class="row text-left mb-5">
                        
                        <div class="col-12 p-0">

                            <h5>Inserisci la/le categorie di cui fa parte il tuo ristorante *</h5>
                            <div class="form-check">
                                @foreach ($categories as $category)
                                    <input name="categories[]" class="form-check-input" type="checkbox" value="{{ $category->id }}" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">{{ $category->name }}</label>

                                    <br>
                                @endforeach

                                @if ($errors->has('categories'))

                                    <p class="row justify-content-center" style="color:red">
                                    {{ $errors->first('categories') }} </p>

                                @endif 
                            </div>

                        </div>
                    </div>

                    {{--  @foreach ($categories as $category)
                        <div class="form-check form-check-inline mb-4">

                            <input name="categories[]" class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                value={{ $category->id }}>
                            <label class="form-check-label" for="inlineCheckbox1">{{ $category->name }}</label>

                        </div>

                        @endforeach

                    @if ($errors->has('categories'))

                        <p class="row justify-content-center" style="color:red">
                        {{ $errors->first('categories') }} </p>

                    @endif --}}


                    {{-- vecchia versione --}}

                     {{-- Nome 
                        <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Inserisci nome dell'attività">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> --}}
                    {{-- email 
                        <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="mario.rossi@email.it">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> --}}
                    {{-- Password 
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="minimo 6 caratteri">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> 
                    --}}
                    {{-- address 
                        <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label text-md-right">Indirizzo</label>

                        <div class="col-md-6">
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" required placeholder="Via Esempio n.civico">

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> --}}
                    {{-- p_iva
                        <div class="form-group row">
                        <label for="p_iva" class="col-md-4 col-form-label text-md-right">P.IVA</label>

                        <div class="col-md-6">
                            <input id="p_iva" type="text" class="form-control @error('p_iva') is-invalid @enderror" name="p_iva" required minlength="11" maxlength="11">

                            @error('p_iva')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> --}}
                    {{-- immagini 
                        <div class="form-group row">
                            <label for="cover_img" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                                <input id="cover_img" type="file" class="form-control" name="cover_img" >

                                
                            </div>
                        </div>
                    </div>  --}}
                   


                    {{-- Submit --}}                      
                    <div class="form-group row mb-0">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    
    </div>
</div>
@endsection
