<?php

namespace App\Http\Controllers;

use App\Models\Patient;
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
        $patients = Patient::whereHas('user', function($query) {
            $query->where('usertype', 'user');
        })->get();
        
        return view('admin.patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    // Ambil semua user yang memiliki usertype 'user'
    $users = \App\Models\User::where('usertype', 'user')->get();
    
    // Kirim data users ke view create
    return view('admin.patients.create', compact('users'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'user_id' => 'required|string|exists:users,id',
            'name' => 'required|string|max:255',
            'address' => 'required|min:2',
            'phone' => 'required|min:5', 
            'birthdate' => 'required|string|min:5',      
            'gender' => 'required',
            'description' => 'nullable|string',
        ]);
        $data = Patient::create($validation);
        if($data) {
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
        // return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    // Ambil pasien berdasarkan ID
    $patient = Patient::findOrFail($id);

    // Ambil semua user yang memiliki usertype 'user'
    $users = \App\Models\User::where('usertype', 'user')->get();

    return view('admin.patients.update', compact('patient', 'users'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $patients = Patient::findOrFail($id);
        $user_id = $request->user_id;
        $name = $request->name;
       $address = $request->address;
       $phone = $request->phone;
       $birthdate = $request->birthdate;
       $gender = $request->gender;
       $description = $request->description;

        $patients -> user_id = $user_id;
        $patients -> name = $name;
        $patients -> address = $address;
        $patients -> phone = $phone;
        $patients -> birthdate = $birthdate;
        $patients -> gender = $gender;
        $patients -> description = $description;
        $data = $patients->save();
        if($data) {
            return redirect()->route('admin/patients')->with('success', 'Patient Data Was Changed');
        } else {
            return redirect()->route('admin/patients/update')->with('error', 'Some Problem Secure');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $patients = Patient::findOrFail($id)->delete();
        if($patients) {
            return redirect()->route('admin/patients')->with('success', 'Patient Data Was Deleted');
        } else {
            return redirect()->route('admin/patients')->with('error', 'Patient Delete Fail');
        }
    }
}
