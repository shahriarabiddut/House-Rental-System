<?php

namespace App\Http\Controllers\Admin;

use App\Models\Property;
use App\Models\Agreement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Payment;

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
}
