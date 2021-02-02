<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;
use App\Models\User;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
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
        return view('service.index');
    }

    public function create()
    {
        //select equipment in service form
        $user = Auth::user();
        
        $equipment = $user->equipment;

        // $equipment = Equipment::with('user')->get();

        $countEquipmentUser = $user->equipment->count();

        return view('service.create', compact('user', 'equipment', 'countEquipmentUser'));
    }

    public function show($id)
    {
        $service = Service::findOrFail($id);

        $user = Auth::user();
        $equipment = Equipment::with('user')->get();

        return view('service.show', compact('service', 'equipment'));
    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'equipment_type' => 'required',
            'service_type' => 'required',
            'service_submission' => 'required',
            'info' => 'nullable',
         ]);

        $service = new Service();

        // $equipment->type = $request->get('type');
        $service->fill($request->all());
        
        $service->user_id = auth()->user()->id;

        $equipment = Equipment::with('user')->get();
        
        foreach($equipment as $singleEquipment) {
            $service->equipment_id = $singleEquipment->id;
        }

        $service->save();
    
        // return redirect('/service/assignments');
        return redirect()->route('service.assignments')->with('success-message', 'Your service request is being processed!');
    }

    public function overview()
    {
        $service = Service::with('user')->get();

        $user = Auth::user();
        $countAssignmentsUser = $user->service->count();

        
        return view('service.assignments', compact('service', 'countAssignmentsUser'));
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        $service->delete();

        return redirect()->route('service.assignments')->with('success-message-delete', 'Service canceled!!!'); 
    }
}
