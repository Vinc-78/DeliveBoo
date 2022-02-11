<?php

namespace App\Http\Controllers\Admin;

use App\Dish;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user()->id;

      /* $dishes = $user['dishes']; */

        $dishes = Dish::where('user_id', $user)->get();
        
        /* dd($dishes); */

        return view('admin.dishes.index', compact('dishes'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'price' => ['required', 'min:1'],
                       
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dishes.create');
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
        $newDish = new Dish();

        $newDish->fill($request->all());

        
        $newDish->user_id = Auth::user()->id; /* Qui specifico l'utente */

        if($request->file("image_url")) {

            $newDish->image_url = Storage::put("img/restaurant", $data['image_url']);

        }

       
        $newDish->save();

       
    
        return redirect()->route("admin.dishes.index")->with('status','Piatto Creato Correttamente .');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        if($dish->user_id != Auth::id()) {
            abort("403");
        }
        
        
        return view('admin.dishes.show', compact('dish')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
                
        return view("admin.dishes.edit", compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        $data = $request->all();

        $dish->update($data);

        return redirect()->route("admin.dishes.index")->with(["status"=> "Dati aggiornati correttamente!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dish = Dish::where("id", $id)->first();
        
        $dish->delete();

        return redirect()->route("admin.dishes.index")->with('status','Piatto rimosso dal menù');
    }
}
