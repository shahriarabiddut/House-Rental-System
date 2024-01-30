<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{

    public function index()
    {
        return view('profile.dashboard');
    }
    /**
     * Display the user's profile form.
     */
    public function viewUser(string $id)
    {
        $user = User::find($id);
        return view('pages.user.profile', ['user' => $user]);
    }
    public function viewUserJ(string $id)
    {
        $data = User::select('name', 'email', 'mobile', 'id')->where('id', $id)->first();
        return response()->json($data);
    }
    public function view(Request $request): View
    {

        return view('pages.user.profile', [
            'user' => $request->user(),
        ]);
    }
    public function home(Request $request): View
    {
        return view('pages.user.profile', [
            'user' => $request->user(),
        ]);
    }


    public function edit(Request $request): View
    {
        return view('pages.user.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $data = User::find($request->userid);
        $formFields = $request->validate([
            'name' => 'required',
            'nid' => 'required',
            'mobile' => 'required',
        ]);
        //If user Gieven address
        if ($request->has('address')) {
            $formFields['address'] = $request->address;
        }
        //If user Gieven any PHOTO
        if ($request->hasFile('photo')) {
            $formFields['photo'] = $request->file('photo')->store('UserPhoto', 'public');
        } else {
            $formFields['photo'] = $request->prev_photo;
        }

        $data->name = $request->name;
        $data->nid = $request->nid;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->photo = $formFields['photo'];

        $data->save();

        return Redirect::route('user.profile.view')->with('success', 'Profile Updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
