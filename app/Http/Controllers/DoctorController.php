<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Alert;

class DoctorController extends Controller
{
    public function index(): View
    {
        // $doctors = Doctor::whereHas('user', function ($query) {
        //     $query->where('usertype', 'doctor');
        // })->get();

        $doctors = User::where('usertype', 'doctor')->get();
        return view('admin.doctors.index', compact('doctors'));
    }

    public function create()
    {
        $users = User::where('usertype', 'doctor')->get();
        $doctor = User::where('usertype', 'user')->get();

        return view('admin.doctors.create', compact('users', 'doctor'));
    }


    // public function store(Request $request): RedirectResponse
    // {
    //     $validation = $request->validate([
    //         'user_id' => 'required|exists:users,id',
    //         'name' => 'required|string|max:255',
    //         'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
    //         'specialization' => 'required|min:5',
    //         'phone' => 'required|string|min:5',
    //         'available_times' => 'required|string|min:5',

    //     ]);

    //     $image = $request->file('image');
    //     $image->storeAs('public/doctors', $image->hashName());

    //     $doctor = Doctor::create([
    //         'user_id' => $request->user_id,
    //         'name' => $request->name,
    //         'image' => $image->hashName(),
    //         'phone' => $request->phone,
    //         'available_times' => $request->available_times,
    //     ]);

    //     if ($doctor) {
    //         return redirect()->route('admin/doctors')->with('success', 'Doctor Data Was Added');
    //     } else {
    //         return redirect()->route('admin/doctors/create')->with('error', 'Some Problem Occurred');
    //     }
    // }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'usertype' => 'required|string|max:255',
            'profile_image' => 'mimes:jpeg,png,jpg,gif,svg|max:1048',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'date_of_birth' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'amount' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $image = $request->file('profile_image');
        $image->storeAs('public/profile-image', $image->hashName());

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'usertype' => $request->usertype,
            'profile_image' => 'profile-image/' . $image->hashName(),
            'phone' => $request->phone,
            'address' => $request->address,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'specialization' => $request->specialization,
            'amount' => $request->amount,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin/doctors')->with('success', 'Doctor created successfully.');
    }

    public function edit($id)
    {
        $doctor = User::find($id);
        // dd($doctor);
        return view('admin.doctors.update', compact('doctor'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'string|max:255',
            'email' => 'string|email|max:255|unique:users',
            'usertype' => 'string|max:255',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone' => 'string|max:255',
            'address' => 'string|max:255',
            'date_of_birth' => 'string|max:255',
            'gender' => 'string|max:255',
            'specialization' => 'string|max:255',
            'amount' => 'string|max:255',
            'password' => 'string|min:8|confirmed',
        ]);

        // $user->update($request->all());

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $folderPath = 'profile-image';
            $imagePath = $image->store($folderPath, 'public');
            $user->profile_image = $imagePath;
        }

        // dd($imagePath);
        // $image = $request->file('profile_image');
        // // $image->storeAs('public/profile-image', $image->hashName());
        // User::update([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'usertype' => $request->usertype,
        //     // 'profile_image' => $image->hashName(),
        //     'phone' => $request->phone,
        //     'address' => $request->address,
        //     'date_of_birth' => $request->date_of_birth,
        //     'gender' => $request->gender,
        //     'specialization' => $request->specialization,
        //     'amount' => $request->amount,
        //     'password' => bcrypt($request->password),
        // ]);
        $user->update();

        return redirect()->route('admin/doctors')->with('success', 'User updated successfully.');
    }

    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        $users = User::where('usertype', 'doctor')->get();
        return view('admin.doctors.update', compact('doctor', 'users'));
    }

    public function delete($id)
    {
        $doctor = User::find($id);
        try {
            $doctor->delete();
            return redirect()->back()->with('success', 'Doctor Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Deleted Failed');
        }
    }

    public function trash()
    {
        $doctors = Doctor::onlyTrashed()->get();
        return view('admin.doctors.trash', compact('doctors'));
    }

    public function restore($id = null)
    {
        if ($id != null) {
            $doctors = Doctor::onlyTrashed()
                ->where('id', $id)
                ->restore();
        } else {
            $doctors = Doctor::onlyTrashed()->restore();
        }
        return redirect()->route('admin/doctors/trash')->with('success', 'Doctor Was Restore');
    }

    public function destroy($id = null)
    {
        if ($id != null) {
            $doctors = Doctor::onlyTrashed()
                ->where('id', $id)
                ->forceDelete();
        } else {
            $doctors = Doctor::onlyTrashed()->forceDelete();
        }
        return redirect()->route('admin/doctors/trash')->with('success', 'Doctor Was Delete Permanently');
    }
}
