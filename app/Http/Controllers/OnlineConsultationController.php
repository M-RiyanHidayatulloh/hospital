<?php

namespace App\Http\Controllers;
use App\Models\OnlineConsultation;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;

class OnlineConsultationController extends Controller
{
    public function index()
    {
        $online_consultations = OnlineConsultation::latest()->paginate(5);
        return view('admin.online_consultations.index', compact('online_consultations'));
    }

    public function create()
    {
        $doctors = Doctor::all();
        $patients = Patient::all();
        return view('admin.online_consultations.create', compact('doctors', 'patients'));
    }

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
        return redirect()->route('admin/online_consultations')->with('success', 'Online consultation created successfully.');
    }

    public function edit(string $id)
    {
        $doctors = Doctor::all();
        $patients = Patient::all();
        $consultation = OnlineConsultation::findOrFail($id);
        return view('admin.online_consultations.update', compact('consultation', 'doctors', 'patients'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'consultation_date' => 'required|date',
            'consultation_mode' => 'required|in:Chat,Video,Audio',
            'notes' => 'required'
        ]);
        $consultation = OnlineConsultation::findOrFail($id);
        $consultation->update($request->all());
        return redirect()->route('admin/online_consultations')->with('success', 'Online consultation updated successfully.');
    }

    public function delete($id)
    {
        $online_consultations = OnlineConsultation::findOrFail($id)->delete();
        if($online_consultations) {
            return redirect()->route('admin/online_consultations')->with('success', 'Online consultation Data Was Deleted');
        } else {
            return redirect()->route('admin/online_consultations')->with('error', 'Online consultation Delete Fail');
        }
    }
}
