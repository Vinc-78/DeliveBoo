<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout.checkout');
    }

    public function store()
    {
       /* Chiama il model Order*/

       /* crea un elemento nuovo e lo salva nella tabella ordini  */
    }
}
