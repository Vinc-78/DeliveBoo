@extends('layouts.guest')

@section('content')

    <div class="container">

        @if (session('success_message'))
            <div class="alert alert-success">
                {{ session('success_message') }}
            </div>
        @endif
        
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1 class="title-search mt-4 mb-3">Inserisci i tuoi dati e completa l'ordine </h1>

        <div class="mx-4 text-center container box-dish">
            <form id="payment-form" method="POST" action="{{ route('checkout.store') }}"
            class="text-center">
                @csrf

                {{-- Inizia inserimento dati  --}}

                {{-- NOME --}}
                <div class="row text-left mb-5">
                    <label for="name_client" class="p-0 col-12"><h5>Inserisci il nome <span class="small">*</span></h5></label>

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
                            
                            <input type="email" id="email_client" name="email_client" placeholder="Inserisci la tua email" class="form-control rounded-0 border  @error('email_client') is-invalid @enderror"
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
                
                <hr>

                {{-- sezione braintree --}}
                <div class="row text-left flex-column">
                    <div class="col-6 px-0">
                        <label for="cc_number"><h5>Credit Card Number</h5></label>
                        {{-- <input type="text" class="form-control" id="cc_number" name="cc_number"> --}}
                        <div class="form-group rounded-0" id="card-number">

                        </div>
                    </div>

                    <div class="row col-6 ">
                        <div class="col pl-0">
                            <label for="expiry"><h5>Expiry</h5></label>
                            {{-- <input type="text" class="form-control" id="expiry" name="expiry"> --}}
                            <div class="form-group rounded-0" id="expiration-date">
                                
                            </div>
                        </div>
                    
                        <div class="col pl-0">
                            <label for="cvv"><h5>CVV</h5></label>
                            {{-- <input type="text" class="form-control" id="cvc" name="cvc"> --}}
                            <div class="form-group rounded-0" id="cvv">
                                
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row text-left mb-5">
                    
                    <div class="col-12 p-0" id="order_slug">
                        {{-- <input type="text" name="order_slug"> --}}
                    </div>
                </div>

                {{-- total price --}} {{-- da vedere come passare --}}
                <div class="row text-left mb-5">
                    
                    <div class="col-12 p-0" id="total_price">

                
                    </div>
                </div>

                {{-- Submit --}}                      
                <div class="form-group row mb-0">
                    <div class="col-12 text-center">
                        <input id="nonce" name="payment_method_nonce" type="hidden">
                        <button type="submit" class="button-55">
                            Ordina e Paga
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


<script>
        var form = document.querySelector('#payment-form');
        var submit = document.querySelector('input[type="submit"]');
        
        braintree.client.create({
        authorization: '{{ $token }}' }, function (clientErr, clientInstance) {
        if (clientErr) {
        console.error(clientErr);
        return;
        }
        

        braintree.hostedFields.create({
        client: clientInstance,
        styles: {
            'input': {
            'font-size': '14px'
            },
            'input.invalid': {
            'color': 'red'
            },
            'input.valid': {
            'color': 'green'
            }
        },
        fields: {
            number: {
            selector: '#card-number',
            placeholder: '4111 1111 1111 1111'
            },
            cvv: {
            selector: '#cvv',
            placeholder: '123'
            },
            expirationDate: {
            selector: '#expiration-date',
            placeholder: '10/2019'
            }
        }
        }, function (hostedFieldsErr, hostedFieldsInstance) {
        if (hostedFieldsErr) {
            console.error(hostedFieldsErr);
            return;
        }
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            hostedFieldsInstance.tokenize(function (tokenizeErr, payload) {
            if (tokenizeErr) {
                console.error(tokenizeErr);
                return;
            }
            
            document.querySelector('#nonce').value = payload.nonce;
            form.submit();
            });
        }, false);
        });
    });
    
</script>

<script>
    const cart = JSON.parse(localStorage.getItem("cart"));
    const totalPrice = cart.totalPrice;

    const totalPriceInput = document.getElementById("total_price")
    
    totalPriceInput.innerHTML = `
        <h4>totale prezzo da pagare: € ${totalPrice}</h4>
        <div class="d-none">
            <label for="amount" class="p-0 col-12"><h5>total_price <span class="small">*</span></h5></label>
            
            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8 px-" style="position: relative">
                <div style="width: 100%; height: 100%; position: absolute">

                </div>
                <input type="total_price" id="total_price" name="total_price" class="form-control rounded-0 border" value="${totalPrice}">
                
            </div>
        </div>    
    `

    const cartOrderSlug = cart.slug    
    const orderSlugInput = document.getElementById("order_slug");

    orderSlugInput.innerHTML = `
        <input type="text" name="order_slug" value="${cartOrderSlug}" class="d-none">
    `

</script>

<style>
    #card-number, #cvv, #expiration-date {
    background: white;
    height: 38px;
    border: 1px solid #CED4DA;
    padding: .375rem .75rem;
    border-radius: .25rem;
    }
</style>
@endsection