<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user_id = Auth::user()->id;
        $data = Maintenance::all()->where('tenant_id', $user_id);
        return view('pages.maintenance.index', ['data' => $data]);
    }
    public function index2()
    {
        //
        $user_id = Auth::user()->id;
        $data = Maintenance::all()->where('owner_id', $user_id);
        return view('pages.maintenance.index', ['data' => $data]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        //Check Property Owns or not
        $user_id = Auth::user()->id;
        $data = Agreement::all()->where('id', $id)->where('tenantid', $user_id)->first();
        if ($data == null) {
            return redirect()->route('user.property.index')->with('danger', 'Not Permitted!');
        }
        return view('pages.maintenance.create', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        $dataAgreement = Agreement::all()->where('id', $request->aid)->where('tenantid', Auth::user()->id)->first();
        //
        $data = new Maintenance();
        $request->validate([
            'task' => 'required',
        ]);
        $data->task = $request->task;
        $data->owner_id = $dataAgreement->user_id;
        $data->property_id = $dataAgreement->propertyid;
        $data->tenant_id = Auth::user()->id;
        $data->status = 0;
        //
        $data->save();

        return redirect()->route('user.maintenance.index')->with('success', 'Maintenance Request added to Property!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Maintenance::find($id);
        return view('pages.maintenance.show', ['data' => $data]);
    }
    public function show2(string $id)
    {
        //
        $data = Maintenance::find($id);
        if ($data->status < 1) {
            $data->status = 1;
            $data->save();
        }
        //
        return view('pages.maintenance.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Maintenance::find($id);
        $user_id = Auth::user()->id;
        if ($data->owner_id != $user_id) {
            return redirect()->route('user.maintenance.index')->with('danger', 'Not Permitted!');
        }
        return view('pages.maintenance.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $data =  Maintenance::find($request->aid);;
        $request->validate([
            'reply' => 'required',
        ]);
        $data->reply = $request->reply;
        $data->status = $request->status;
        //
        $data->save();

        return redirect()->route('user.maintenance.index2')->with('success', 'Replied to Maintenance Request!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = Maintenance::find($id);
        if ($data->status > 1) {

            return redirect()->route('user.maintenance.index')->with('danger', 'Maintenance Request can not be deleted!');
        }
        $data->delete();
        return redirect()->route('user.maintenance.index')->with('danger', 'Maintenance Request has been Deleted Successfully!');
    }
}
