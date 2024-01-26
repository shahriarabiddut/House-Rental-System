<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\Property;
use App\Models\Agreement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Property::all();
        return view('admin.property.index', ['data' => $data]);
    }

    public function show(string $id)
    {
        //
        $data = Property::find($id);
        return view('admin.property.show', ['data' => $data]);
    }
    public function agreement()
    {
        //
        $property = Property::all();
        $data = [];
        foreach ($property as $p) {
            $propertyData = Agreement::all()->where('propertyid', $p->id)->first();
            if ($propertyData != null) {
                $data[] = Agreement::all()->where('propertyid', $p->id)->first();
            }
        }
        return view('admin.agreement.index', ['data' => $data]);
    }
    public function booking()
    {
        //
        $data = Booking::all();
        return view('admin.booking.index', ['data' => $data]);
    }
    public function bookingshow(string $id)
    {
        //
        $data = Booking::find($id);
        return view('admin.booking.show', ['data' => $data]);
    }
    public function payment()
    {
        //
        $data = Payment::all();
        return view('admin.payment.index', ['data' => $data]);
    }
    public function paymentShow(string $id)
    {
        //
        $data = Payment::find($id);
        return view('admin.payment.show', ['data' => $data]);
    }
    public function destroy(string $id)
    {
        //
        $data = Property::find($id);
        if ($data->status == 'rent') {
            return redirect()->route('admin.property.index')->with('danger', 'Not Permitted!');
        }
        $data->delete();
        return redirect()->route('admin.property.index')->with('danger', 'Property has been Deleted Successfully!');
    }
}
