<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Queue;
use Illuminate\Http\Request;

class QueueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Queues',
            'breadcrumbs' => [
                // 'Category' => "#",
            ],
            'queues' => Queue::paginate(3),
            'content' => 'admin.queues.index',
        ];

        return view("admin.wrapper", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $appointments = Appointment::all();
        $data = [
            'title' => 'Create Queue',
            'breadcrumbs' => [
                'Queues' => route('queues.index'),
                'Create' => "#",
            ],
            'appointments' => $appointments,
            'content' => 'admin.queues.create',
        ];

        return view("admin.wrapper", $data);
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

        return redirect()->route('queues.index')->with('success', 'Queue created successfully.');
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
    public function edit(Queue $queue)
    {
        $appointments = Appointment::all();
        $data = [
            'title' => 'Edit Queue',
            'breadcrumbs' => [
                'Queues' => route('queues.index'),
                'Edit' => "#",
            ],
            'queue' => $queue,
            'appointments' => $appointments,
            'content' => 'admin.queues.edit',
        ];

        return view("admin.wrapper", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Queue $queue)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'queue_number' => 'required|integer',
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        $queue->update($request->all());

        return redirect()->route('queues.index')
            ->with('success', 'Queue updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Queue $queue)
    {
        $queue->delete();

        return redirect()->route('queues.index')->with('success', 'Queue deleted successfully.');
    }
}
