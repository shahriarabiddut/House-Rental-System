<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user_id = Auth::user()->id;
        $data = Property::all()->where('uid', $user_id);
        return view('pages.property.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.property.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = new Property();
        $user_id = Auth::user()->id;
        $request->validate([
            'title' => 'required',
            'ptype' => 'required',
            'bath' => 'required',
            'kitc' => 'required',
            'bed' => 'required',
            'balc' => 'required',
            'floor' => 'required',
            'totalfl' => 'required',
            'city' => 'required',
            'state' => 'required',
            'asize' => 'required',
            'loc' => 'required',
            'status' => 'required',
            'isFeatured' => 'required',
            'price' => 'required',
        ]);
        $data->uid = $user_id;
        $data->title = $request->title;
        $data->type = $request->ptype;
        $data->bathroom = $request->bath;
        $data->kitchen = $request->kitc;
        $data->bedroom = $request->bed;
        $data->balcony = $request->balc;
        $data->floor = $request->floor;
        $data->totalfloor = $request->totalfl;
        $data->city = $request->city;
        $data->state = $request->state;
        $data->size = $request->asize;
        $data->location = $request->loc;
        $data->address = $request->loc;
        $data->status = $request->status;
        $data->featured = $request->isFeatured;
        $data->price = $request->price;
        $data->save();

        return redirect()->route('user.property.index')->with('success', 'Property added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
