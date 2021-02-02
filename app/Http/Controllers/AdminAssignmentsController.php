<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Equipment;
use App\Models\User;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminAssignmentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }

    public function index()
    {
        $user = Auth::user();
        $service = Service::with('user')->get();
        $equipment = Equipment::with('user')->get();
        
        return view('admin.assignments.index', compact('service', 'user', 'equipment'));
    }

    public function show($id)
    {
        $service = Service::findOrFail($id);
        $user = Auth::user();
        
        return view('admin.assignments.show', compact('service', 'user'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $service->fill($request->all());
        $service->save();

        return redirect()->route('admin.assignments.show', $id)->with('success-message', 'Assignment updated!!!');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        $service->delete();

        return redirect()->route('admin.assignments.index')->with('success-message-delete', 'Service cancelled!!!'); 
    }
}
