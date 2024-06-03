<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Room',
            'breadcrumbs' => [
                // 'Category' => "#",
            ],
            'rooms' => Room::all(),
            'content' => 'admin.rooms.index',
        ];

        return view("admin.wrapper", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Create room',
            'breadcrumbs' => [
                'rooms' => route('rooms.index'),
                'Create' => "#",
            ],
            'content' => 'admin.rooms.create',
        ];

        return view("admin.wrapper", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_number' => 'required|unique:rooms',
            'room_type' => 'required',
            'availability' => 'required',
            'capacity' => 'required|integer'
        ]);
        Room::create($request->all());
        return redirect()->route('rooms.index')->with('success', 'Room created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        $data = [
            'title' => 'Rooms',
            'breadcrumbs' => [
                'Rooms' => route('admin.rooms.index'),
                'Edit' => "#",
            ],
            'room' => $room,
            'content' => 'admin.rooms.edit',
        ];

        return view("admin.wrapper", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'room_number' => 'required|unique:rooms,room_number,' . $room->id,
            'room_type' => 'required',
            'availability' => 'required',
            'capacity' => 'required|integer'
        ]);
        $room->update($request->all());
        return redirect()->route('rooms.index')->with('success', 'Room updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully.');
    }
}
