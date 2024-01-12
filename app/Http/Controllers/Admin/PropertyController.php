<?php

namespace App\Http\Controllers\Admin;

use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

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
}
