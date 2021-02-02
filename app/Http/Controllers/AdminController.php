<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Equipment;
use App\Models\User;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
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
        $user = Auth::user();
        $service = Service::with('user')->get();

        /* Get open status to show only open status on dashboard*/
        $openStatus = DB::table('service')->where('status', '=', 1)->get();

        return view('admin.index', compact('user', 'service', 'openStatus'));
    }


}
