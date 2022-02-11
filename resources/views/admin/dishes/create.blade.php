@extends('layouts.admin')

@section('content')
    <div class="container">

        <a href="{{route('admin.home')}}"> Torna alla Dashaboard</a>

        <a style="margin-left: 50px" href="{{route('admin.dishes.index')}}"> Tutti i piatti</a>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> Dati sul nuovo piatto </div>
    
                    <div class="card-body">
                        
                        <form method="POST" action="{{ route('admin.dishes.store') }}"
                        enctype="multipart/form-data">
                            @csrf
                    {{-- Inizia inserimento dati  --}}

                    {{-- Nome --}}
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Nome del piatto</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required placeholder="Il nome del tuo piatto">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                   
                   
                    {{-- description --}}
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Descrizion e ingredienti</label>
    
                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required placeholder="Descizione e ingredienti">
    
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                    {{-- price --}}
                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">Prezzo</label>
    
                                <div class="col-md-6">
                                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Costo 9.99 ">
    
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                    {{-- immagini --}}
                            <div class="form-group row">
                                <label for="image_url" class="col-md-4 col-form-label text-md-right">Una foto</label>
    
                                <div class="col-md-6">
                                    <input id="image_url" type="file" class="form-control" name="image_url" >
    
                                   
                                </div>
                            </div>
                    {{-- visibility --}}
                            {{-- visibility --}}
                            <div class="form-group row justify-content-center">

                                <select class="col-md-3" name="visibility" id="visibility"  required>
                                    <option value="" selected disabled>Il piatto è disponibile ?</option>
                                    <option value="1">Visibile</option>
                                    <option value="0">Non visibile</option>
                                </select>
                            
                            </div>
                   

                    {{-- Submit --}} 
                    
                            <div class="d-flex">

                                <div class="d-flex">
                                    <button class="btn btn-success" type="submit">Salva</button>
    
                                </div>
    
                                <div class="d-flex mx-3">
                                    <button class="btn btn-secondary" type="reset">Annulla</button>
    
                                </div>

                            </div>
                            

                        </form>
                    </div>
                </div>
            </div>
        </div>


      
    </div>
@endsection