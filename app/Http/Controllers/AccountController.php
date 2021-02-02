<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AccountController extends Controller
{
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
        $user = Auth::user();
        
        $address = Address::with('user')->get('id');
        // dd($address);
        
        return view('account.index', compact('user', 'address'));
    }


    public function update(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'name' => 'required|string|min:2|max:255',
            'surname' => 'required|string|max:255',
            'gender' =>'required',
            'dob' => 'required|date_format:Y-m-d|before:today|nullable',
            'phone' =>'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'certification' =>'required',
            'noofdives' =>'required',
            'email' => 'required|string|email|max:255',Rule::unique('users')->ignore($user->id),
        ]);

        $user->fill($request->all());

        $user->save();

        return redirect()->route('account.index', compact('user'))->with('success-message', 'User updated!!!');
    }

    public function destroy()
    {
        $user = Auth::user();

        $user->delete();

        return redirect()->route('home')->with('success-message-delete', 'Account deleted!!!'); 
    }

    //create shipping details
    public function createAddress()
    {
        //select equipment in service form
        $user = Auth::user();
        $address = Address::with('user')->get();
        return view('account.index', compact('user', 'address'));
    }

    // //store shipping information (In case I want to integrate that users dont' have to create address when register, but later.)
    // public function storeAddress(Request $request)
    // {
    //     $this->validate($request, [
    //         'country' => 'required',
    //         'city' => 'required',
    //         'zip' => 'required',
    //         'street' => 'required',
    //      ]);

    //     $address = new Address();

    //     // $equipment->type = $request->get('type');
    //     $address->fill($request->all());
        
    //     $address->user_id = auth()->user()->id;
        
    //     $address->save();
    
    //     // return redirect('/service/assignments');
    //     return redirect()->route('account.index')->with('success-message', 'Address created!');
    // }

    // FIXME:
    // //update shipping information
    // public function updateAddress(Request $request)
    // {
    //     $user = Auth::user();
        
    //     $address = Address::with('user')->get();

    //     $address->user_id = auth()->user()->id;

    //     $this->validate($request, [
    //         'country' => 'required|string|min:2|max:255',
    //         'city' => 'required|string|max:255|alpha',
    //         'zip' => 'required|numeric|min:1'|alpha],
    //         'street' =>'required',
    //     ]);

    //     $user->address->fill($request->all());

    //     $user->address->save();

    //     return redirect()->route('account.index', compact('address'))->with('success-message', 'Address updated!!!');
    // }

    // public function passwordUpdate(Request $request)
    // {
    //     $user = Auth::user();

    //     if($user){
    //          $user->password == $request['password'];
    //          $user->save();
    //          return redirect()->route('account.index')->with('success-message', 'Password updated!!!'); 
    //     }
    // }
}
