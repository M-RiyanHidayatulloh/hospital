<?php

namespace App\Http\Controllers;

use App\Models\Queue;
use App\Models\Appointment;
use Illuminate\Http\Request;

class QueueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $queues = Queue::latest()->paginate(5);
        $queues = Queue::orderBy('id', 'desc')->get();
        $queues = Queue::count();
        $queues = Queue::all();
        return view('admin.queues.index', compact('queues'));
    }

    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $appointments = Appointment::all();
        return view('admin.queues.create', compact('appointments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'queue_number' => 'required|integer',
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        Queue::create($request->all());

        return redirect()->route('admin/queues')->with('success', 'Queue created successfully.');
    }



    /**
     * Display the specified resource.
     */
    public function show(Queue $queue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $appointments = Appointment::all();
        $queue = Queue::findOrFail($id);
        return view('admin.queues.update', compact('queue', 'appointments'));
    }

    
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'queue_number' => 'required|integer',
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        $queue = Queue::findOrFail($id);
        $queue->update($request->all());

        return redirect()->route('admin/queues')->with('success', 'Queue updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function delete($id)
    {
        $queues = Queue::findOrFail($id)->delete();
        if($queues) {
            return redirect()->route('admin/queues')->with('success', 'Queue Data Was Deleted');
        } else {
            return redirect()->route('admin/queues')->with('error', 'Queue Delete Fail');
        }
    }

    public function trash() {
        $queues = Queue::onlyTrashed()->get();
         return view('admin.queues.trash', compact('queues'));
     }
 
     public function restore($id = null) {
         if($id != null) {
             $queues = Queue::onlyTrashed()
             ->where('id', $id)
             ->restore();
         } else {
             $queues = Queue::onlyTrashed()->restore();
         }
         return redirect()->route('admin/queues/trash')->with('success', 'Queue Data Was Restore');
     }
 
     public function destroy($id = null) {
         if($id != null) {
             $queues = Queue::onlyTrashed()
             ->where('id', $id)
             ->forceDelete();
         } else {
             $queues = Queue::onlyTrashed()->forceDelete();
         }
         return redirect()->route('admin/queues/trash')->with('success', 'Queue Data Was Delete Permanently');
     }
}
