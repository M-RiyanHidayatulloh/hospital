<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil pasien dengan usertype 'user'
        // $patients = Patient::whereHas('user', function ($query) {
        //     $query->where('usertype', 'user');
        // })->get();

        $patients = Patient::all()
        ;
        return view('admin.patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil semua user yang memiliki usertype 'user'
        $users = User::where('usertype', 'user')->get();

        // Kirim data users ke view create
        return view('admin.patients.create', compact('users'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'address' => 'required|min:2',
            'phone' => 'required|min:5',
            'birthdate' => 'required|date',
            'gender' => 'required',
            'description' => 'nullable|string',
        ]);

        $user = User::find($request->user_id);

        $patient = new Patient();
        // $patient->user_id = $request->user_id;
        $patient->name = $request->name;
        $patient->address = $request->address;
        $patient->phone = $request->phone;
        $patient->birthdate = $request->birthdate;
        $patient->gender = $request->gender;
        $patient->description = $request->description;

        if ($patient->save()) {
            return redirect()->route('admin/patients')->with('success', 'Patient Data Was Added');
        } else {
            return redirect()->route('admin/patients/create')->with('error', 'Some Problem Secure');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Ambil pasien berdasarkan ID
        $patient = Patient::findOrFail($id);

        // Ambil semua user yang memiliki usertype 'user'
        $users = User::where('usertype', 'user')->get();

        return view('admin.patients.update', compact('patient', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'user_id' => 'required|string|exists:users,id',
            // 'name' => 'required|min:2',
            'address' => 'required|min:2',
            'phone' => 'required|min:5',
            'birthdate' => 'required|date',
            'gender' => 'required',
            'description' => 'nullable|string',
        ]);

        $patient = Patient::findOrFail($id);
        $patient->user_id = $request->user_id;
        // $patient->name = $request->name;
        $patient->address = $request->address;
        $patient->phone = $request->phone;
        $patient->birthdate = $request->birthdate;
        $patient->gender = $request->gender;
        $patient->description = $request->description;

        if ($patient->save()) {
            return redirect()->route('admin/patients')->with('success', 'Patient Data Was Updated');
        } else {
            return redirect()->route('admin/patients/update', $id)->with('error', 'Some Problem Secure');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $patients = Patient::findOrFail($id)->delete();
        if ($patients) {
            return redirect()->route('admin/patients')->with('success', 'Patient Data Was Deleted');
        } else {
            return redirect()->route('admin/patients')->with('error', 'Patient Delete Fail');
        }
    }

    public function trash()
    {
        $patients = Patient::onlyTrashed()->get();
        return view('admin.patients.trash', compact('patients'));
    }

    public function restore($id = null)
    {
        if ($id != null) {
            $patients = Patient::onlyTrashed()
                ->where('id', $id)
                ->restore();
        } else {
            $patients = Patient::onlyTrashed()->restore();
        }
        return redirect()->route('admin/patients/trash')->with('success', 'Patient Was Restore');
    }

    public function destroy($id = null)
    {
        if ($id != null) {
            $patients = Patient::onlyTrashed()
                ->where('id', $id)
                ->forceDelete();
        } else {
            $patients = Patient::onlyTrashed()->forceDelete();
        }
        return redirect()->route('admin/patients/trash')->with('success', 'Patient Was Delete Permanently');
    }
}
