<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyImage;
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
            'price' => 'required',
            'hall' => 'required',
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
        $data->hall = $request->hall;
        $data->status = $request->status;
        $data->price = $request->price;
        //If user Given any PHOTO
        if ($request->hasFile('aimage')) {
            $data->pimage = $request->file('aimage')->store('PropertyPhoto', 'public');
        }
        //
        $data->save();

        return redirect()->route('user.property.index')->with('success', 'Property added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    //Image
    public function imageAdd(string $id)
    {
        //
        return view('pages.property.createimage', ['property_id' => $id]);
    }
    public function imageStore(Request $request)
    {
        //
        $user_id = Auth::user()->id;
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'aimage' => 'required',
            'property_id' => 'required',
        ]);
        //Property owner Match
        $property = Property::find($request->property_id);
        if ($user_id != $property->uid) {
            return redirect()->route('user.property.index')->with('danger', 'Bad Request!');
        }
        //
        $data = new PropertyImage();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->property_id = $request->property_id;
        if ($request->hasFile('aimage')) {
            $data->path = $request->file('aimage')->store('PropertyPhoto', 'public');
        }
        //
        $data->save();

        return redirect()->route('property.show', $request->property_id)->with('success', 'Property Image added Successfully!');
    }
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
        $data = Property::find($id);
        $data->delete();
        return redirect()->route('user.property.index')->with('danger', 'Property has been Deleted Successfully!');
    }
}
