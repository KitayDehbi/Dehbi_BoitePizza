<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class HomeController extends Controller
{
    use RegistersUsers;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
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
           'nom' => 'required|string|max:255',
           'prenom' => 'required|string|max:255',
           'adresse' => 'required|string|max:255',
           'email' => 'required|string|email|max:255|unique:clients',
           'password' => 'required|string|min:6|confirmed',
       ]);
   }

   /**
    * Create a new user instance after a valid registration.
    *
    * @param  array  $data
    * @return \App\User
    */
   protected function create(array $data)
   {
       return Client::create([
           'nom' => $data['nom'],
           'prenom' => $data['prenom'],
           'adresse' => $data['adresse'],
           'email' => $data['email'],
           'password' => bcrypt($data['password']),
           'active' => 1,
       ]);
   }
}
