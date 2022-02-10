<?php

namespace App\Http\Controllers\Auth;

use App\Category;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'address' => ['required', 'string', 'max:255'],
            'p_iva' => ['required', 'numeric', 'min:11', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'categories'=>['required'],

            
        ]);
    }

    /* sovrascrivere la funzione trovata su Illuminate\Foundation\Auth\RegistersUsers su RegisterController */
    /* Serve a passare le variabili $categories al modulo di registrazione */
    
    public function showRegistrationForm()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        
        return view('auth.register', compact('categories'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
       
        $categories=Category::findOrFail($data['categories']);
        
        $user = User::create([

            'name' => $data['name'],
            'address' => $data['address'],
            'p_iva'=>$data['p_iva'],
            'email'=>$data['email'],
            'cover_img'=>Storage::put("img", $data['cover_img']), 
            'password'=>Hash::make($data['password'])

        ]);

        $user->categories()->attach($categories);
        
        return $user;
    }
}
