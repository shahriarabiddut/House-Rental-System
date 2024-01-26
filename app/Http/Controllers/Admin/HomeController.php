<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Property;
use App\Models\Agreement;
use App\Models\SiteOption;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('admin.dashboard');
    }
    public function editSetting()
    {
        $datas = SiteOption::all();
        return view('admin.settings.edit', ['datas' => $datas]);
    }
    public function updateSetting(Request $request, $id)
    {
        //
        $data = SiteOption::find($id);
        $request->validate([
            'value' => 'required',
        ]);
        $data->value = $request->value;
        $data->save();

        return redirect('admin/settings')->with('success', 'Settings has been updated Successfully!');
    }
    public function view()
    {
        return view('admin.layouts.view', [
            'user' => Auth::guard('admin')->user(),
        ]);
    }

    public function edit()
    {
        return view('admin.layouts.edit', [
            'user' => Auth::guard('admin')->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $data = Admin::find($request->userid);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $data->name = $request->name;
        $data->email = $request->email;

        $data->save();
        return Redirect::route('admin.profile.view')->with('success', 'Profile Updated');
    }
    //Revoking Agreement
    public function revoke(string $id)
    {
        $data = Agreement::find($id);
        //Get Payment id
        $dataPayment = Payment::all()->where('service_id', $data->id)->where('tenant_id', $data->tenantid)->first();
        //
        if ($data->amountStatus != 2) {
            return redirect()->back()->with('danger', 'Not Permitted!');
        }
        $data->amountStatus = 0;
        if ($data->dateCheckOut == null) {
            $data->dateCheckOut = date('Y-m-d');
            $data->dateofSigning = null;
        }
        $data->tenantid = 0;
        $data->amountStatus = 0;
        $data->seen = 3;
        $data->save();
        //Property Status Update
        $dataProperty = Property::find($data->propertyid);
        $dataProperty->status = 'available';

        $dataProperty->save();
        //Booking Update
        $dataBooking = Booking::all()->where('payment_id', $dataPayment->id)->first();
        if ($dataBooking != null) {
            $dataBooking->revokeDate = date('Y-m-d');
            if ($dataBooking->checkOutDate == null) {
                $dataBooking->checkOutDate = date('Y-m-d');
            }
            $dataBooking->save();
        }
        //
        return redirect()->back()->with('success', 'Agreement has been Revoked Successfully!');
    }
    public function message()
    {
        //
        $data = Contact::all();
        return view('admin.contact.index', ['data' => $data]);
    }
    public function messageShow(string $id)
    {
        //
        $data = Contact::find($id);
        return view('admin.contact.show', ['data' => $data]);
    }
}
