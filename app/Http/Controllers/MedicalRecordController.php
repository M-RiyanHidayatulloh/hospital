<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medical_records = MedicalRecord::latest()->paginate(5);
        return view('admin.medical_records.index', compact('medical_records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctors = Doctor::all();
        $patients = Patient::all();
        return view('admin.medical_records.create', compact('doctors', 'patients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'diagnosis' => 'required',
            'treatment' => 'required'
        ]);
        MedicalRecord::create($request->all());
        return redirect()->route('medical_records.index')->with('success', 'Medical record created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MedicalRecord $medicalRecord)
    {
        return view('medical_records.show', compact('medicalRecord'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $doctors = Doctor::all();
        $patients = Patient::all();
        $record = MedicalRecord::findOrFail($id);
        return view('admin.medical_records.update', compact('record', 'doctors', 'patients'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'diagnosis' => 'required',
            'treatment' => 'required'
        ]);
        $record = MedicalRecord::findOrFail($id);
        $record->update($request->all());
        return redirect()->route('admin/medical_records')->with('success', 'Medical record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $medical_records = MedicalRecord::findOrFail($id)->delete();
        if($medical_records) {
            return redirect()->route('admin/medical_records')->with('success', 'Medical record Data Was Deleted');
        } else {
            return redirect()->route('admin/medical_records')->with('error', 'Medical record Delete Fail');
        }
    }
}
