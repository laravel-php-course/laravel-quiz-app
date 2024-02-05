<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Note;
use App\Notifications\SendNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //TODO Validation
        $note = Note::create([
           'admin_id' => auth()->guard('admin')->id(),
           'title'    => $request->input('title', Str::random(10)),
           'content'  => $request->input('content', Str::random(64))
        ]);

        if ($note)
        {
            //Way 1
//            $admin = Admin::find(auth()->guard('admin')->id());
//            $admin->notify(new SendNotification($note));

            // Way 2
            Notification::send(auth()->guard('admin')->user(), new SendNotification($note));
        }
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
