<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Address;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
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
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'gender' =>'required',
            'dob' =>['required', 'date_format:Y-m-d', 'before:today', 'nullable'], 
            
            'phone' =>['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            
            'certification' =>'required',
            'noofdives' =>'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'country' => ['required', 'string', 'max:255', 'alpha'],
            'city' => ['required', 'string', 'max:255', 'alpha'],
            'zip' => ['required', 'numeric', 'min:1'],
            'street' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'gender'=> $data['gender'],
            'dob'=> $data['dob'],
            'phone'=> $data['phone'],
            'certification'=> $data['certification'],
            'noofdives'=> $data['noofdives'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        
        $address = Address::create([
            'country' => $data['country'],
            'city' => $data['city'],
            'zip'=> $data['zip'],
            'street'=> $data['street'],
            'user_id' => $user->id
        ]);

        // Attach role "normal user" to new registered Clients
        $user->attachRole('user');
        return $user;
    }
}
