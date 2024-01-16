<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agreement;
use Illuminate\Http\Request;
use App\Models\AgreementRequest;
use Illuminate\Support\Facades\Auth;

class AgreementRequestController extends Controller
{
    public function index()
    {
        //
        $user_id = Auth::user()->id;
        $data = AgreementRequest::all()->where('tenant_id', $user_id);
        return view('pages.arequest.index', ['data' => $data]);
    }
    public function indexOwner()
    {
        //
        $user_id = Auth::user()->id;
        $data = AgreementRequest::all()->where('owner_id', $user_id);
        return view('pages.arequest.indexOwner', ['data' => $data]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $data = Agreement::find($id);
        return view('pages.arequest.create', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = new AgreementRequest;
        $user_id = Auth::user()->id;
        $request->validate([
            'terms' => 'required',
            'property_id' => 'required',
            'agreement_id' => 'required',
            'owner_id' => 'required',
        ]);
        $data->tenant_id = $user_id;
        $data->terms = $request->terms;
        $data->property_id = $request->property_id;
        $data->agreement_id = $request->agreement_id;
        $data->owner_id = $request->owner_id;
        $data->status = '3';
        $data->save();

        return redirect()->route('user.agreementRequest.index')->with('success', 'Agreement Request has been added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = AgreementRequest::find($id);
        return view('pages.arequest.show', ['data' => $data]);
    }
    public function showOwner(string $id)
    {
        //
        $data = AgreementRequest::find($id);
        if ($data->owner_id != Auth::user()->id) {
            return redirect()->back()->with('danger', 'Not Permitted!');
        }
        if ($data->created_at == $data->updated_at) {
            $data->status = 0;
            $data->save();
        }

        return view('pages.arequest.showOwner', ['data' => $data]);
    }

    public function accept(string $id)
    {
        //
        $data = AgreementRequest::find($id);
        if ($data->owner_id != Auth::user()->id) {
            return redirect()->back()->with('danger', 'Not Permitted!');
        }
        $data->status = 1;
        $data->save();
        //Make Agreement
        $user = User::all()->where('id', $data->tenant_id)->first();
        $makeAgreementData = new AgreementController();
        $makeAgreementData->makeAgreement($data->property_id, $user->email);
        //
        return redirect()->back()->with('success', 'Agreement Request has been Accepted Successfully!');
    }
    public function reject(string $id)
    {
        //
        $data = AgreementRequest::find($id);
        if ($data->owner_id != Auth::user()->id) {
            return redirect()->back()->with('danger', 'Not Permitted!');
        }
        $data->status = 2;
        $data->save();
        return redirect()->back()->with('success', 'Agreement Request has been rejected Successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = AgreementRequest::find($id);
        if ($data == null) {
            return redirect()->route('user.agreementRequest.index')->with('danger', 'You cannot delete AgreementRequest!');
        }
        if ($data->tenant_id != Auth::user()->id) {
            return redirect()->back()->with('danger', 'Not Permitted!');
        }
        $data->delete();
        return redirect()->route('user.agreementRequest.index')->with('danger', 'AgreementRequest has been Deleted Successfully!');
    }
}
