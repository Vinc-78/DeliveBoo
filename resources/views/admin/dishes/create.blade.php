@extends('layouts.admin')

@section('content')
    <div class="container bg-light p-2">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 ">

                <a href="{{route('admin.home')}}" class="btn btn-info text-white rounded-0"> Torna alla Dashaboard</a>
                
                <a href="{{route('admin.dishes.index')}}"  class="btn btn-info text-white rounded-0 ml-2"> Tutti i piatti</a>
            </div>
        </div>

        <div class="row justify-content-center mt-5">

            <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12">
                <div class="col-12 mb-5 text-center">
                    <h1>Piatto</h1>
                </div>

                <div class="col-12 text-center">
                    <h3>Crea il tuo Nuovo piatto</h3>
                    <hr>
                </div>

                <div class="mx-4">

                    
                    <form method="POST" action="{{ route('admin.dishes.store') }}"
                    enctype="multipart/form-data">
                        @csrf

                        {{-- NOME DEL PIATTO --}}
                        <div class="row text-left mb-4">
                            <label for="name" class="p-0 col-12"><h5>Nome del piatto <span class="small">*</span></h5></label>

                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8 px-0">
                                <input id="name" type="text" class="form-control rounded-0 border @error('name') is-invalid @enderror" name="name" required placeholder="Il nome del tuo piatto">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        
                        {{-- DESCRIZIONE DEL PIATTO --}}
                        <div class="row text-left mb-4">
                            <label for="description" class="p-0 col-12"><h5>Descrizion e ingredienti <span class="small">*</span></h5></label>

                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8 px-0">
                                <input id="description" type="text" class="form-control rounded-0 border @error('description') is-invalid @enderror" name="description" required placeholder="Descizione e ingredienti">

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- PREZZO --}}
                        <div class="row text-left mb-4">
                            <label for="price" class="p-0 col-12"><h5>Prezzo</h5></label>

                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8 px-0">
                                <input id="price" type="text" class="form-control rounded-0 border @error('price') is-invalid @enderror" name="price" placeholder="Costo 9.99 ">

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
            
                        {{-- FOTO DEL PIATTO --}}
                        <div class="row text-left mb-4">
                            <label for="image_url" class="p-0 col-12"><h5>Una foto</h5></label>

                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8 px-0">
                                <input id="image_url" type="file" class="rounded-0 border" name="image_url" >

                            
                            </div>
                        </div>

                        {{-- VISIBILITà DEL PIATTO --}}
                        <div class="row text-left my-5">

                            <select class="col-xl-5 col-lg-5 col-md-5 col-sm-8 px-0" name="visibility" id="visibility"  required>
                                <option value="" selected disabled>Il piatto è disponibile ?</option>
                                <option value="1">Visibile</option>
                                <option value="0">Non visibile</option>
                            </select>
                        
                        </div>
                        

                        {{-- Submit --}} 
                        <div class="d-flex">

                            <div class="d-flex">
                                <button class="btn btn-success rounded-0" type="submit">Salva</button>

                            </div>

                            <div class="d-flex mx-3">
                                <button class="btn btn-secondary rounded-0" type="reset">Annulla</button>

                            </div>

                        </div>
                                    

                    </form>
                </div>
            </div>
        </div>


      
    </div>
@endsection