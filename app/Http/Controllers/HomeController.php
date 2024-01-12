<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        //
        $data = Property::all();
        return view('welcome', ['data' => $data]);
    }
    public function property()
    {
        //
        $data = Property::paginate(4);;
        return view('pages.property', ['data' => $data]);
    }
    public function propertyShow(string $id)
    {
        //
        $data = Property::find($id);
        return view('pages.propertyShow', ['data' => $data]);
    }
    public function propertySearch(Request $request)
    {
        //
        if ($request->type != '') {
            $data = Property::all()->where('type', $request->type);
        }
        if ($request->price != '') {
            $data = Property::all()->where('price', '<=', $request->price);
        }
        if ($request->bhk != '') {
            $data = Property::all()->where('bedroom', '<=', $request->bhk);
        }
        if ($request->city != '') {
            $data = Property::all()->where('city', '==', $request->city);
        }
        if ($request->type == '' && $request->city == '' && $request->price == '' && $request->bhk == '') {
            $data = Property::all();
        }
        return view('pages.propertySearch', ['data' => $data]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
