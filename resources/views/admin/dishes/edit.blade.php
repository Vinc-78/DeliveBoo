@extends('layouts.admin')

@section('content')
<div class="">
    <div class="row justify-content-center">
        <div class="col-3 aside">
            <h2 class="title-aside"> Gestisci i tuoi dati</h2>

            <h4><a href="{{route('admin.home')}}">Torna alla dashboard</a></h4>

            <h4><a href="{{route('admin.dishes.index')}}">Tutti i piatti</a></h4>

        </div>
    
       <div class="col-6">

            <div class="col-12 mb-5 text-center">
                <h1>Piatto</h1>
            </div>

            <div class="col-12 text-center">
                <h3>Modifica il tuo piatto</h3>
                <hr>
            </div>

            <div class="mx-4">
                
                <form method="POST" action="{{ route('admin.dishes.update', $dish->id) }}" 
                    enctype="multipart/form-data">

                    @csrf
                    @method('put')


                    {{-- NOME --}}
                    <div class="row text-left mb-4">
                        <label for="name" class="p-0 col-12"><h5>Nome del piatto</h5></label>

                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8 px-0">
                            <input id="name" type="text" class="form-control rounded-0 border @error('name') is-invalid @enderror" name="name" required value="{{ $dish->name }}">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>      
            
                    {{-- description --}}
                    <div class="row text-left mb-4">
                        <label for="description" class="p-0 col-12"><h5>Descrizion e ingredienti</h5></label>

                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8 px-0">
                            <input id="description" type="text" class="form-control rounded-0 border @error('description') is-invalid @enderror" name="description" required value="{{ $dish->description }}">

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- price --}}
                    <div class="row text-left mb-4">
                        <label for="price" class="p-0 col-12"><h5>Prezzo</h5></label>

                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8 px-0">
                            <input id="price" type="text" class="form-control rounded-0 border @error('price') is-invalid @enderror" name="price" value="{{ $dish->price}}" >

                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- immagini --}}
                    <div class="row text-left mb-4">
                        <label for="image_url" class="p-0 col-12"><h5>Una foto</h5></label>

                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8 px-0">
                            <input id="image_url" type="file" class="rounded-0 border" name="image_url" >

                            
                        </div>
                    </div>

                    {{-- visibility --}}
                    <div class="row text-left my-5">

                        <select class="col-xl-5 col-lg-5 col-md-5 col-sm-8 px-0" name="visibility" id="visibility"  required>
                            <option value="" selected disabled><h5>Il piatto è</h5> disponibile ?</option>
                            <option value="1">Visibile</option>
                            <option value="0">Non visibile</option>
                        </select>
                    
                    </div>
            

                    {{-- Submit --}} 
                    <div class="d-flex">

                        <div class="d-flex">
                            <button class="btn btn-success rounded-0" type="submit">Salva</button>

                        </div>
                    </div>
                    

                </form>
            </div>
        </div>
    

</div>
  
</div>
@endsection