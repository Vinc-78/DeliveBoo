<?php

namespace App\Http\Controllers;

use App\Order;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Http\Request;
use Braintree\Transaction;
use \Braintree_ClientToken;

class CheckoutController extends Controller
{
    
    public function process(Request $request)
    {
    $payload = $request->input('payload', false);
    $nonce = $payload['nonce'];

    $status = Braintree_Transaction ::sale([
	'amount' => '10.00',
	'paymentMethodNonce' => $nonce,
	'options' => [
	    'submitForSettlement' => True
	]
    ]);

    return response()->json($status);
}




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('checkout.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        
        $data = $request->all(); 
        $newOrder = new Order();


        $newOrder->fill($data);

        $newOrder->save();

        

        return view('checkout.saluti', ['data' => $data]);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}




