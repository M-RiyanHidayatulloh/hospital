<?php

namespace App\Http\Controllers;
use App\Models\OnlineConsultation;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

class OnlineConsultationController extends Controller
{
    public function index()
    {
        $online_consultations = OnlineConsultation::latest()->paginate(5);
        $online_consultations = OnlineConsultation::orderBy('id', 'desc')->get();
        $online_consultations = OnlineConsultation::count();
        $online_consultations = OnlineConsultation::all();
        return view('admin.online_consultations.index', compact('online_consultations'));
    }

    public function create()
    {
        $patients = User::where('usertype', 'user')->get();
        $doctors = User::where('usertype', 'doctor')->get();
        return view('admin.online_consultations.create', compact('doctors', 'patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_user_id' => 'required|exists:users,id,usertype,user',
            'doctor_user_id' => 'required|exists:users,id,usertype,doctor',
            'consultation_date' => 'required|date',
            'consultation_mode' => 'required|in:Chat,Video,Audio',
            'notes' => 'required'
        ]);
        OnlineConsultation::create($request->all());
        return redirect()->route('admin/online_consultations')->with('success', 'Online consultation created successfully.');
    }

    public function edit(string $id)
    {
        $patients = User::where('usertype', 'user')->get();
        $doctors = User::where('usertype', 'doctor')->get();
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

    public function trash() {
        $online_consultations = OnlineConsultation::onlyTrashed()->get();
         return view('admin.online_consultations.trash', compact('online_consultations'));
     }
 
     public function restore($id = null) {
         if($id != null) {
             $online_consultations = OnlineConsultation::onlyTrashed()
             ->where('id', $id)
             ->restore();
         } else {
             $online_consultations = OnlineConsultation::onlyTrashed()->restore();
         }
         return redirect()->route('admin/online_consultations/trash')->with('success', 'Online Consultation Data Was Restore');
     }
 
     public function destroy($id = null) {
         if($id != null) {
             $online_consultations = OnlineConsultation::onlyTrashed()
             ->where('id', $id)
             ->forceDelete();
         } else {
             $online_consultations = OnlineConsultation::onlyTrashed()->forceDelete();
         }
         return redirect()->route('admin/online_consultations/trash')->with('success', 'Online Consultation Data Was Delete Permanently');
     }
}
