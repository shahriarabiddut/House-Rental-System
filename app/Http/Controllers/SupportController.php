<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupportController extends Controller
{

    public function index()
    {
        //
        $data = Support::all();
        return view('profile.support.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profile.support.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = new Support;
        $user_id = Auth::user()->id;
        $request->validate([
            'category' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $data->user_id = $user_id;
        $data->category = $request->category;
        $data->subject = $request->subject;
        $data->message = $request->message;
        $data->save();

        return redirect()->route('user.support.index')->with('success', 'Support Ticket has been added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Support::find($id);

        return view('profile.support.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     //
    //     $data = Support::find($id);
    //     //header And Sidebar
    //     $dataMessage = $this->messageHeader();
    //     $sorryRoomSidebar = $this->roomSidebar();
    //     //header And Sidebar
    //     return view('student.support.edit',['data' => $data,'dataMessage'=>$dataMessage,'sorryRoomSidebar'=>$sorryRoomSidebar]);
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     //
    //     $data = Support::find($id);

    //     $request->validate([
    //     'category' => 'required',
    //     'subject' => 'required',
    //     'message' => 'required',
    //     ]);
    //     $data->category = $request->category;
    //     $data->subject = $request->subject;
    //     $data->message = $request->message;
    //     $data->save();

    //     return redirect('student/support')->with('success','Support Ticket has been Updated Successfully!');
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = Support::find($id);
        if ($data->status != null || $data->status != 0) {
            return redirect()->route('user.support.index')->with('danger', 'You cannot delete Support Ticket!');
        } else {
            $data->delete();
            return redirect()->route('user.support.index')->with('danger', 'Support Ticket has been Deleted Successfully!');
        }
    }

    //Admin View
    public function adminIndex()
    {
        //
        $data = Support::all();
        return view('admin.support.index', ['data' => $data]);
    }
    public function showAdmin(string $id)
    {
        //
        $data = Support::find($id);
        return view('admin.support.show', ['data' => $data]);
    }
    //Staff View
    public function staffIndex()
    {
        //
        $data = Support::all();
        return view('staff.support.index', ['data' => $data]);
    }
    public function staffAdmin(string $id)
    {
        //
        $data = Support::find($id);
        return view('staff.support.show', ['data' => $data]);
    }
    public function staffReply(string $id)
    {
        //
        $data = Support::find($id);
        return view('staff.support.reply', ['data' => $data,]);
    }

    public function staffReplyUpdate(Request $request, $id)
    {
        //
        $data = Support::find($id);
        $request->validate([
            'reply' => 'required',
            'status' => 'required',
        ]);
        $data->reply = $request->reply;
        $data->status = $request->status;
        $data->repliedby = $request->repliedby;
        $data->save();

        return redirect('staff/support')->with('success', 'Support Ticket has been Replied Successfully!');
    }
}
