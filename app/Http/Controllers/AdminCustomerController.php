<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Equipment;
use App\Models\User;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminCustomerController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }

    /**
     * Show the admin application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::get();    
        $service = Service::with('user')->get();

        return view('admin.customer.index', compact('user', 'service'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        
        return view('admin.customer.show', compact('user'));
    }


}
