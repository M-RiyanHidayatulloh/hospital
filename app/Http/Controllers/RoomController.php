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
        $rooms = Room::latest()->paginate(5);
        $rooms = Room::orderBy('id', 'desc')->get();
        $rooms = Room::count();
        $rooms = Room::all();
        return view('admin.rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.rooms.create');
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
        return redirect()->route('admin/rooms')->with('success', 'Room created successfully.');
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
    public function edit($id)
    {
        $room = Room::findOrFail($id);

        return view('admin.rooms.update', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'room_number' => 'required',
            'room_type' => 'required',
            'availability' => 'required',
            'capacity' => 'required|integer'
        ]);
    
        $room = Room::findOrFail($id);
    
        $room->update([
            'room_number' => $request->room_number,
            'room_type' => $request->room_type,
            'availability' => $request->availability,
            'capacity' => $request->capacity,
        ]);
    
        return redirect()->route('admin/rooms')->with('success', 'Room updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $rooms = Room::findOrFail($id)->delete();
        if($rooms) {
            return redirect()->route('admin/rooms')->with('success', 'Room Data Was Deleted');
        } else {
            return redirect()->route('admin/rooms')->with('error', 'Room Delete Fail');
        }
    }

    public function trash() {
        $rooms = Room::onlyTrashed()->get();
         return view('admin.rooms.trash', compact('rooms'));
     }
 
     public function restore($id = null) {
         if($id != null) {
             $rooms = Room::onlyTrashed()
             ->where('id', $id)
             ->restore();
         } else {
             $rooms = Room::onlyTrashed()->restore();
         }
         return redirect()->route('admin/rooms/trash')->with('success', 'Room Data Was Restore');
     }
 
     public function destroy($id = null) {
         if($id != null) {
             $rooms = Room::onlyTrashed()
             ->where('id', $id)
             ->forceDelete();
         } else {
             $rooms = Room::onlyTrashed()->forceDelete();
         }
         return redirect()->route('admin/rooms/trash')->with('success', 'Room Data Was Delete Permanently');
     }
 }
 

