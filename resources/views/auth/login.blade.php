@extends('layouts.admin')

@section('content')
<div class="container bg-light p-2">
    <div class="row justify-content-center">
        
        <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12">
            <div class="col-12 mb-5 text-center">
                <h1>{{ __('Login') }}</h1>
            </div>

            <div class="col-12 text-center">
                <h3>Accedi al tuo account del ristorante</h3>
                <hr>
            </div>

            {{-- INIZIO DEL FORM --}}
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- EMAIL --}}
                    <div class="row text-left mb-5">
                        <label for="email" class="p-0 col-12"><h5>Inserisci la e-mail del ristorante <span class="small">*</span></h5></label>

                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8 px-0">

                            <input type="email" id="email" name="email" placeholder="Inserisci l'e-mail" class="form-control rounded-0 border  @error('email') is-invalid @enderror"
                            value="{{ old("email") }}" required autocomplete="email" autofocus>
                            
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    {{-- PASSWORD --}}
                    <div class="row text-left mb-5">
                        <label for="password" class="p-0 col-12"><h5>Inserisci la password <span class="small">*</span></h5></label>

                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8 px-0">

                            <input type="password" id="passwprd" name="password" placeholder="Inserisci la password" class="form-control rounded-0 border  @error('password') is-invalid @enderror"
                            required>
                            
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    {{-- REMEMBER ME CHECKBOX --}}
                    <div class="row text-left mb-5">

                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8 px-0">
                            <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    {{-- LOGIN BOTTONE --}}
                    <div class="row text-left mb-5">
                        <div class="col-12 text-xl-left text-lg-left text-md-left text-sm-center text-center px-0">

                            <div class="col-sm-12 px-0">
                                <button type="submit" class="btn btn-primary rounded-0">
                                    {{ __('Login') }}
                                </button>
                            </div>
                                {{-- password dimenticata --}}
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>

                        </div>

                    </div>
                    
                    
                    {{-- <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    --}}

                    {{-- <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div> --}}
                </form>
            </div>

        </div>
    </div>
</div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
