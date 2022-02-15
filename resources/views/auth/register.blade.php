@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="row justify-content-center col-xl-10 col-lg-8 col-md-10 col-sm-12">
            <div class="col-12 mb-5 text-center">
                <h1>{{ __('Register') }}</h1>
            </div>

            <div class="">
                <form method="POST" action="{{ route('register') }}"
                enctype="multipart/form-data">
                    @csrf
                    {{-- Inizia inserimento dati  --}}
                    {{-- Nome --}}
                   {{--  <div class="form-group row">
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
                    {{-- email --}}
                   {{--  <div class="form-group row">
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
                    {{-- Password --}}
                    {{-- <div class="form-group row">
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
                    </div> --}}
                    {{-- address --}}
                    {{-- <div class="form-group row">
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
                    {{-- p_iva --}}
                   {{--  <div class="form-group row">
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

                    {{-- immagini --}}
                   {{--  <div class="form-group row">
                        <label for="cover_img" class="col-md-4 col-form-label text-md-right"></label>

                        <div class="col-md-6">
                            <input id="cover_img" type="file" class="form-control" name="cover_img" >

                            
                        </div>
                    </div> --}}
                        {{-- Select alle categorie --}}  

                   {{--  <div class="form-group row">
                        <label for="categories[]" class="col-md-4 col-form-label text-md-right">Categoria</label>
                        <div class="col-md-6">
                            <select  class="form-control @error('categories') is-invalid @enderror" name="categories[]" id="categories[]" multiple>
                                <option value="" disabled>Seleziona</option>
                                
                                @foreach($categories as $category )
                                                                    
                                @if (old('categories'))
                                    <option value="{{$category->id}}" {{in_array($category->id, old('categories'))? 'selected': ''}}>{{$category->name}}</option>
                                    @else
                                    <option value="{{$category->id}}" >{{$category->name}}</option>
                                @endif
                                @endforeach
                            
                            </select>
                            @error('categories')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div> --}}

                    

                {{-- versione con check box da sistemare grafica --}}

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
