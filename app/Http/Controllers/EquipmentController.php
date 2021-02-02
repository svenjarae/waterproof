<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Equipment;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;

use Haruncpi\LaravelIdGenerator\IdGenerator;


class EquipmentController extends Controller
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
        $equipment = $user->equipment;
        $countEquipmentUser = $user->equipment->count();
        $maintenanceDates = Equipment::with('user')->pluck('maintenance');

        return view('equipment.index', compact('equipment', 'maintenanceDates', 'countEquipmentUser'));
    }

    public function show($id)
    {   
        $user = Auth::user();
        // dd($user);
        $equipment = Equipment::findOrFail($id);
        $service = Service::with('user')->get();

        return view('equipment.show', compact('equipment', 'service', 'user'));
    }

    public function create()
    {
        return view('equipment.create');
    }

    public function store(Request $request)
    {   
        $this->validate($request, [
            'equip_type' => 'required',
            'brand' => 'required|min:2|max:20',
            'condition' => 'required',
            'purchase' => 'required|date_format:Y-m-d|nullable',
            'maintenance' => 'required|date_format:Y-m-d|nullable',
            'info' => 'nullable',
         ]);

        $equipment = new Equipment();

        // $equipment->type = $request->get('type');
        $equipment->fill($request->all());
        
        $equipment->user_id = auth()->user()->id;
        
        $equipment->save();
    
        // return redirect('/equipment');
        return redirect()->route('equipment.index')->with('success-message', 'Equipment created!!!');
    }

    public function edit($id)
    {
        $equipment = Equipment::findOrFail($id);
        return view('equipment.edit', compact('equipment'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'equip_type' => 'required',
            'brand' => 'required|min:2|max:20',
            'condition' => 'required',
            'purchase' => 'required|date_format:Y-m-d|nullable',
            'maintenance' => 'required|date_format:Y-m-d|nullable', 
            'info' => 'nullable',
        ]);

        $equipment = Equipment::findOrFail($id);
        $equipment->fill($request->all());
        $equipment->save();

        return redirect()->route('equipment.show', $id)->with('success-message', 'Equipment updated!!!');
    }

    public function destroy($id)
    {
        $equipment = Equipment::findOrFail($id);

        $equipment->delete();

        return redirect()->route('equipment.index')->with('success-message-delete', 'Equipment deleted!!!'); 
    }

    
}
