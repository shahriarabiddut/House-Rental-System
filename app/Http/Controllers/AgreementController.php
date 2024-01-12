<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use App\Models\Property;
use App\Models\Agreement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgreementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user_id = Auth::user()->id;
        $property = Property::all()->where('uid', $user_id);
        $data = Agreement::all()->where('propertyid', $property->id);
        return view('pages.property.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create1(string $id)
    {
        //Check Property Owns or not
        $user_id = Auth::user()->id;
        $data = Property::all()->where('id', $id)->where('uid', $user_id)->first();
        if ($data == null) {
            return redirect()->route('user.property.index')->with('danger', 'Not Permitted!');
        }
        return view('pages.agreement.create', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Check Property Owns or not
        $user_id = Auth::user()->id;
        $property = Property::all()->where('id', $request->property_id)->where('uid', $user_id)->first();
        if ($property == null) {
            return redirect()->route('user.property.index')->with('danger', 'Not Permitted!');
        }
        //
        $data = new Agreement();
        $request->validate([
            'terms' => 'required',
            'amount' => 'required',
            'property_id' => 'required',
        ]);
        $data->terms = $request->terms;
        $data->amount = $request->amount;
        $data->propertyid = $request->property_id;
        $data->tenantid = 0;
        //
        $data->save();

        return redirect()->route('user.property.index')->with('success', 'Agreement added to Property!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Agreement::find($id);
        return view('pages.agreement.show', ['data' => $data]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Agreement::find($id);
        if ($data->amountStatus != 0) {
            return redirect()->back()->with('danger', 'Not Permitted!');
        }
        $property = $data->propertyid;
        $data->delete();
        return redirect()->route('property.show', $property)->with('danger', 'Agreement has been Deleted Successfully!');
    }
    public function accept(string $id)
    {
        $data = Agreement::find($id);
        if ($data->amountStatus == 0) {
            return redirect()->back()->with('danger', 'Not Paid!');
        }
        $data->amountStatus = 2;
        $data->save();
        return redirect()->back()->with('success', 'Agreement has been Accepted Successfully!');
    }
    //Make Agreement
    public function makeAgreement(string $id, string $email)
    {
        //User
        $getUser = User::all()->where('email', $email)->first();
        if ($getUser == null) {
            return redirect()->route('user.profile.view')->with('danger', 'USer Not Found!');
        }
        //Check Property 
        $data = Property::all()->where('id', $id)->first();
        $data2 = Agreement::all()->where('propertyid', $id)->first();
        if ($data != null) {
            if ($data2->tenantid == null) {
                $data2->tenantid = $getUser->id;
                $data2->save();
                return redirect()->route('user.profile.view')->with('success', 'Agreement Done!');
            } else {
                return redirect()->route('user.profile.view')->with('danger', 'Not Permitted!');
            }
        } else {
            return redirect()->route('user.profile.view')->with('danger', 'Not Permitted!');
        }
    }
    //Signing Agreement
    public function signAgreement(string $id)
    {
        //Check Property 
        $data = Property::all()->where('id', $id)->first();
        $data2 = Agreement::all()->where('propertyid', $id)->first();
        if ($data != null) {
            if ($data2->tenantid == null) {
                return redirect()->route('user.profile.view')->with('danger', 'Sorry Not Permitted!');
            }
        } else {
            return redirect()->route('user.profile.view')->with('danger', 'Not Permitted!');
        }
        if ($data2->tenantid == Auth::user()->id) {
            if ($data2->dateofSigning == null) {
                return view('pages.agreement.agreement', ['data' => $data, 'data2' => $data2]);
            } else {
                return redirect()->route('user.profile.view')->with('danger', 'Not Permitted!');
            }
        }
    }
    public function storeAgreement(Request $request)
    {
        $data = Agreement::all()->where('propertyid', $request->property_id)->first();
        $request->validate([
            'dateofSigning' => 'required',
            'property_id' => 'required',
            'method' => 'required',
        ]);
        $data->dateofSigning = $request->dateofSigning;
        $data->amountStatus = 1;
        if ($request->has('dateCheckOut')) {
            $data->dateCheckOut = $request->dateCheckOut;
        }
        $data->save();
        //Payment Method Apply
        $dataPayment = new Payment();
        $dataPayment->property_id = $request->property_id;
        $dataPayment->tenant_id = Auth::user()->id;
        $dataPayment->method = $request->method;
        $dataPayment->amount = $data->amount;
        $dataPayment->date = $data->dateofSigning;
        $dataPayment->type = 'agreement';
        $dataPayment->save();
        //
        return redirect()->route('user.profile.view')->with('success', 'Agreement Submitted!');
    }
}
