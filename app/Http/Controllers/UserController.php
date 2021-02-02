<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use App\Models\Equipment;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
     * Show the User application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        // $user_id = auth()->user()->id;
        
        // $user = User::find($user_id);

        $user = Auth::user();
        $countAssignmentsUser = $user->service->count();
        $countEquipmentUser = $user->equipment->count();

        $service = Service::with('user')->get();

        

        return view('home', compact('service', 'countAssignmentsUser', 'countEquipmentUser'))->with('equipment', $user->equipment, $user->service); 
    }
}

