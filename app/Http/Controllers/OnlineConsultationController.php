<?php

namespace App\Http\Controllers;

use App\Models\OnlineConsultation;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Patient;

class OnlineConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = [
            'title' => 'Online Consultations',
            'breadcrumbs' => [
                'Online Consultations' => route('online_consultations.index')
            ],
            'online_consultations' => OnlineConsultation::paginate(3),
            'content' => 'admin.online_consultations.index',

        ];

        return view('admin.wrapper', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        $data = [
            'title' => 'Create Online Consultation',
            'breadcrumbs' => [
                // 'Category' => "#",
                'Online Consultations' => route('online_consultations.index'),
                'Create' => "#",
            ],
            'patients' => $patients,
            'doctors' => $doctors,
            'content' => 'admin.online_consultations.create',
        ];

        return view("admin.wrapper", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'consultation_date' => 'required|date',
            'consultation_mode' => 'required|in:Chat,Video,Audio',
            'notes' => 'required'
        ]);
        OnlineConsultation::create($request->all());
        return redirect()->route('online_consultations.index')->with('success', 'Online consultation created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(OnlineConsultation $onlineConsultation)
    {
        return view('online_consultations.show', compact('onlineConsultation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OnlineConsultation $onlineConsultation)
    {
        $patients = Patient::all();
        $doctors = Doctor::all();

        $data = [
            'title' => 'Edit Online Consultation',
            'breadcrumbs' => [
                'Online Consultations' => route('online_consultations.index'),
                'Edit' => "#",
            ],
            'onlineConsultation' => $onlineConsultation,
            'patients' => $patients,
            'doctors' => $doctors,
            'content' => 'admin.online_consultations.edit',
        ];

        return view("admin.wrapper", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OnlineConsultation $onlineConsultation)
    {
        $request->validate([
            'consultation_date' => 'required|date',
            'consultation_mode' => 'required|in:Chat,Video,Audio',
            'notes' => 'required'
        ]);
        $onlineConsultation->update($request->all());
        return redirect()->route('online_consultations.index')->with('success', 'Online consultation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OnlineConsultation $onlineConsultation)
    {
        $onlineConsultation->delete();
        return redirect()->route('online_consultations.index')->with('success', 'Online consultation deleted successfully.');
    }
}
